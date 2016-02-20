<?php
/**
 * Project			:		IM-CARE
 * Created by		:		Sandeep Panwar
 * Copyright 2012 IM-CARE.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012 IM-CARE.
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<?php
	$admin = $session->read('backend');
	$app_modules = unserialize(APPLICATION_MODULES);
	
	$member_name = strtolower($admin['User']['login']);
	
	$arr_permissions = array();
	if($member_name != 'admin') {
		$permissions = $admin['User']['permissions'];
		$arr_permissions = explode(",", $permissions);
	}
?>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr>
		<td>
			Welcome - <?php $admin = $session->read('backend'); echo $member_name; ?><br/>
			<span class="smallgrey_10"><?php echo date("D, jS M Y");?></span>
		 </td>
	</tr>
	<tr>
		<td class="textbold">Admin Tasks</td>
	</tr>
	
	
	<?php
		//echo $member_name;
		if($member_name == 'admin') {
	?>
	<tr>
		<td class="tdheader">Edit Profile</td>
	</tr>
	<tr>
		<td>
			<?php
				echo $html->link("Change Admin Password", "/backend/users/changepassword" ,array('title'=>'Change Admin Password'));
			?> 
		</td>
	</tr>
	<tr>
		<td>
			<?php
				echo $html->link("Change Admin Details", "/backend/users/update" ,array('title'=>'Change Admin Details'));
			?> 
		</td>
	</tr>
	
	
	<tr>
		<td class="tdheader">Manage Admin Users</td>
	</tr>
	<tr>
		<td>
			<?php
				echo $html->link("Manage Admin Users", "/backend/users/manage/", array('title'=>'Manage Admin Users'));
			?> 
		</td>
	</tr>
	<tr>
		<td>
			<?php
				echo $html->link("Add New Admin User", "/backend/users/add/", array('title'=>'Add New Admin User'));
			?> 
		</td>
	</tr>
	<?php } else { ?>
	
	<tr>
		<td class="tdheader">View Details</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("View Details", "/backend/users/view_details/" ,array('title'=>'View Details'));
			?>
		</td>
	</tr>
	
	<?php } ?>
	
	
	<?php if( ($member_name == 'admin') || (in_array('1', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Advertisement Management</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Advertisement(s)", "/backend/advertisements/" ,array('title'=>'Manage Advertisement'));
				// echo $html->link("Manage Advertisement(s)", "#" ,array('title'=>'Manage Advertisement'));
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Add Advertisement", "/backend/advertisements/add/" ,array('title'=>'Add Advertisement'));
				// echo $html->link("Add Advertisement", "#" ,array('title'=>'Add Advertisement'));
			?>
		</td>
	</tr>
	<?php } ?>
	
	
	<?php if( ($member_name == 'admin') || (in_array('2', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Content Management</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Content(s)", "/backend/contents/" ,array('title'=>'List Static Pages'));
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Faq", "/backend/contents/faq" ,array('title'=>'Manage Faqs'));
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Specialism", "/backend/members/listspeciality" ,array('title'=>'Manage Specialism'));
			?>
		</td>
	</tr>
	<?php } ?>
	
	
	<?php if( ($member_name == 'admin') || (in_array('3', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Member Management</td>
	</tr>
	<tr>
		<td>
			<?php echo $html->link("Manage Clinic(s)", "/backend/members/index/c/" ,array('title'=>'Manage Members')); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $html->link("Manage GP(s)", "/backend/members/index/gp/" ,array('title'=>'Manage Members')); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $html->link("Manage Physio(s)", "/backend/members/index/p/" ,array('title'=>'Manage Members')); ?>
		</td>
	</tr>
	
	<!-- 
	<tr>
		<td>
			<?php 
				echo $html->link("Add Doctor", "/backend/members/add/doctor" ,array('title'=>'Add New Doctor'));
				// echo $html->link("Add Member", "#" ,array('title'=>'Add New Members'));
			?>
		</td>
	</tr>
	-->

	<tr>
		<td>
			<?php 
				echo $html->link("Add Clinic/ GPs/ Physio", "/backend/members/add/clinic" ,array('title'=>'Add New Clinic'));
				// echo $html->link("Add Member", "#" ,array('title'=>'Add New Members'));
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage User", "/backend/lids/user" ,array('title'=>'Manage User'));
				// echo $html->link("Add Member", "#" ,array('title'=>'Add New Members'));
			?>
		</td>
	</tr>
	<!-- 
	<tr>
		<td>
			<?php 
				echo $html->link("Add User", "/backend/members/add/user" ,array('title'=>'Add New User'));
				// echo $html->link("Add Member", "#" ,array('title'=>'Add New Members'));
			?>
		</td>
	</tr>
	-->
	<tr>
		<td>
			<?php 
				echo $html->link("Block IP Addresses", "/backend/ratings/ip_check/" ,array('title'=>'Block IP Addresses'));
			?>
		</td>
	</tr>
	<?php } ?>

	
	
	<?php if( ($member_name == 'admin') || (in_array('6', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Member Ratings</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Ratings(s)", "/backend/ratings/" ,array('title'=>'Manage Ratings'));
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Profanity Filter", "/backend/ratings/profanity/" ,array('title'=>'Profanity Filter'));
			?>
		</td>
	</tr>
	<?php } ?>
	
	
	<?php if( ($member_name == 'admin') || (in_array('7', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Appointment Management</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Appointment(s)", "/backend/appointments/" ,array('title'=>'Manage Appointment'));
			?>
		</td>
	</tr>
	<?php } ?>
	
	

	<?php if( ($member_name == 'admin') || (in_array('4', $arr_permissions)) ) { ?>
	<!-- 
	<tr>
		<td class="tdheader">Manage Subscription Package(s)</td>
	</tr>
	<tr>
		<td>
			<?php 
				// echo $html->link("Manage Subscriptions(s)", "/backend/subscriptions/" ,array('title'=>'Manage Subscriptions'));
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php 
				// echo $html->link("Add Subscriptions", "/backend/subscriptions/add" ,array('title'=>'Add New Subscription'));
			?>
		</td>
	</tr> -->
	<?php } ?>

	<?php if( ($member_name == 'admin') || (in_array('8', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Manage Rating Questionnaire(s)</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Rating Questionnaire(s)", "/backend/questionnaires/" ,array('title'=>'Manage Rating Questionnaires'));
			?>
		</td>
	</tr>
	
	<!-- 
	<tr>
		<td>
			<?php 
				echo $html->link("Manage User Rating Questionnaires", "/backend/questionnaires/userlist" ,array('title'=>'Manage User Rating Questionnaires'));
			?>
		</td>
	</tr>
	-->
	<?php } ?>

	<?php if( ($member_name == 'admin') || (in_array('9', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Manage Search History(s)</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Search(s)", "/backend/popularsearchs/" ,array('title'=>'Manage Search History(s)'));
				// echo $html->link("Manage Search(s)", "#" ,array('title'=>'Manage Search History(s)'));
			?>
		</td>
	</tr>
	<!-- 
	<tr>
		<td>
			<?php 
				echo $html->link("Add New Search Keywords", "/backend/popularsearchs/add" ,array('title'=>'Add New Search Keyword'));
				// echo $html->link("Add New Search Keywords", "#" ,array('title'=>'Add New Search Keywords'));
			?>
		</td>
	</tr>
	-->
	<?php } ?>
	
	<?php if( ($member_name == 'admin') || (in_array('5', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Add Meta Information</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Add Metatags", "/backend/pages/seokeywords/" ,array('title'=>'Add Metatags'));
			?>
		</td>
	</tr>
	<?php } ?>
	
	<tr>
		<td class="tdheader">Manage Information</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Manage Information", "/admin/information/information/index/" ,array('title'=>'Manage Information'));
			?>
		</td>
	</tr>
	
	<tr>
		<td class="tdheader">Manage Feedbacks</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Feedbacks", "/backend/feedbacks/feedbacks/list" ,array('title'=>'Subscription List'));
			?>
		</td>
	</tr>
	
	
	<?php if( ($member_name == 'admin') || (in_array('10', $arr_permissions)) ) { ?>
	<tr>
		<td class="tdheader">Manage Subscription List</td>
	</tr>
	<tr>
		<td>
			<?php 
				echo $html->link("Subscription List", "/backend/newslettersubscriptions/" ,array('title'=>'Subscription List'));
			?>
		</td>
	</tr>
	<?php } ?>
	
</table>