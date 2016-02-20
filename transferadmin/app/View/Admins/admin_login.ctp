<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin::Login</title>
<link rel="icon" type="image/x-icon" href="<?php echo SITE_URL ?>/favicon.ico" />
<?php echo $this->Html->css('main'); ?>
<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />

<!-- Inculude JS -->
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<?php echo $this->Html->script('jquery-1.4.4'); ?> 

<?php echo $this->Html->script('spinner/jquery.mousewheel'); ?> 
<?php echo $this->Html->script('spinner/ui.spinner'); ?> 

<?php echo $this->Html->script('forms/forms'); ?> 
<?php echo $this->Html->script('forms/autogrowtextarea'); ?> 
<?php echo $this->Html->script('forms/autotab'); ?> 
<?php echo $this->Html->script('forms/jquery.validationEngine-en'); ?> 
<?php echo $this->Html->script('forms/jquery.validationEngine'); ?> 

<?php echo $this->Html->script('ui/progress'); ?>
<?php echo $this->Html->script('ui/jquery.jgrowl'); ?>
<?php echo $this->Html->script('ui/jquery.tipsy'); ?>
<?php echo $this->Html->script('ui/jquery.alerts'); ?>

<?php echo $this->Html->script('admin_custom.js'); ?> 
</head>

<body>

<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="backTo"><a href="<?php echo SITE_URL; ?>" title="" class="navmainWebsite" target="_blank"><span>Main website</span></a></div>
            <!--<div class="userNav">
				
                <ul>
                    <li class="topNavHelp"><a href="<?php echo SITE_URL; ?>admin/users/forgotpassword/" title=""><span>Forgot Password</span></a></li>
                </ul>
				
            </div>-->
            <div class="fix"></div>
        </div>
    </div>
</div>


<!-- Login form area -->
<div class="loginWrapper2" style="top:25%; left:36%; position:absolute;">

	<div class="loginLogo2" style="padding-bottom:15px; text-align:center;">
		    <?php echo $this->Html->image('logo_admin.png', array('alt' => WEBSITE_NAME))?>
	</div>
	
	<?php if(isset($errorMessage)){ ?>
	<div style="width:320px;">
		<div class="nNote nFailure hideit">
			<p><strong>Error: </strong>
				<?php echo $errorMessage; ?>
			</p>
		</div>
	</div>
	<?php } ?>

	<?php 
	if (($this->Session->check('Message.flash'))) {
		echo $this->Session->flash('flash', array('element' => 'flash'));
	}
	?>
		
    <div class="loginPanel">
        <div class="head"><h5 class="iUser">Login</h5></div>
		
		<?php echo $this->Form->create('Admin', array('id'=>'valid', 'url' => array('controller' => 'admins', 'action' => 'login'), 'class'=>'mainForm'));?>
            <fieldset>
				
                <div class="loginRow noborder">
                    <label for="req1">Username:</label>
                    <div class="loginInput">
						<?php echo $this->Form->input('username',array("id"=>"req1", "label"=>false, "class"=>"validate[required]", 'style' => 'width:170px;'));?>
					</div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label for="req2">Password:</label>
                    <div class="loginInput">
						<?php echo $this->Form->input('password', array("id"=>"req2","type"=>"password","label"=>false, "class"=>"validate[required]", 'style' => 'width:170px;'));?>
					</div>
                    <div class="fix"></div>
                </div>
				
				
				<div class="loginRow">
					<label for="req2"></label>
					<div class="loginInput">
						<?php echo $this->Form->checkbox('remember', array('hiddenField' => true, "style" => "display:block !important"));?>
						<label for="req2" style="width:auto;">Remember me</label>
					</div>
                    <div class="fix"></div>
                </div>
				
                <div class="loginRow" style="padding-bottom:0px;">
                    <input type="submit" value="Log me in" class="greyishBtn submitForm" style="margin-bottom:15px;" />
                    <div class="fix"></div>
                </div>
            </fieldset>
		<?php
			echo $this->Form->end();
		?>
    </div>
</div>

<!-- Footer -->
<div id="footer">
	<div class="wrapper">
    	<span><?php echo COPYRIGHT_TEXT; ?></span>
    </div>
</div>

</body>
</html>
