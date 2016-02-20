<?php

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("exploremytour") or die(mysql_error());

//$tablename = 'destination_photos_reviewer';
//$tablename = 'destination_reviews_photos_review';
$tablename = 'destination_review_reviewers';
$result = mysql_query("select * from $tablename where user_id is not null");
$count = 0;
while($row = mysql_fetch_assoc($result)){
	$profiledata[] = $row;
}
//echo "<pre>"; print_r($profiledata); exit;

foreach($profiledata as $row){
	$count++;
	$result = mysql_query("select count(*) from users where email='".$row['email']."'");
	$check = mysql_fetch_row($result);
	if($check[0] == 0){
		$query = "INSERT INTO users SET
					displayName = '".$row['displayName']."',
					profilephotourl = '".$row['profilePhotoUrl']."',
					city = '".$row['city']."',
					first_name = '".$row['firstname']."',
					last_name = '".$row['lastname']."',
					email = '".$row['email']."',
					aboutme = '".$row['aboutMe']."',
					dateofbirth = '".$row['dateOfBirth']."',
					gender = '".$row['gender']."',
					facebook_app_id	 = '',
					created = '".date('Y-m-d H:i:s', time())."'
				";
				mysql_query($query);
	}
	
	$result2 = mysql_query("select id from users where email='".$row['email']."'");
	$user_id = mysql_fetch_row($result2);
	$query3 = "UPDATE $tablename SET 
		user_id = '".$user_id[0]."'
		WHERE id=".$row['id']."; 
	";
	mysql_query($query3);
	echo $count.":".$row['id']." and ".$row['email']." transferred\n";
}

?>