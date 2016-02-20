<?php
 
class Content extends AppModel {

/**
 * Name of the model.
 *
 * @var string
 * @access public
 */
	
   var $name = 'Content';

/**
 * Custom database table name.
 *
 * @var string
 * @access public
 */
   
   var $useTable = "contents";	
	public $validate = array(
		'page_title' => array(
			 'required' => array('rule' => array('notEmpty'), 'last'=>true, 'message' => 'Please enter page title'),
		)
	);


}
?>