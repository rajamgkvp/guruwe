<?php

class Slider extends Model {
	var $_table = 'guru_sliders';
	//var $hasOne = array('Category' => 'Category');
	//var $hasManyAndBelongsToMany = array('Tag' => 'Tag');

	function getSliders(){
		$this->where('status', 1);
		$this->orderBy('order','ASC');
		$sliders = $this->search();
		return $sliders;
	}
}