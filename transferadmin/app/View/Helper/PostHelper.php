<?php
/**
 * Session Helper provides access to the Session in the Views.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Helper
 * @since         CakePHP(tm) v 1.1.7.3328
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Post Helper.
 *
 * Session reading from the view.
 *
 * @package       Cake.View.Helper
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/session.html
 */
 

class PostHelper extends AppHelper {
	
	var $helpers = array ('Html', 'Form', 'Session'); 
	var $word_limit = 75;
	public function init(){
		
	}
	
	public function parseText($text, $isStatus =false){
		 
		// echo $text;
		
		
		//$text = htmlspecialchars(urldecode($text));
		$text = htmlspecialchars($text);
		
		//return $text;
		 //$text = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $text);
		 
		// echo $text;
		 //exit;
		 
		//$text = nl2br($text);
		$youtube = $this->youtube($text, $isStatus);
		if($youtube==false) {
			$text = strip_tags($text, '<br><p><a><strong><i><u>');
			$text = nl2br($text);
			$text = $this->autolink($text);
			//$text = chunk_split($text);
		} else {
			if($isStatus==false) {
				return $youtube;
			} else {
				$text = strip_tags($text, '<br><p><a><strong><i><u>');
				$text = $this->autolink($text);
				//$text = chunk_split($text);
			}
		}
		return $text;
	}
	
	public function makeLink($text =''){
		$text = preg_replace("#((http://|https://|ftp://|www\.)?(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie","'<a href=\"http://$1\" target=\"_blank\">$3</a>$4'",$text);
		$text = str_replace('http://http://','http://',$text);
		return $text;
	}
	
	
	function autolink($str, $attributes=array()) {
		$attrs = '';
		foreach ($attributes as $attribute => $value) {
			$attrs .= " {$attribute}=\"{$value}\"";
		}

		$str = ' ' . $str;
		$str = preg_replace('`([^"=\'>])((http://|https://|ftp://|www\.)[^\s<]+[^\s<\.)])`i','$1<a href="$2"'.$attrs.' target="_blank">$2</a>',	$str);
		$str = substr($str, 1);
		
		return $str;
	}
	
	
	public function getLink($text = '') {
		$text = preg_replace("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie","'$1$4'",$text);
		return $text;
	}

	public function isLink($txt){
		if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
			return false;
		} else {
			return true;
		}
	}
	
	function removeLink($txt){
		return preg_replace('#(<a.*?>).*?(</a>)#', '$1$2', $txt);

	}
	
	function youtube($txt, $height='226', $width='400'){
		preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $txt, $matches);
		$video_code =  @$matches[1];
		if($video_code != '') {
			$temp_txt = $this->autolink($txt);
			
			//$temp_txt = strip_tags($temp_txt);
			//return '<img src="http://img.youtube.com/vi/'.$video_code.'/1.jpg" style="height:120px; width:90px; cursor:pointer;" onClick="viewVideoOnFeed(\''.$video_code.'\',this);" />';
			return $temp_txt.'<p class="mt10"><object width="'.$width.'" height="'.$height.'" wmode="transparent"><param value="http://www.youtube.com/v/'.$video_code.'?version=3&amp;hl=en_US&amp;rel=0&amp;version=3&amp;hl=en_US&amp;rel=0&amp;wmode=transparent" name="movie"><param value="transparent" name="wmode"><param value="true" name="allowFullScreen"><param value="always" name="allowscriptaccess"><embed width="'.$width.'" height="'.$height.'" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://www.youtube.com/v/'.$video_code.'?version=3&amp;hl=en_US&amp;rel=0&amp;version=3&amp;hl=en_US&amp;rel=0&amp;wmode=transparent" wmode="transparent"></embed></object></p>';
		} else {
			return false;
		}
	}


/* @author arun
 * @purpose this function will return the groups owner is logged in user or not
 * @params	group creator id
 */

	function isGroupCreatorLoggedInUser($groupCreatorId){
		
		
		$loggedInMember	=$this->Session->read('member');
		if($loggedInMember['Member']['id']==$groupCreatorId){
			
			return true;
		} else{
			
			return false;
		}
		
	}



}