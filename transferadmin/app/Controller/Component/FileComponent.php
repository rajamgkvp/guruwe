<?php
/**
* class to upload files to the specified directory
* Author: Vikramjeet Singla
* Created Date: 25/07/2008
**/
class FileComponent extends Component  
{
	/**
	* PHP5 constructor
	**/
	function __construct(){
	}

	/**
	* PHP4 constructor
	**/
	function FileHandlerComponent(){
		$this->__construct();
	}

	/**
	* function to check for file existance
	* @param $file:string
	* @return boolean
	**/
	function fileExists($file){
		if(is_file($file) && file_exists($file)){
			return true;
		} else {
			return false;
		}
	}

	/**
	* function to check for file existance
	* @param $file:string
	* @return boolean
	**/
	function deleteFile($file){
		if($this->fileExists($file)){
			if(unlink($file)){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	* function to rename file
	* @param $file_name:string
	* @param $alternate_file_name:string(default:empty)
	* @return string
	**/
	function renameFile($file_name, $alternate_file_name=""){
		$ext = strtolower(preg_replace("/.*\.([^.]+)$/","\\1", $file_name));
		if(empty($alternate_file_name)){
			return date("YmdHis").".".$ext;
		} else {
			return $alternate_file_name.".".$ext;
		}
	}

	/**
	* function to get file mime-type
	* @param $file:string
	* @return string
	**/
	function getMime($file){
		return exec(trim('file -bi ' . escapeshellarg($file)));
		/*if(!function_exists('mime_content_type')) {			
			return system(trim('file -bi ' . escapeshellarg($file)));
		} else {
			return mime_content_type($file);
		}*/
	}

	/**
	* function to check for allowed mime-type
	* @param $file:string
	* @param $allowed_types:array(default array('image/jpg','image/gif'))
	* @return boolean
	**/
	function isValidFile($file, $allowed_types = array('image/jpeg','image/gif')){		
		if(in_array(trim($this->getMime($file)), $allowed_types)){
			return true;
		} else {
			return false;
		}
	}

	/**
	* function to upload file
	* @param $file:array	
	* @param $upload_dir:string
	* @param $max_file_size:integer
	* @param $allowed_types:array(default array('image/jpg','image/gif'))
	* @param $alternate_file_name:string
	* @return mixed
	**/
	function upload($file, $upload_dir, $max_file_size, $allowed_types = '', $alternate_file_name=""){
		if(empty($allowed_types)) {
			$allowed_types = array('image/jpeg','image/gif');
		}
		// check for valid file type
		if($this->isValidFile($file['tmp_name'], $allowed_types)){
			// check for file size
			if(!($file['size'] > $max_file_size)){
				//check for file upload error
				if($file['error'] == 0){
					if(!empty($alternate_file_name)) {
						$ext = strtolower(preg_replace("/.*\.([^.]+)$/","\\1", $file['name']));
						$file_name = $alternate_file_name.".".$ext;
					}
					else {
						$file_name = $file['name'];
					}
					
					// check for renaming the file
					if($this->fileExists($upload_dir.$file['name'])){
						$file_name = $this->renameFile($file['name'], $alternate_file_name);
					}
					
					// uploading file
					if(copy($file['tmp_name'], $upload_dir.$file_name)){
						$arrFile = array('file_name'=>$file_name);
						return $arrFile;
					} else {
						return "Unable to upload file.";
					}
				} else {
					switch($file['error']){
						case 1:
							return "The uploaded file exceeds the upload max filesize directive.";
							break;
						case 2:
							return "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
							break;
						case 3:
							return "The uploaded file was only partially uploaded.";
							break;
						case 4:
							return "No file was uploaded.";
							break;
						case 6:
							return "Missing a temporary folder.";
							break;
						case 7:
							return "Failed to write file to disk.";
							break;
						case 8:
							return "File upload stopped by extension.";
							break;
					}
				}
			} else {
				return "Please upload a file of valid size.";
			}
		} else {
			return "Please upload a valid file.";
		}
	}
	
	
	/**
	* function to upload file
	* @param $file:array	
	* @param $upload_dir:string
	* @param $max_file_size:integer
	* @param $allowed_types:array(default array('image/jpg','image/gif'))
	* @param $alternate_file_name:string
	* @return mixed
	**/
	function uploadAllExtention($file, $upload_dir, $max_file_size, $alternate_file_name=""){
		
			// check for file size
			if(!($file['size'] > $max_file_size)){
				//check for file upload error
				if($file['error'] == 0){
					if(!empty($alternate_file_name)) {
						$ext = strtolower(preg_replace("/.*\.([^.]+)$/","\\1", $file['name']));
						$file_name = $alternate_file_name;
					}
					else {
						$file_name = $file['name'];
					}
					
					// check for renaming the file
					if($this->fileExists($upload_dir.$file['name'])){
						$file_name = $this->renameFile($file['name'], $alternate_file_name.time());
					}
					
					// uploading file
					if(copy($file['tmp_name'], $upload_dir.$file_name)){
						$arrFile = array('file_name'=>$file_name);
						return $arrFile;
					} else {
						return "Unable to upload file.";
					}
					
				} else {
					switch($file['error']){
						case 1:
							return "The uploaded file exceeds the upload max filesize directive.";
							break;
						case 2:
							return "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
							break;
						case 3:
							return "The uploaded file was only partially uploaded.";
							break;
						case 4:
							return "No file was uploaded.";
							break;
						case 6:
							return "Missing a temporary folder.";
							break;
						case 7:
							return "Failed to write file to disk.";
							break;
						case 8:
							return "File upload stopped by extension.";
							break;
					}
				}
			} else {
				return "Please upload a file of valid size.";
			}
		} 

}	
?>