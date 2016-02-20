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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<?php echo $this->Html->charset(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title><?php echo __d('default', $title_for_layout); ?></title>

<script type="text/javascript">
var IMG_URL = '<?php echo IMG_URL; ?>';
var IMAGE_URL = '<?php echo IMAGE_URL; ?>';
var SITE_URL = '<?php echo SITE_URL; ?>';
</script>

<!-- main styles -->
	<?php echo $this->Html->css(array('style','hexagon','form')); ?>

<!--Flexy Menu CSS-->
	<?php echo $this->Html->css(array('flexy-menu.css')); ?>
<!--Responsive CSS-->
	<?php echo $this->Html->css(array('responsive.css')); ?>
<!--LayerSlider CSS-->
	<link href="<?php echo SITE_URL; ?>layerslider/css/layerslider.css" rel="stylesheet" type="text/css" />
<!--Multitransition Gallery Sliders CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>megafolio/css/settings.css" media="screen" />
<!-- Favicon -->
	<?php echo $this->Html->meta('icon'); ?>
	
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery-1.10.2.min.js"></script>

<!--<link rel="stylesheet" href="<?php echo SITE_URL;?>js/jquery-file-upload/css/jquery.fileupload-ui.css" />
<script src="<?php echo SITE_URL;?>js/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo SITE_URL;?>js/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo SITE_URL;?>js/jquery-file-upload/js/jquery.fileupload.js"></script>
-->


<!-- THE FANYCYBOX ASSETS -->
<link rel="stylesheet" href="<?php echo SITE_URL; ?>megafolio/fancybox/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />

<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900|Oswald:400,300,700' rel='stylesheet' type='text/css' />

<!--[if lte IE 8]>
<meta HTTP-EQUIV="REFRESH" content="0; url=lte-ie8.html">
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />