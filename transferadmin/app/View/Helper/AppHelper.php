<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

	function getimage($type, $name, $altname, $size=98, $desiredsize=98, $style="", $id=""){
		$filePath = SITE_URL."files/".$type."/".$size."x".$size."/".$name;
		if((!empty($name))) {
			return "<img src='".$filePath."' alt='".ucwords($altname)."' id='".$id."' class='ml10' width='".$desiredsize."' style='".$style."'/>";
		} else {
			return "<img src='".SITE_URL."img/user.jpg' alt='".ucwords($altname)."' id='".$id."' class='ml10' width='".$desiredsize."' style='".$style."'/>";
		}
	}

}
