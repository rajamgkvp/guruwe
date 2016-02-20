<?php

class Controller {
	
	protected $_controller;
	protected $_action;
	protected $_template;

	public $doNotRenderHeader;
	public $render;
	public $baseUrl;

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

	function __destruct() {
		if ($this->render) {
			$this->_template->render($this->doNotRenderHeader);
		}
	}
		
}