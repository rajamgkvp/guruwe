<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PhotoController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Photo', 'Album');
	var $components = array('File', 'Image');
	var $helpers = array('Fck');

	public function beforeFilter() {   
		parent::beforeFilter();
		$session = $this->Session->read('admin');
		$this->set(compact('session'));
			// Controller spesific beforeFilter
    }
	
	function admin_index() {
		// setting page title for each page
		$this->pageTitle = 'Manage Photos';
		
		if(!empty($this->data)){
			// check for status change
			if(isset($this->data['Photo']['submit']) && trim($this->data['Photo']['submit']) == 'Submit'){
				if(isset($this->data['Photo']['id']) && count($this->data['Photo']['id']) > 0){
					$this->update_status(trim($this->data['Photo']['status']), $this->data['Photo']['id'], count($this->data['Photo']['id']));
				} else {
					$this->Session->setFlash('Please select any checkbox to perform any action.', 'flash', array('class' => 'alert-warning'));
				}
			}
		}
	
		$conditions[] = array();
		$this->paginate = array('limit' => '10', 'order' => array('Photo.created' => 'DESC'));
		$contents = $this->paginate('Photo', $conditions); //default take the current
		$this->set('content', $contents);
	
		$this->set('mode', array('activate'=>'Activate' ,'deactivate'=>'Deactivate' , 'delete'=>'Delete'));
		$this->set('limit', $this->params['request']['paging']['Photo']['options']['limit']);
		$this->set('page', $this->params['request']['paging']['Photo']['options']['page']);
	}
	
	function admin_add() {
		$this->checkLogin();
		$album = $this->Album->find('all', array('conditions'=>array('Album.status'=>1)));
		$this->set('album', $album);
		
		if(!empty($this->data)) {
			$ori_file_name = $this->data['Photo']['photo']['name'];
			$file_name = date('Ymdhis').$this->data['Photo']['photo']['name'];
			$file = $this->File->uploadAllExtention($this->data['Photo']['photo'], FILES_FOLDER.'photo/', 3048576000, $file_name);
			//pr($file);
			if(is_array($file)) {
				$file_name = trim($file['file_name']);
				$this->request->data['Photo']['photo'] = $file_name;
			}
			//$this->request->data['Photo']['photo']=$ori_file_name;
			//pr($this->data); exit;
			if($this->Photo->create($this->data) && $this->Photo->validates()) {
				if($this->Photo->save($this->data)) {
					$this->Session->setFlash('Photo has been added successfully.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/photo/');
				} else {
					$this->Session->setFlash('Some error has been occured. Please try again.', 'flash', array('class' => 'alert-error'));
					$this->redirect('/admin/photo/');
				}
			} else {
				// debug("Some error occured while validating the data");
			}
		}
	}

	function admin_edit($id = null, $language_code = 'en') {
		// Setting page title for each page
		$this->pageTitle = 'Edit Photo';
		
		$album = $this->Album->find('all', array('conditions'=>array('Album.status'=>1)));
		$this->set('album', $album);
		
		$photo = $this->Photo->findById($id);
		$this->set('photo', $photo);
		
		$this->set('pid', $id);
		
		if(!empty($this->data)) {
			if(!empty($this->data['Photo']['photo']['name'])){
				$ori_file_name = $this->data['Photo']['photo']['name'];
				$file_name = date('Ymdhis').$this->data['Photo']['photo']['name'];
				$file = $this->File->uploadAllExtention($this->data['Photo']['photo'], FILES_FOLDER.'photo/', 3048576000, $file_name);
				//pr($file);
				if(is_array($file)) {
					$file_name = trim($file['file_name']);
					$this->request->data['Photo']['photo'] = $file_name;
				}
				//$this->request->data['Photo']['photo']=$ori_file_name;
			}else{
				$this->request->data['Photo']['photo']=$this->data['Photo']['photo_image'];
			}
			if($this->Photo->create($this->data) && $this->Photo->validates()) {
				if($this->Photo->save($this->data)) {
					$this->Session->setFlash('Photo has been added successfully.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/photo/');
				} else {
					$this->Session->setFlash('Some error has been occured. Please try again.', 'flash', array('class' => 'alert-error'));
					$this->redirect('/admin/photo/');
				}
			}
		}	
	}
	
	function update_status($status, $ids, $count){
		switch(trim($status)){
			case "activate":
				for($ctr=0;$ctr<$count;$ctr++){
					$this->Photo->id = $ids[$ctr];
					$this->Photo->saveField("status", '1');
				}
				$this->Session->setFlash('Photo(s) has been activated successfully.', 'flash', array('class' => 'alert-success'));
				break;
			case "deactivate":
				for($ctr=0;$ctr<$count;$ctr++){
					$this->Photo->id = $ids[$ctr];
					$this->Photo->saveField("status", '0');
				}
				$this->Session->setFlash('Photo(s) has been deactivated successfully.', 'flash', array('class' => 'alert-success'));
				break;
			case "delete":
				for($i=0;$i<$count;$i++){
					$photos = $this->Photo->findById($ids[$i]);
					unlink(FILES_FOLDER .'photo/'. $photos['Photo']['photo']);
					$data = array();
					$this->Photo->id = $ids[$i];
					$data = $this->Photo->read();
					$this->Photo->delete($ids[$i]);
				}
				$this->Session->setFlash('Photo(s) has been deleted successfully.', 'flash', array('class' => 'alert-success'));
				break;
		}
	}
	
	function gallery(){
		$title_for_layout = 'Photo Gallery';
		//$this->Album->bindModel(array('hasMany' => array('Photo' => array('className' => 'Photo', 'foreignKey'=>'album_id'))));
		$albums = $this->Album->find('all', array('conditions'=>array('Album.status'=>1)));
		$photos = $this->Photo->find('all', array('conditions'=>array('Photo.status'=>1)));
		$this->set(compact('title_for_layout', 'albums', 'photos'));
	}
	
	function detail($id){
		$title_for_layout = 'Photo Detail';
		$this->set(compact('title_for_layout'));
		if(!empty($id)){
			$photos = $this->Photo->findById($id);
			$albums = $this->Album->findById($photos['Photo']['album_id']);
			$related_sets = $this->Photo->find('all', array('conditions'=>array('Photo.album_id'=>$albums['Album']['id'], 'Photo.id !='=>$photos['Photo']['id'], 'Photo.status'=>1)));
			$this->set(compact('photos', 'albums', 'related_sets'));
		}else{
			$this->redirect('/');
		}
	}
	
	function index() {
		if(isset($this->params['slug'])){
			//$this->layout = 'static';
			$pageContent = $this->Content->findBySlug($this->params['slug']);
			$this->set('content', ($pageContent['Content']));
			$title_for_layout = $pageContent['Content']['page_title'];
			$this->set(compact('title_for_layout'));
			$this->render($this->params['slug']);
		}else{
			$this->redirect('/');
		}
	}
	
}
