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
class AdminsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Admin');

	public function beforeFilter() {   
		parent::beforeFilter();
		$session = $this->Session->read('admin');
		$this->set(compact('session'));
			// Controller spesific beforeFilter
    }
	
	/**
	 * Views file to use (see /app/views/users/login.thtml).
	 * @return controllers related admin views
	 * @access public
	*/   	
	public function admin_index() {
		$title_for_layout = 'Login';
		$this->set(compact('title_for_layout'));
		$admin = $this->Session->read('admin');
		if(empty($admin)){
			$admin = $this->Cookie->read('admin');
		}
		
		
	}
	
	
	public function admin_dashboard($usertype = null) {
		$title_for_layout = 'Dashbord';
		$this->checkLogin();
		$this->set(compact('title_for_layout'));
	}
	
	
	public function admin_login() {
		$title_for_layout = 'Login';
		$this->set(compact('title_for_layout'));
		$this->layout = false;
		$admin = $this->Session->read('admin');
		if(empty($admin)){
			$admin = $this->Cookie->read('admin');
		}
		
		
		
		if(empty($admin)){
			if(!empty($this->data))
			{
				if($this->Admin->create($this->data) && $this->Admin->validates())
				{ 
					$someOne = $this->Admin->findByUsername($this->data['Admin']['username']);					
					if(!empty($someOne)) {
					
						if($someOne['Admin']['status_id'] == '1') {
					
							if(!empty($someOne) && $someOne['Admin']['password'] == md5($this->data['Admin']['password'])) {
								$this->Session->write('admin' , $someOne);
								if($this->data['Admin']['remember'] == '1'){
									$this->Cookie->write('admin', $someOne, false, 3600);
								}
								$this->redirect('/admin/admins/index');
							}
							else {
								$this->Session->setFlash('Username or password is invalid.', 'flash', array('class' => 'alert-error'));
								$this->redirect('/admin');
							}
						}
						else {
							$this->Session->setFlash('Your account is inactive.', 'flash', array('class' => 'alert-error'));
							$this->redirect('/admin');
						}
					}
					else {	
						$this->Session->setFlash('Wrong Username or Password, Please try again.', 'flash', array('class' => 'alert-error'));
						$this->redirect('/admin');
					}
				}
				else {	
					//pr($this->User->validationErrors);
					//$this->User->invalidFields();
				}
			}
		}else{
			$this->redirect('/admin/admins/index');
		}
	}
	
	/**
	 * A logout action.
	 * Views file to use (see /app/views/users/login.thtml).
	 * @return controllers related admin views
	 * @access public
	*/  
   	function admin_logout() {
	
		 $this->layout = false;
		
		 $this->Session->write('admin' , '');
		 $this->Session->delete('admin');
		 $this->Session->setFlash('You have logged out successfully.', 'flash', array('class' => 'alert-success'));
		 $this->redirect('/admin');
	}

	public function admin_setting() {
		$title_for_layout = 'Settings';
		$this->set(compact('title_for_layout'));
	}
	
	
}
