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
class AlbumController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Album');
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
		$this->pageTitle = 'Manage Album';
		
		if(!empty($this->data)){
			// check for status change
			if(isset($this->data['Album']['submit']) && trim($this->data['Album']['submit']) == 'Submit'){
				if(isset($this->data['Album']['id']) && count($this->data['Album']['id']) > 0){
					$this->update_status(trim($this->data['Album']['status']), $this->data['Album']['id'], count($this->data['Album']['id']));
				} else {
					$this->Session->setFlash('Please select any checkbox to perform any action.', 'flash', array('class' => 'alert-warning'));
				}
			}
		}
		$conditions = array();
		$this->paginate = array('limit' => '10', 'order' => array('Album.created' => 'DESC'));
		$contents = $this->paginate('Album', $conditions); //default take the current
		$this->set('content', $contents);
	
		$this->set('mode', array('activate'=>'Activate' ,'deactivate'=>'Deactivate' , 'delete'=>'Delete'));
		$this->set('limit', $this->params['request']['paging']['Content']['options']['limit']);
		$this->set('page', $this->params['request']['paging']['Content']['options']['page']);
	}
	
	function admin_add() {
	
		$this->checkLogin();

		if(!empty($this->data)) {
		
			// pr($this->data);
					
			if($this->Album->create($this->data) && $this->Album->validates()) {
				if($this->Album->save($this->data)) {
					$content_id = $this->Album->getLastInsertID();
					$this->Session->setFlash('Album has been created successfully.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/album/');
				} else {
					$this->Session->setFlash('Some error has been occured. Please try again.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/album/');
				}
			}
			else {
				// pr($this->Content->validationErrors);
				//debug("Some error occured while validating the data");
			}
		}
	}

	function admin_edit($id = null) {
	
		// Setting page title for each page
		$this->pageTitle = 'Edit Album';
		
		if(!empty($this->data) && is_numeric($this->data['Album']['id'])) {
		
			if($this->Album->create($this->data) && $this->Album->validates()) {
			
				if($this->Album->save($this->data)) {
					$this->Session->setFlash('Album information has been updated successfully.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/album/');
				} else {
					$this->Session->setFlash('Some error has been occured. Please try again.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/album/');
				}
			} else {
				$this->Album->invalidFields();
			}
		}
		else {
			if(is_numeric($id) && $id > 0) {
			
				$this->Album->id = $id;
				$content_info = $this->Album->read();
				$this->request->data = $content_info;
			} else {
				$this->Session->setFlash('Invalid Album id.');
				$this->redirect('/admin/album/');
			}
		}
		
		$this->set('pid', $id);
	
	}
	
	function update_status($status, $ids, $count){
		switch(trim($status)){
			case "activate":
				for($ctr=0;$ctr<$count;$ctr++){
					$this->Album->id = $ids[$ctr];
					$this->Album->saveField("status", '1');
				}
				$this->Session->setFlash('Album(s) has been activated successfully.', 'flash', array('class' => 'alert-success'));
				break;
			case "deactivate":
				for($ctr=0;$ctr<$count;$ctr++){
					$this->Album->id = $ids[$ctr];
					$this->Album->saveField("status", '0');
				}
				$this->Session->setFlash('Content(s) has been deactivated successfully.', 'flash', array('class' => 'alert-success'));
				break;
			case "delete":
				for($i=0;$i<$count;$i++){
					$photos = $this->Photo->find('all', array('conditions'=>array('Photo.album_id'=>$ids[$i])));
					foreach($photos as $photo){
						$this->Photo->id = $photo['Photo']['id'];
						$this->Photo->saveField("album_id", '0');
					}
					$data = array();
					$this->Album->id = $ids[$i];
					$data = $this->Album->read();
					$this->Album->delete($ids[$i]);
				}
				$this->Session->setFlash('Album(s) has been deleted successfully.', 'flash', array('class' => 'alert-success'));
				break;
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
