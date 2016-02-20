<?php
/**
* class to resize images
* this class need GD to resize images
*
* usage:
* $img = new ImageComponent();
* $img->resizeImage(/path/to/original/image, width, /path/to/original/new_image);
*
* Author: Vikramjeet Singla
* Created Date: 06/08/2008
**/

//App::import('Vendor', 'imageresize/ThumbLib.inc'); 
require_once(dirname(__FILE__).'/../../Vendor/imageresize/ThumbLib.inc.php');

class ImageComponent extends Component {
	/**
	* PHP5 constructor
	**/
	function __construct(){
	}

	/**
	* PHP4 constructor
	**/
	function ImageComponent(){
		$this->__construct();
	}

	/**
	* function to resize image file
	* @param $imgname:string	
	* @param $size:integer
	* @param $filename:string
	* @return mixed
	**/
	function resizeImage($imgname, $size, $filename) {
		$thumb = PhpThumbFactory::create($imgname);
		$thumb->adaptiveResize($size, $size);
		$thumb->save($filename);
    }
}	
?>