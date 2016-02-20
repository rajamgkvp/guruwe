<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	var $helpers = array('Text', 'Form', 'Html', 'Js', 'Time', 'Session', 'Post'); 
	public $components = array('Session', 'Cookie', 'RequestHandler','Email');
	var $uses = array('Admin', 'Content', 'Photo');
	
	public function beforeFilter() {
		if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
			$this->layout = 'admin';
		}
		
		$logged_user = $this->Session->read('member');
		$this->set(compact('logged_user'));
		
		$this->controller_name = $this->request->params['controller'];
		$this->action_name = $this->request->params['action'];
		
		$this->set('controller_name',$this->controller_name);
		$this->set('action_name',$this->action_name);
		
		
		######### CODE ADDED FOR URL DECRYPTION #########
		$key_array_to_be_encrypt = array('id','album_id','group_id','member_id');
		foreach($this->params['named'] as $key=>$value) {
			if(in_array($key,$key_array_to_be_encrypt)) {
				$this->request->params['named'][$key] = Router::spDecrypt($value);
			}
		}
		################# DECRYPTION CODE END HERE #################
		
		$aboutcontent = $this->Content->findBySlug('about-us');
		$this->set(compact('aboutcontent'));
	}
	
	function checkLogin(){
		if(!$this->Session->check('admin') && !$this->Cookie->check('admin')) {
			$this->redirect('/admin');
		}
	}
	
	function checkMemberLogin(){
		$mem = $this->Session->read('member');
		if(!$this->Session->check('member') || empty($mem)) {
			$this->redirect('/');
		}
	}

	function unauthorize_request($original_user_id){
		if($this->logged_user['Member']['id']!=$original_user_id) {
			$this->redirect(array('controller'=>'index','action'=>'unauthorize','plugin'=>false));
		}
	}
}