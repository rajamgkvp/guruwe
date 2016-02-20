<?php
 
class Photo extends AppModel {

/**
 * Name of the model.
 *
 * @var string
 * @access public
 */
	
   var $name = 'Photo';

/**
 * Custom database table name.
 *
 * @var string
 * @access public
 */
   
	public $validate = array(
		'title' => array(
			 'required' => array('rule' => array('notEmpty'), 'last'=>true, 'message' => 'Please enter title'),
		),
		'photo' => array(
			 'required' => array('rule' => array('notEmpty'), 'last'=>true, 'message' => 'Please enter title'),
		)
	);


}
?>