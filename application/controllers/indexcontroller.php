<?php
require_once(ROOT . DS .'public/inc/facebooksdk/facebook.php' );

class IndexController extends Controller {
	
	function beforeAction () {

	}

	function index($id = null) {
		$this->set('slug','/');
		$Slider = new Slider();
		$sliders = $Slider->getSliders();
		$this->set('sliders',$sliders);		
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
            
            $post['userId'] = $_POST['useremail'];
            //echo "<pre>"; print_r($post);                 
            //$query = http_build_query($post, '', '&');
            
            $result = array();
            //$result = $this->curl($target_url, $post);

            foreach($files_arr['uploads'] as $files_ar){
                    //unlink($files_ar);
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
    	$target_url = API_TARGET_URL.'filemuploade';
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

			foreach ($files as $key => $files_name) {
				$files_arr["uploads"][$key] = $dir.$files_name;
            	$post["uploads[$key]"] = '@'.$dir.$files_name;
			}

			if($data['openedblock'] != 'link-block'){
            	$post['from'] = $data['from_email'];
	            $post['to'] = implode(',',$data['friend_email']);
	            $post['message'] = $data['message'];
            }
            
            $post['userId'] = $data['useremail'];
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
		//echo "<pre>"; print_r($explode); echo "</pre>"; exit;
		if($_SERVER['HTTP_HOST']=='localhost'){
			$slug = $explode[2];
		}else{
			$slug = $explode[1];
		}
		$Content = new Content();
		$content = $Content->getContent($slug);
		$this->set('slug',$slug);
		$this->set('content',$content);
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
		$post['dob'] = '1982-08-15';
		$post['data'] = serialize($facebook_response);
		

		$target_url = API_TARGET_URL.'getuser';
		$result = $this->curl($target_url, array('email'=>$facebook_response['email']));
		//echo "<pre>"; print_r($result); echo "</pre>"; exit;
		if($result->response == 400){
			$target_url = API_TARGET_URL.'adduser';
			$result = $this->curl($target_url, $post);
		}

		if($result->response == 200){
			$_SESSION['Member'] = (array)$result;
		}
		$result = (array)$result;
		echo json_encode($result);
		exit;
	}

	function curl($target_url, $post){
	//echo $target_url; exit;
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$target_url);
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_TIMEOUT,1000);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $digest =  "gTSeventeenCube:GtSeventeen3123app01";
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($ch, CURLOPT_USERPWD, $digest );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result=curl_exec ($ch);
        //echo 'Curl error: ' . curl_error($ch);
        curl_close ($ch);
        return json_decode($result);
	}
}
