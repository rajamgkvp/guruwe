<?php

/** Configuration Variables **/

define ('DEVELOPMENT_ENVIRONMENT',true);

if($_SERVER['HTTP_HOST']=='localhost'){
	define ('BASE_PATH','http://'.$_SERVER['HTTP_HOST'].'/gurutransfer');
	define ('ADMIN_PATH','http://'.$_SERVER['HTTP_HOST'].'/gurutransfer/transferadmin/');
	define ('API_TARGET_URL','http://'.$_SERVER['HTTP_HOST'].'/gurutransfer/api/');
}else{
	define ('BASE_PATH','http://'.$_SERVER['HTTP_HOST']);
	define ('ADMIN_PATH','http://'.$_SERVER['HTTP_HOST'].'/transferadmin/');
	define ('API_TARGET_URL','http://'.$_SERVER['HTTP_HOST'].'/api/');
}

define ('SITE_NAME','GuruTransfer');

//define ('FACEBOOK_APP_ID','1535182570125606');
define ('FACEBOOK_APP_ID','1535182570125606');
define ('FBPERMISSIONS','public_profile,email,user_location,user_hometown');
define ('FACEBOOK_SECRET','b1c41c4619d1dc9a7f94e7dd2c69896e');

if($_SERVER['HTTP_HOST']=='localhost'){
	define('DB_NAME', 'gurutransfer');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
}else{
	define('DB_NAME', 'guru');
	define('DB_USER', 'guru');
	define('DB_PASSWORD', 'Guru@123');
	define('DB_HOST', '139.162.63.185');
}


define('PAGINATE_LIMIT', '5');

define('VIEW_PATH', ROOT . DS . 'application' . DS .'views');
define('UPLOADS_PATH', ROOT . DS . 'public' . DS .'uploaded');
