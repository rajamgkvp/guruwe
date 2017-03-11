<?php
require_once(ROOT . DS .'public/inc/facebooksdk/facebook.php' );
error_reporting(0);
class IndexController extends Controller {

	function beforeAction () {

	}

	function index($id = null) {
		$this->set('slug','/');
		$Slider = new Slider();
		$sliders = $Slider->getSliders();
		$this->set('sliders',$sliders);

		$this->title = 'Guru  Transfer | Send Big Files Online | Upload Large File Free';
		$this->set('title',$this->title);

		$this->metadesc = 'GuruTransfer: Send Big Files Online, Upload Large File Free, Transfer and Cloud Storage Service. Keep your data with your email at all time, on the go!';
		$this->set('metadesc',$this->metadesc);

		$this->metakeywords = 'GuruTransfer, filetransfer, file transfer, file, transfer, transfer files';
		$this->set('metakeywords',$this->metakeywords);

	}


	function passwordupload($id = null) {
		$this->set('slug','/');
		$Slider = new Slider();
		$sliders = $Slider->getSliders();
		$this->set('sliders',$sliders);

		$this->title = 'Guru  Transfer | Send Big Files Online | Upload Large File Free';
		$this->set('title',$this->title);

		$this->metadesc = 'GuruTransfer: Send Big Files Online, Upload Large File Free, Transfer and Cloud Storage Service. Keep your data with your email at all time, on the go!';
		$this->set('metadesc',$this->metadesc);

		$this->metakeywords = 'GuruTransfer, filetransfer, file transfer, file, transfer, transfer files';
		$this->set('metakeywords',$this->metakeywords);


		$target_url = API_TARGET_URL.'expiretime';
		$result = array();
        $data = $this->curl($target_url, array());
        $expire_time = (array)$data->data;
        $this->set('expire_time',$expire_time);

        if(isset($_SESSION['Member']['id'])){
        	$target_url = API_TARGET_URL.'getsecurecount';
			$result = array();
	        $data = $this->curl($target_url, array('uid'=>$_SESSION['Member']['id']));
	        $countremain = ($data->max) - ($data->count);	
        }else{
        	$countremain = 0;	
        }
    	$this->set('countremain',$countremain);
	}


	function afterAction() {

	}

	function upload(){
		//echo "<pre>"; print_r($_POST); echo "</pre>";
		//echo "<pre>"; print_r($_FILES); echo "</pre>";
		//exit;
		$this->render = 0;
		$return_array = array('error'=>true,'message'=>'There is some problem while uploading, please try again later');

		$max_size = 1024*1024*1024*3;
		//$extensions = array('jpeg', 'jpg', 'png');
		$dir = UPLOADS_PATH.'/';
		$count = 0;
		$target_url = API_TARGET_URL.'filemuploade';

		$files_arr = array();
		if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_FILES['files']))
		{
			//echo "<pre>"; print_r($_FILES['files']['tmp_name']); echo "</pre>";
			//exit;
			// loop all files
			foreach ( $_FILES['files']['name'] as $i => $name){
			// if file not uploaded then skip it
				if ( !is_uploaded_file($_FILES['files']['tmp_name'][$i]) ){
					continue;
				}

			    // skip large files
	            if ( $_FILES['files']['size'][$i] >= $max_size ){
	                    continue;
	            }
            	// now we can move uploaded files
                //echo $_FILES["files"]["tmp_name"][$i]; echo $dir.$name;
                if( move_uploaded_file($_FILES["files"]["tmp_name"][$i], $dir . $name) ){
                   $files_arr["uploads"][$i] = $dir.$name;
                   $post["uploads[$i]"] = '@'.$dir.$name;
                    $count++;
                }
            }

           //echo "<pre>"; print_r($files_arr); echo "</pre>";
			//exit;
			//$uploads[] = $_FILES['files'];

            if($_POST['openedblock'] != 'link-block'){
            	$post['from'] = $_POST['from_email'];
	            $post['to'] = implode(',',$_POST['friend_email']);
	            $post['message'] = $_POST['message'];
            }

            if(isset($_SESSION['Member']['id'])){
        		$post['userId'] = $_SESSION['Member']['id'];
        	}else{
        		$post['userId'] = 0;
        	}

            $post['source'] = 'web';

            //echo "<pre>"; print_r($post);
            //$query = http_build_query($post, '', '&');

            $result = array();
            $result = $this->curl($target_url, $post);

            foreach($files_arr['uploads'] as $files_ar){
                    unlink($files_ar);
            }
            $result = (array)$result;
			//echo "<pre>"; print_r($result); echo "</pre>";exit;
            echo json_encode($result);
        }
        //echo json_encode(array('count' => $count));
        exit;
    }

    function upload_files(){
    	$this->render = 0;

    	$dir = UPLOADS_PATH.'/';
    	$post = array();

    	if(isset($_POST['files'])) {
			$json = $_POST['files'];
			$files = json_decode($json, true);
			//echo "<pre>"; print_r($files); echo "</pre>";

			$formdata = $_POST['formdata'];
			$query_data = json_decode($formdata, true);
			parse_str($query_data, $data);
			//echo "<pre>"; print_r($data); echo "</pre>";

			if($data['password'] != ''){
	    		$target_url = API_TARGET_URL.'filemuploadeadvance';
	    	}else{
	    		//$target_url = API_TARGET_URL.'filemuploadeadvance';
	    		$target_url = API_TARGET_URL.'filemuploade';
	    	}

			foreach ($files as $key => $files_name) {
				$files_arr["uploads"][$key] = $dir.$files_name;
            	$post["uploads[$key]"] = '@'.$dir.$files_name;
			}

			if($data['openedblock'] != 'link-block'){
            	$post['from'] = $data['from_email'];
	            $post['to'] = implode(',',$data['friend_email']);
	            $post['message'] = $data['message'];
            }

            if($data['password'] != ''){
            	$post['expire'] = $data['expire_time'];
            	$post['password'] = $data['password'];
        	}

        	if(isset($_SESSION['Member']['id'])){
        		$post['userId'] = $_SESSION['Member']['id'];
        	}else{
        		$post['userId'] = 0;
        	}
            
            $post['source'] = 'web';

			$result = array();
			$result = $this->curl($target_url, $post);

            foreach($files_arr['uploads'] as $files_ar){
                unlink($files_ar);
            }

            $result = (array)$result;
			//echo "<pre>"; print_r($result); echo "</pre>";exit;
            echo json_encode($result);
		}
		exit;
    }

	function getcontent(){
		$explode =  explode('/', $_SERVER['REQUEST_URI']);
		if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='139.162.20.253'){
			$slug = $explode[2];
		}else{
			$slug = $explode[1];
		}
		$Content = new Content();
		$content = $Content->getContent($slug);
		$this->set('slug',$slug);
		$this->set('content',$content);

		$this->title = $content[0]['Content']['page_title'];
		$this->set('title',$this->title);
		$this->metadesc = $content[0]['Content']['short_description'];
		$this->set('metadesc',$this->metadesc);
		$this->metakeywords = 'GuruTransfer, filetransfer, file transfer, file, transfer, transfer files';
		$this->set('metakeywords',$this->metakeywords);
	}

	function feedback(){
		$this->render = 0;
		$post['name'] = $_POST['name'];
		$post['email'] = $_POST['email'];
		$post['feedback'] = $_POST['feedback'];
		$target_url = API_TARGET_URL.'feedback';
		//echo "<pre>"; print_r($post); echo "</pre>";
		$result = $this->curl($target_url, $post);
		echo json_encode($result);
		exit;
	}

	function facebooklogin(){
		$this->render = 0;
		$facebook_response['access_token'] = $_POST['access_token'];
    	$facebook_response['hometown'] = $_POST['hometown'];
    	$facebook_response['location'] = $_POST['location'];
    	$facebook_response['email'] = $_POST['email'];
    	$facebook_response['gender'] = $_POST['gender'];
    	$facebook_response['first_name'] = $_POST['first_name'];
    	$facebook_response['last_name'] = $_POST['last_name'];
    	$facebook_response['facebook_id'] = $_POST['facebook_id'];

  		// $return_url = BASE_PATH.'/facebook/';
		// $facebook = new Facebook(array(
		// 	'appId' => FACEBOOK_APP_ID,
		// 	'secret' => FACEBOOK_SECRET,
		// ));

		// $fbuser = $facebook->getUser();

		// if ($fbuser) {
		// 	try {
		// 		$facebook_response = $facebook->api('/me');
		// 		$uid = $facebook->getUser();
		// 	}catch (FacebookApiException $e)
		// 	{
		// 		$fbuser = null;
		// 	}
		// }
		//  echo "<pre>"; print_r($fbuser); echo "</pre>"; exit;

		// redirect user to facebook login page if empty data or fresh login requires
		// if (!$fbuser){
		// 	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$return_url, false));
		// 	header('Location: '.$loginUrl);
		// }

		$post = array();
		$post['email'] = $facebook_response['email'];
		$post['name'] = $facebook_response['first_name'] . ' ' . $facebook_response['last_name'];
		$post['gender'] = $facebook_response['gender'];
		$post['dob'] = '';
		$post['data'] = serialize($facebook_response);


		$target_url = API_TARGET_URL.'getuser';
		$result = $this->curl($target_url, array('email'=>$facebook_response['email']));
		//echo "<pre>"; print_r($result); echo "</pre>"; exit;
		if($result->response == 400){
			$target_url = API_TARGET_URL.'adduser';
			$result = $this->curl($target_url, $post);
		}

		if($result->response == 200){
			$result = (array)$result;
			$result['facebook_id'] = $facebook_response['facebook_id'];
			$_SESSION['Member'] = $result;
		}
		$result = (array)$result;
		echo json_encode($result);
		exit;
	}

	function curl($target_url, $post, $ispost = true){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$target_url);
		if($ispost){
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_TIMEOUT,1000);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}

		$digest =  DIGEST;
		//$digest =  "gTSeventeenCube:GtSeventeen3123app01";
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_USERPWD, $digest );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$result=curl_exec ($ch);
		curl_close ($ch);
        return json_decode($result);
	}

	function logout(){
		$this->render = 0;
		session_start();
		unset($_SESSION['Member']);
		header('Location: /');
	}

	function download(){
		$this->set('slug','/');
		$Slider = new Slider();
		$sliders = $Slider->getSliders();
		$this->set('sliders',$sliders);

		$this->title = 'GuruTransfer';
		$this->set('title',$this->title);

		$this->metadesc = 'GuruTransfer is a Secure File Transfer and Cloud Storage Service. Keep your data with you at all time, on the go!';
		$this->set('metadesc',$this->metadesc);

		$this->metakeywords = 'GuruTransfer, filetransfer, file transfer, file, transfer, transfer files, Download files';
		$this->set('metakeywords',$this->metakeywords);

		$download_link = '';

		$env = $download_link.$this->getrequesturi('e');
		if($env =='l'){
			$download_link = BASE_PATH.'/download/down.php?f=';
		}else{
			$download_link = 'http://139.162.20.253/download/down.php?f=';
		}
		$download_link = $download_link.$this->getrequesturi('url');
		$this->set('download_link',$download_link);

		//&d=MTQy
		$passworddata = array();
		if($this->getrequesturi('d') != ''){
			$post = array();
			$target_url = API_TARGET_URL.'getdlink';
			$post['did'] = base64_decode($this->getrequesturi('d'));
			$result = array();
	        $passworddata = $this->curl($target_url, $post);
	        $passworddata = (array)$passworddata;
		}
		$this->set('passworddata',$passworddata);
	}

	function profile(){
		if(isset($_SESSION['Member']) && !empty($_SESSION['Member'])){
			$this->set('slug','/');
			
			$this->title = 'Profile | GuruTransfer';
			$this->set('title',$this->title);

			$this->metadesc = 'GuruTransfer is a Secure File Transfer and Cloud Storage Service. Keep your data with you at all time, on the go!';
			$this->set('metadesc',$this->metadesc);

			$this->metakeywords = 'GuruTransfer, filetransfer, file transfer, file, transfer, transfer files, Download files';
			$this->set('metakeywords',$this->metakeywords);

			$target_url = API_TARGET_URL.'gettransferfbid?fbid='.$_SESSION['Member']['id'];
	        $transfer_list = $this->curl($target_url, array(), false);
	        if(isset($transfer_list->data)){
	        	$this->set('transfer_list', (array)$transfer_list->data);	
	        }else{
	        	$this->set('transfer_list', array());
	        }
	        
			$this->set('member', $_SESSION['Member']);			
		}else{
			header('Location: /');
		}
	}


	function getiddetail(){
		$this->render = 0;
		$post = $_POST;
		//$post['hisid'] = 390;
		$target_url = API_TARGET_URL.'gettranshistoryid?hisid='.$post['hisid'];
		$result = array();
        $passworddata = $this->curl($target_url, array(), false);
        $passworddata = (array)$passworddata;
        //echo "<pre>"; print_r($passworddata); exit;
        $download_link = $post['downloadalllink'];
		
        $html = '
        <div class="download-panel">
        	<div class="download-panel">
        		<table class="table table-inbox table-hover">
	                <tbody>';
	                	foreach($passworddata['data'] as $filelist){
	                		$download_link_s = base64_encode('uploads/'.$filelist->filename);
	                		if($_SERVER['HTTP_HOST']=='localhost'){
	                			$download_link_s = 'http://139.162.20.253/download/down.php?f='.$download_link_s;
							}else{
								$download_link_s = BASE_PATH.'/download/down.php?f='.$download_link_s;
							}

		                  	$html .= '<tr class="">
								<td class="view-message  dont-show">'.$filelist->filename.'</td>
								<td class="view-message  dont-show">'.$this->formatSizeUnits($filelist->filesize).'</td>
								<td class="view-message  inbox-small-cells text-center"><a href="'.$download_link_s.'"><i class="fa fa-download"></i></a></td>
		                  	</tr>';
	                  	}
	    $html .= '</tbody>
	            </table>
        	</div>
        	<div class="download-btn-panel">
        		<div class="btn-download"><a href="'.$download_link.'">Download All</a></div>
        		<div class="clearfix"></div>
        	</div>
        </div>';
        echo $html; exit;
	}

	function formatSizeUnits($bytes){
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
	}

	function plans(){
		$explode =  explode('/', $_SERVER['REQUEST_URI']);
		if($_SERVER['HTTP_HOST']=='localhost'){
			$slug = $explode[2];
		}else{
			$slug = $explode[1];
		}
		$this->set('slug',$slug);
		$this->title = 'Pricing';
		$this->set('title',$this->title);
		$this->metadesc = '';
		$this->set('metadesc',$this->metadesc);
		$this->metakeywords = 'GuruTransfer, filetransfer, file transfer, file, transfer, transfer files';
		$this->set('metakeywords',$this->metakeywords);				
	}
	
	function compareplans(){
		$explode =  explode('/', $_SERVER['REQUEST_URI']);
		if($_SERVER['HTTP_HOST']=='localhost'){
			$slug = $explode[2];
		}else{
			$slug = $explode[1];
		}
		$this->set('slug',$slug);
		$this->title = 'Pricing';
		$this->set('title',$this->title);
		$this->metadesc = '';
		$this->set('metadesc',$this->metadesc);
		$this->metakeywords = 'GuruTransfer, filetransfer, file transfer, file, transfer, transfer files';
		$this->set('metakeywords',$this->metakeywords);				
	}
}
