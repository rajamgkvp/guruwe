<?php

class Content extends Model {
	var $_table = 'guru_contents';
	//var $hasOne = array('Category' => 'Category');
	//var $hasManyAndBelongsToMany = array('Tag' => 'Tag');

	function getContent($slug){
		$this->where('slug', $slug);
		$content = $this->search();
		return $content;
	}
}