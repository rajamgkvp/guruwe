<?php

class Slider extends Model {
	var $_table = 'guru_sliders';
	//var $hasOne = array('Category' => 'Category');
	//var $hasManyAndBelongsToMany = array('Tag' => 'Tag');

	function getSliders(){
		$this->where('status', 1);
		$sliders = $this->search();
		return $sliders;
	}
}