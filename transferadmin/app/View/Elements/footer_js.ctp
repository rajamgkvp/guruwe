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


<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery-easing-1.3.js"></script>

<!--Flexy Menu Script-->
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/flexy-menu.js"></script>

<!-- MEGAFOLIO PRO GALLERY JS FILES -->
<script type="text/javascript" src="<?php echo SITE_URL; ?>megafolio/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>megafolio/js/jquery.themepunch.megafoliopro.js"></script>

<!--LayerSlider Script-->
<script src="<?php echo SITE_URL; ?>layerslider/jQuery/jquery-transit-modified.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

<!-- THE FANYCYBOX ASSETS -->
<script type="text/javascript" src="<?php echo SITE_URL; ?>megafolio/fancybox/jquery.fancybox.pack.js?v=2.1.3"></script>

<!-- Optionally add helpers - button, thumbnail and/or media ONLY FOR ADVANCED USAGE-->
<script type="text/javascript" src="<?php echo SITE_URL; ?>megafolio/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

<script type="text/javascript">
   jQuery(document).ready(function() {
	  "use strict"; 
      // MEGAFOLIO PRO GALLERY SETTING
     var api=jQuery('.megafolio-container').megafoliopro(
        {
            filterChangeAnimation:"rotatescale",
            filterChangeSpeed:600,
            filterChangeRotate:99,
            filterChangeScale:0.6,          
            delay:20,
            paddingHorizontal:0,
            paddingVertical:0,
            layoutarray:[8]
         });
 
      // CALL FILTER FUNCTION IF ANY FILTER HAS BEEN CLICKED
      jQuery('.filter').click(function() {
            jQuery('.filter').each(function() { jQuery(this).removeClass("selected")});
            api.megafilter(jQuery(this).data('category'));
            jQuery(this).addClass("selected");
         });
		 
      // THE FANCYBOX PLUGIN INITALISATION
      jQuery(".fancybox").fancybox();
		 
      // FLEXY MENU SETTING
	  $(".flexy-menu").flexymenu({
            align: "right",
            indicator: true
         });
		 
      // LAYERSLIDER SETTING
		$('#layerslider').layerSlider({
			skinsPath : 'layerslider/skins/',
			skin : 'fullwidthdark',
			thumbnailNavigation : 'disabled',
			showCircleTimer : false,
			showBarTimer : false,
    		touchNav : true,
			navStartStop : false,
			navButtons : false,
			animateFirstLayer : true,
			responsive : false,
			responsiveUnder : 984,
			sublayerContainer : 984
		});
   });
</script>
