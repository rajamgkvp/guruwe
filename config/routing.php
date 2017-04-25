<?php

/* $routing = array(
	//'/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3',
	'products/view'=>'product'
);
 */

$routing['index/getcontent0'] = array('questions', 'redirect');
$routing['index/getcontent1'] = array('guru-transfer-pro', 'redirect');
$routing['index/getcontent2'] = array('mobile', 'redirect');
$routing['index/getcontent3'] = array('policy', 'redirect');
$routing['index/getcontent4'] = array('terms', 'redirect');

$routing['index/getcontent5'] = array('about-us', 'redirect');
$routing['index/getcontent6'] = array('advertise', 'redirect');
$routing['index/getcontent7'] = array('how-it-works', 'redirect');

$routing['index/logout'] = array('logout', 'redirect');
$routing['index/profile'] = array('profile', 'redirect');
$routing['index/download'] = array('downloads', 'redirect');
$routing['index/download2'] = array('downloads2', 'redirect');

$routing['index/plans'] = array('plans', 'redirect');
$routing['index/compareplans'] = array('compare-plans', 'redirect');

$routing['index/passwordupload'] = array('password-upload', 'redirect');

$routing['products/view'] = array('product', 'redirect');
$routing['products/1234'] = array('product/(.*?)', 'regax');

$default['controller'] = 'index';

if(isset($_SESSION['Member']['id'])){
	$default['action'] = 'passwordupload';	
}else{
	$default['action'] = 'index';
}

