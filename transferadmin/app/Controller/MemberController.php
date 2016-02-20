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
class MemberController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Content');
	var $components = array('Image');

	public function beforeFilter() {   
		parent::beforeFilter();
		
			// Controller spesific beforeFilter
    }
	
	/**
	 * Views file to use (see /app/views/users/login.thtml).
	 * @return controllers related admin views
	 * @access public
	*/

	public function index(){
		$this->redirect(SITE_URL.'admin');
	}
	public function admin_index() {
		$title_for_layout = 'Homepage';
		$this->set(compact('title_for_layout'));

		$this->pageTitle = 'Manage Members';
		
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
	
	
	function logout() {
		 $this->layout = false;
		 $this->Session->write('member' , '');
		 $this->Session->delete('member');
		 $this->Session->setFlash('You have logged out successfully.', 'flash', array('class' => 'alert-success'));
		 $this->redirect('/');
	}
	
	
}
