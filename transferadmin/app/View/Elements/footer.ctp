<?php
/**
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2013 Social network.
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>


<!--Footer Start-->
<footer>
	<div class="footer-container">
		<div class="wrapper">
		
			<!--Footer About Us-->
			<section class="footer-aboutus">
				<figure>
					<img src="<?php echo SITE_URL;?>images/footer-logo.png" alt="logo" />
				</figure>
				<p><?php echo $aboutcontent['Content']['short_description']; ?></p>
			</section>
			<!--Footer About Us End-->
			
			<!--Footer Gallery-->
			<section class="footer-gallery">
				<h2 class="footer-title">gallery</h2>
				<ul>
					<?php if(!empty($footerphotssets)){ foreach($footerphotssets as $footerphotsset){ ?>
					<li>
						<a class="fancybox" data-fancybox-group="footergallery" href="<?php echo SITE_URL;?>files/photo/<?php echo $footerphotsset['Photo']['photo']; ?>">
							<div class="thumbnail-hover"></div>
							<img src="<?php echo SITE_URL;?>files/photo/<?php echo $footerphotsset['Photo']['photo']; ?>" alt="gallery thumbnail" style="width:72px; height:72px"/>
						</a>
					</li>
					<?php }} ?>
				</ul>
			</section>
			<!--Footer Gallery End-->
			
			<!--Footer Contact-->
			<section class="footer-contact">
				<h2 class="footer-title">Address</h2>
				<p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
				<ul class="footer-address">
					<li>4884 Harcourt St Boston MA USA 30458</li>
					<li>info@yourdomain.com</li>
					<li>111-123-456-9999</li>
				</ul>
				
				<!--Footer Social-->
				<ul class="footer-social">
					<li><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon1.png" alt="social media" /></a></li>
					<li class="social-color2"><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon2.png" alt="social media" /></a></li>
					<li class="social-color3"><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon3.png" alt="social media" /></a></li>
					<li class="social-color4"><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon4.png" alt="social media" /></a></li>
					<li class="social-color5"><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon5.png" alt="social media" /></a></li>
					<li class="social-color6"><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon6.png" alt="social media" /></a></li>
					<li class="social-color7"><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon7.png" alt="social media" /></a></li>
					<li class="social-color8"><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon8.png" alt="social media" /></a></li>
					<li class="social-color9"><a href="#"><img src="<?php echo SITE_URL;?>images/social-icon/social-icon9.png" alt="social media" /></a></li>
				</ul>
				<!--Footer Social End-->
				
			</section>
			<!--Footer Contact End-->
			
		</div>
	</div>
	
	<!--Footer Bottom-->
	<section class="footer-bottom">
		<div class="wrapper">
			<div class="copyright">
				Copyright © All Rights Reserved. <a href="#">RobertJeffe.com</a>
			</div>
			<nav>
				<ul>
					<li class="active"><a href="<?php echo SITE_URL; ?>">Home</a></li>
					<li><a href="<?php echo SITE_URL; ?>photo-gallery">Photo Gallery</a></li>
					<li><a href="<?php echo SITE_URL; ?>about-us">About Us</a></li>
					<li><a href="<?php echo SITE_URL; ?>contact-us">Contact Us</a></li>
				</ul>
			</nav>
		</div>
	</section>
	<!--Footer Bottom End-->
	
</footer>
<!--Footer End-->
