<?php

class Blogpost extends Model {
	var $_table = 'gurublog_posts';
	//var $hasOne = array('Category' => 'Category');
	//var $hasManyAndBelongsToMany = array('Tag' => 'Tag');

	function getContent($slug){
		$this->where('post_name', $slug);
		$this->where('post_type', 'page');
		$content = $this->search();
		return $content;
	}
}