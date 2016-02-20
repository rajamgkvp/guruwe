<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Administrator' ?>:<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<!-- Include CSS -->
	<?php echo $this->Html->css('reset'); ?>
	<?php echo $this->Html->css('main'); ?>
	<?php echo $this->Html->css('wysiwyg'); ?>
	
	<!-- Inculude JS -->
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<?php echo $this->Html->script('jquery-1.4.4'); ?> 
	
	<script type="text/javascript">
	<!--
	var SITE_URL = '<?php echo SITE_URL; ?>';
	//-->
	</script>
	
</head>
<body>
	
	<?php
		$controller = $this->params->controller;
		$action 	= $this->params->action;
		//print_r($this->params->controller);
	?>

	<!-- Top navigation bar -->
	<div id="topNav">
		<div class="fixed">
			<div class="wrapper">
				<div class="welcome"><a href="#" title=""><img src="<?php echo IMG_URL ?>userPic.png" alt="" /></a><span><?php echo "Welcome ".ucfirst($this->Session->read('admin.Admin.full_name')); ?>!</span></div>
				<div class="userNav">
					<ul>
						<li><a href="<?php echo SITE_URL; ?>admin/admins/setting/" title=""><img src="<?php echo IMG_URL ?>icons/topnav/settings.png" alt="" /><span>Settings</span></a></li>
						<li><a href="<?php echo SITE_URL; ?>admin/admins/logout/" title=""><img src="<?php echo IMG_URL ?>icons/topnav/logout.png" alt="" /><span>Logout</span></a></li>
					</ul>
				</div>
				<div class="fix"></div>
			</div>
		</div>
	</div>

	<!-- Header -->
	<div id="header" class="wrapper">
		<div class="logo"><a href="<?php echo SITE_URL; ?>admin/admins/" title=""><img src="<?php echo IMG_URL ?>logo_admin.png" alt="" /></a></div>
		<div class="middleNav">
			<ul>
				<li class="iUser"><a href="<?php echo SITE_URL; ?>admin/members/" title=""><span>User list</span></a></li>
			</ul>
		</div>
		<div class="fix"></div>
	</div>


	<div id="container" class="wrapper">
		<!-- Left navigation -->
		<div class="leftNav">
			<ul id="menu">
				<li class="dash"><a href="<?php echo SITE_URL; ?>admin/admins/" title="" <?php echo ($controller == 'admins' && $action == 'admin_index') ? 'class="active"' : ''; ?>><span>Dashboard</span></a></li>
				<li class="forms"><a href="<?php echo SITE_URL; ?>admin/sliders/" title="" <?php echo ($controller == 'sliders') ? 'class="active"' : ''; ?>><span>Manage Sliders</span></a></li>
				<li class="forms"><a href="<?php echo SITE_URL; ?>admin/content/" title="" <?php echo ($controller == 'content') ? 'class="active"' : ''; ?>><span>Manage Pages</span></a></li>
				<li class="contacts"><a href="<?php echo SITE_URL; ?>admin/admins/logout/" title=""><span>Logout</span></a></li>
			</ul>
		</div>
		<?php echo $this->fetch('content'); ?>
		<div class="fix"></div>
	</div>
	
		
	<!-- Footer -->
	<div id="footer">
		<div class="wrapper">
			<span><?php echo COPYRIGHT_TEXT; ?></span>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
