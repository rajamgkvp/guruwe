<?php

class ErrorsController extends Controller {
	
	function beforeAction () {

	}

	function error404() {
		$data = array();
		$data['request_uri'] = $_SERVER['REQUEST_URI'];

		if(isset($_SERVER['HTTP_REFERER']))
			$data['referral_url'] = $_SERVER['HTTP_REFERER'];

		$data['ip'] = $_SERVER['REMOTE_ADDR'];
		$data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$data['server_json'] = json_encode($_SERVER);
		$data['record_date'] = date("Y-m-d H:i:s", time());

		header("HTTP/1.0 404 Not Found");
		/* ==================== SEO UPDATE ============= */
		$this->set('title','404 Page not found - '.SITE_NAME);
		$this->set('metadesc', SITE_NAME.': 404 Page not Found.');
		$this->set('metakeywords', SITE_NAME.', 404, 404 Page not Found');
		/* ==================== SEO UPDATE ============= */
		$this->render = 0;
		$this->_template->render(1, 'error/404');
	}


	function afterAction() {

	}
	

}