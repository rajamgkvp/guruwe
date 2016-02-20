<div class="about_post">
<?php echo $content['content']; ?>
<?php if($content['page_url'] == 'about-us'){ ?>
	<?php if($logged_user){ ?>
		<a href="<?php echo SITE_URL?>videos/videos/upload" style="color:#000; text-decoration:none"><div class="yelborder"><?php echo __d('default', 'Begin Your Road To Stardom'); ?></div></a>
	<?php }else{ ?>
		<a href="javascript:void(0)" id="loginregistration" style="color:#000; text-decoration:none"><div class="yelborder"><?php echo __d('default', 'Begin Your Road To Stardom'); ?></div></a>
	<?php }?>
<?php } ?>
</div>