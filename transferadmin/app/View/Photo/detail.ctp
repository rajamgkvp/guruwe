<?php
/**
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>


<!--All Content Start-->
<div class="wrapper boxstyle">
	<div class="box-container">
		
		<!--Page Navigation-->
		<nav class="pagenav">
			<ul>
				<li><a href="<?php echo SITE_URL; ?>">home</a></li>
				<li><a href="<?php echo SITE_URL; ?>photo-gallery">Photo Gallery</a></li>
				<li><?php echo $photos['Photo']['title']; ?></li>
			</ul>
		</nav>
		
		<!--Portfolio Image and Details-->
		<section class="portfolio-content">
			<!--Feature Image-->
			<figure class="feature-image">
				<img src="<?php echo SITE_URL;?>files/photo/<?php echo $photos['Photo']['photo']; ?>" alt="<?php echo $photos['Photo']['title']; ?>" />
			</figure>
			
			<!--Details Start-->
			<aside class="portfolio-details">
				<h1><?php echo $photos['Photo']['title']; ?></h1>
				<div class="portfolio-text">
					<?php echo $photos['Photo']['description']; ?>
				</div>
			</aside>
			<!--Details End-->
		</section>
		<!--Portfolio Image and Details End-->
		
		<!--Related Work-->
		<section class="related-work">
			<h2><?php echo $albums['Album']['title']; ?>'s More pics</h2>
			<ul>
				<!--Related 1-->
				<?php if(!empty($related_sets)){ foreach($related_sets as $related_set){ ?>
				<li>
					<a href="<?php echo SITE_URL .'photo/detail/'. $related_set['Photo']['id'];?>">
						<div class="thumbnail-hover">
							<div class="thumbnail-title"><?php echo $related_set['Photo']['title'];  ?></div>
						</div>
						<img src="<?php echo SITE_URL;?>files/photo/<?php echo $related_set['Photo']['photo'];  ?>" alt="related work" />
					</a>
				</li>
				<?php }} ?>
				<!--End-->
			</ul>
		</section>
		<!--Related Work End-->

	</div>
</div>
<!--All Content End-->