<?php

/** Configuration Variables **/

define ('DEVELOPMENT_ENVIRONMENT',true);

$s = null;
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
	 $s = 's';
}

if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='139.162.20.253'){
	define ('BASE_PATH','http://'.$_SERVER['HTTP_HOST'].'/gurutransfer');
	define ('ADMIN_PATH','http://'.$_SERVER['HTTP_HOST'].'/gurutransfer/transferadmin/');
	define ('API_TARGET_URL','http://139.162.20.253/soc/');
	define ('DIGEST','test:123456');
}else{
	define ('BASE_PATH','http'.$s.'://'.$_SERVER['HTTP_HOST']);
	define ('ADMIN_PATH','http'.$s.'://'.$_SERVER['HTTP_HOST'].'/transferadmin/');
	define ('API_TARGET_URL','http'.$s.'://'.$_SERVER['HTTP_HOST'].'/api/');
	define ('DIGEST','gTSeventeenCube:GtSeventeen3123app01');
}

define ('SITE_NAME','GuruTransfer');

define ('FACEBOOK_APP_ID','1535182570125606');
//define ('FACEBOOK_APP_ID','284717701632906');
define ('FBPERMISSIONS','public_profile,email');
define ('FACEBOOK_SECRET','5dfcdb5afba6115eefb007acdbd3c3d2');

if($_SERVER['HTTP_HOST']=='localhost'){
	define('DB_NAME', 'gurutransfer');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
}else if($_SERVER['HTTP_HOST']=='139.162.20.253'){
	define('DB_NAME', 'guru');
	define('DB_USER', 'guru');
	define('DB_PASSWORD', 'Guru@123');
	define('DB_HOST', '139.162.20.253');
}else{
	define('DB_NAME', 'guru');
	define('DB_USER', 'guru');
	define('DB_PASSWORD', 'Guru@123');
	define('DB_HOST', '139.162.63.185');
}


define('PAGINATE_LIMIT', '5');

define('VIEW_PATH', ROOT . DS . 'application' . DS .'views');
define('UPLOADS_PATH', ROOT . DS . 'public' . DS .'uploaded');
