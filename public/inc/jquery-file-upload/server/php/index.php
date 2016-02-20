<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
$return_array = array('error'=>false,'url'=>"files/biography/98x98/",'filename'=>"My file"); 
 echo json_encode($return_array);
 exit;
?>
{"files":[{            "name":"stock-photo-berlin-germany-february-actor-clive-owen-attends-the-shadow-dancer-premiere-during-of-the-95080042.jpg","size":48009,"type":"image\/jpeg","url":"http:\/\/www.sampatti.com\/social_networking_newdesign\/dementia\/app\/webroot\/js\/jquery-file-upload\/server\/php\/files\/stock-photo-berlin-germany-february-actor-clive-owen-attends-the-shadow-dancer-premiere-during-of-the-95080042.jpg","thumbnail_url":"http:\/\/www.sampatti.com\/social_networking_newdesign\/dementia\/app\/webroot\/js\/jquery-file-upload\/server\/php\/files\/thumbnail\/stock-photo-berlin-germany-february-actor-clive-owen-attends-the-shadow-dancer-premiere-during-of-the-95080042.jpg","delete_url":"http:\/\/www.sampatti.com\/social_networking_newdesign\/dementia\/app\/webroot\/js\/jquery-file-upload\/server\/php\/?file=stock-photo-berlin-germany-february-actor-clive-owen-attends-the-shadow-dancer-premiere-during-of-the-95080042.jpg","delete_type":"DELETE"}]}
<?php
//error_reporting(E_ALL | E_STRICT);
//copy($_FILES['files']['tmp_name'][0],'files/'.$_FILES['files']['name'][0]);
//print_r($_FILES);
//exit;
//require('UploadHandler.php');
//$upload_handler = new UploadHandler();
