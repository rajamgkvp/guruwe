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

<!--Banner Slider Start-->
<section class="banner-slide">
	<div id="layerslider" style="width: 100%; height: 670px; margin: 0px auto; ">
		<?php foreach($sliders as $slider){ ?>
		<!--Layer 1-->
		<div class="ls-layer" style="slidedirection: right; transition2d: 24,25,27,28; ">
			<img src="<?php echo SITE_URL; ?>files/slides/<?php echo $slider['Slider']['image_name']; ?>" class="ls-bg" alt="Slide background" />
			<a href="<?php echo $slider['Slider']['image_link']; ?>" class="ls-link"></a>
		</div>
		<!--End-->
		<?php } ?>
	</div>
</section>
<!--Banner Slider End-->
