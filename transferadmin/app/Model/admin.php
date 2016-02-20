<?php

class Admin extends AppModel {

/**
 * Name of the model.
 *
 * @var string
 * @access public
 */
 
	
   public  $name = 'Admin';
   
/**
 * Custom database table name.
 *
 * @var string
 * @access public
 */
 
   public  $validate = NULL;
   
  
/**
 * List of validation rules. Append entries for validation as ('field_name' => '/^perl_compat_regexp$/')
 * that have to match with preg_match(). Use these rules with  Model::validate()
 *
 * @var array
 * @access public
 */
 
   
   
   function isAdminEmailMatched( $field=array(), $compare = null ){

		foreach( $field as $key => $value ){
            if($key == 'email'){
				$conditions = array(" Admin.email"=> trim($value));
				$arr =  $this->find('all', array("conditions" => $conditions), array('Admin.email'));
				if(count($arr) > 0){
					return true;
				} else {
					return false;
				}
			}
        }
	}
}
?>