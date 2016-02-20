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
<!--Header With Feature Image-->
<section class="header-image header-feature1">
	<div class="wrapper">
		<h1>Jeffe Photo Gallery</h1>
		<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat sed diam voluptua.</p>
		
		<!--Page Navigation-->
		<nav class="pagenav">
			<ul>
				<li><a href="<?php echo SITE_URL;?>">home</a></li>
				<li>Photo Gallery</li>
			</ul>
		</nav>
		
	</div>
</section>
<!--Header With Feature Image End-->


<!--Portfolio Container Start-->
<section class="portfolio-container">
	
	<!--Category Filter-->
	<div class="category-filter">
		<div class="wrapper center">
			<ul>
				<li class="filter selected" data-category="cat-all">ALL</li>
				<?php if(!empty($albums)){ foreach($albums as $album){ ?>
					<li class="filter" data-category="cat-<?php echo $album['Album']['id']; ?>"><?php echo $album['Album']['title']; ?></li>
				<?php }}?>
			</ul>
		</div>
	</div>
	<!--End-->
	
	<!--Portfolio Fullwidth Thumbnails-->
	<div class="grid-fullwidth">
		<div class="megafolio-container noborder norounded">
			
			<!--Thumbnail Start-->
			<?php if(!empty($photos)){ foreach($photos as $photo){ ?>
			<div class="mega-entry cat-all cat-<?php echo $photo['Photo']['album_id']; ?>" id="entry-<?php echo $photo['Photo']['id']; ?>" data-src="files/photo/<?php echo $photo['Photo']['photo']; ?>" data-width="504" data-height="400">
				<!--Hover Effect Start-->
				<div class="mega-hover alone">
					<!--Title and Subtitle-->
					<div class="mega-hovertitle"><?php echo $photo['Photo']['title']; ?>
						<div class="mega-hoversubtitle"><?php echo $photo['Photo']['sub_title']; ?></div>
					</div>
					<!-- Link Button -->
					<a href="<?php echo SITE_URL; ?>photo/detail/<?php echo $photo['Photo']['id']; ?>">
						<div class="mega-hoverview"></div>
					</a>
					<!-- Preview Button -->
					<a class="fancybox" data-fancybox-group="group" href="files/photo/<?php echo $photo['Photo']['photo']; ?>">
						<div class="mega-hoverview mega-zoom"></div>
					</a>
					
				</div>
				<!--Hover Effect End-->
			</div>
			<?php }} ?>
			<!--Thumbnail End-->
	   </div>
	</div>
	<!--Portfolio Fullwidth Thumbnails End-->
	
</section>
<!--Portfolio Container End-->
		