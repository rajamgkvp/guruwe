<?php
/**
 * This is Helper file which inherit the AppHelper 
 *
 * This file is site-wide Helper file. Where we can put all
 * site-wide view-related methods here.
 *
 * @copyright     2012-13 IM-CARE
 * @link          http://www.iam-care.com
 * @package       IAMCARE
 * @since         January 2012
 * @license       IAM-CARE
 * @author        EMP-1040
 */
 
App::import('Helper', 'html');

class FckHelper extends Helper {

    function load($id) {
        $did = '';
        foreach (explode('.', $id) as $v) {
            $did .= ucfirst($v);
        } 

        $code = "CKEDITOR.replace( '".$did."' );";
        return $this->Javascript->codeBlock($code); 
    }
}
?>