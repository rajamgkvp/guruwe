<?php
 
class Album extends AppModel {

/**
 * Name of the model.
 *
 * @var string
 * @access public
 */
	
   var $name = 'Album';

/**
 * Custom database table name.
 *
 * @var string
 * @access public
 */
   
	public $validate = array(
		'title' => array(
			 'required' => array('rule' => array('notEmpty'), 'last'=>true, 'message' => 'Please enter title'),
		)
	);


}
?>