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
class ContentController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Content');
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
		$this->pageTitle = 'Manage Content';
		
		if(!empty($this->data)){
			// check for status change
			if(isset($this->data['Content']['submit']) && trim($this->data['Content']['submit']) == 'Submit'){
				if(isset($this->data['Content']['id']) && count($this->data['Content']['id']) > 0){
					$this->update_status(trim($this->data['Content']['status']), $this->data['Content']['id'], count($this->data['Content']['id']));
				} else {
					$this->Session->setFlash('Please select any checkbox to perform any action.', 'flash', array('class' => 'alert-warning'));
				}
			}
		}
	
		$conditions[] = array('Content.content_type' => 'contents');
		$this->paginate = array('limit' => '10', 'order' => array('Content.created' => 'DESC'));
		$contents = $this->paginate('Content', $conditions); //default take the current
		$this->set('content', $contents);
	
		$this->set('mode', array('activate'=>'Activate' ,'deactivate'=>'Deactivate' , 'delete'=>'Delete'));
		$this->set('limit', $this->params['request']['paging']['Content']['options']['limit']);
		$this->set('page', $this->params['request']['paging']['Content']['options']['page']);
	}
	
	function admin_add() {
	
		$this->checkLogin();

		if(!empty($this->data)) {
		
			// pr($this->data);
					
			if($this->Content->create($this->data) && $this->Content->validates()) {
			
				$this->request->data['Content']['content_type'] = "contents";
				$this->request->data['Content']['page_title'] = $this->data['Content']['page_title'];
				$this->request->data['Content']['slug'] = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(trim($this->data['Content']['page_title'])));
				$content = $this->data['Content']['content'];
				if($this->Content->save($this->data)) {
				
					$content_id = $this->Content->getLastInsertID();
					$this->Session->setFlash('Content has been created successfully.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/content/');
				} else {
					$this->Session->setFlash('Some error has been occured. Please try again.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/content/');
				}
			}
			else {
				// pr($this->Content->validationErrors);
				//debug("Some error occured while validating the data");
			}
		}
	}

	function admin_edit($id = null, $language_code = 'en') {
	
		// Setting page title for each page
		$this->pageTitle = 'Edit Content';
		
		if(!empty($this->data) && is_numeric($this->data['Content']['id'])) {
		
			if($this->Content->create($this->data) && $this->Content->validates()) {
			
				$this->request->data['Content']['content_type'] = "contents";
				$this->request->data['Content']['page_title'] = $this->data['Content']['page_title'];
				//$this->request->data['Content']['slug'] = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(trim($this->data['Content']['page_title'])));
				
				if($this->Content->save($this->data)) {
					$this->Session->setFlash('Content information has been updated successfully.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/content/');
				} else {
					$this->Session->setFlash('Some error has been occured. Please try again.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/content/');
				}
			} else {
				$this->Content->invalidFields();
			}
		}
		else {
			if(is_numeric($id) && $id > 0) {
			
				$this->Content->id = $id;
				$content_info = $this->Content->read();
				$this->request->data = $content_info;
			} else {
				$this->Session->setFlash('Invalid content id.');
				$this->redirect('/admin/content/');
			}
		}
		
		$this->set('pid', $id);
	
	}
	
	function update_status($status, $ids, $count){
		switch(trim($status)){
			case "activate":
				for($ctr=0;$ctr<$count;$ctr++){
					$this->Content->id = $ids[$ctr];
					$this->Content->saveField("status", '1');
				}
				$this->Session->setFlash('Content(s) has been activated successfully.', 'flash', array('class' => 'alert-success'));
				break;
			case "deactivate":
				for($ctr=0;$ctr<$count;$ctr++){
					$this->Content->id = $ids[$ctr];
					$this->Content->saveField("status", '0');
				}
				$this->Session->setFlash('Content(s) has been deactivated successfully.', 'flash', array('class' => 'alert-success'));
				break;
			case "delete":
				for($i=0;$i<$count;$i++){
					$data = array();
					$this->Content->id = $ids[$i];
					$data = $this->Content->read();
					$this->Content->delete($ids[$i]);
				}
				$this->Session->setFlash('Content(s) has been deleted successfully.', 'flash', array('class' => 'alert-success'));
				break;
		}
	}
		
	function contactus(){
		
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
