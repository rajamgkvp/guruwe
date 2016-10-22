<?php

class Controller {

	protected $_controller;
	protected $_action;
	protected $_template;

	public $doNotRenderHeader;
	public $render;
	public $baseUrl;

	public $title;
	public $metadesc;
	public $metakeywords;

	function __construct($controller, $action) {

		global $inflect;

		$this->_controller = ucfirst($controller);
		$this->_action = $action;

		$model = ucfirst($inflect->singularize($controller));
		$this->doNotRenderHeader = 0;
		$this->render = 1;

		if(class_exists($model)){
			$this->$model = new $model;
		}
		$this->_template = new Template($controller,$action);
		$this->set('controllername',$this->_controller);
		$this->set('actionname',$this->_action);
		$this->set('navmenu',$this->getnav());
	}

	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function getnav(){
		$navmenu = array('Home'=>'/');
		return $navmenu;
	}

	public function getrequesturi($key = NULL){
		$request_type1 = explode('?', $_SERVER['REQUEST_URI']);
		if(isset($request_type1[1])){
			$request_type2 = explode('&', $request_type1[1]);
			$get = array();
			foreach($request_type2 as $getdata){
				$explode = explode('=', $getdata);
				$get[$explode[0]] = $explode[1];
			}

			if($key == NULL){
	            return $get;
	        }

	        if (isset($get[$key])) {
	            return $get[$key];
	        }
		}else{
			return '';
		}
	}

	function __destruct() {
		if ($this->render) {
			$this->_template->render($this->doNotRenderHeader);
		}
	}

}
