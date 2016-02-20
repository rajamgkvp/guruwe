<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-ie no-js">
<!--<![endif]-->

<!-- Mirrored from www.wetransfer.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jan 2016 07:33:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>GuruTransfer</title>
    
    <meta property="og:description" content="GuruTransfer is a free service to send big or small files from A to B">
    <meta property="og:title" content="GuruTransfer">
    <meta property="og:image" content="https://www.gurutransfer.com/wt-facebook.png">
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="1535182570125606" />
    
    <meta name="description" content="GuruTransfer is a free service to send big or small files from A to B">
    <meta name="author" content="GuruTransfer">
    
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="image_src" href="wt-facebook.png">
    <meta name="application-name" content="GuruTransfer" />
    
    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

    <!-- CSS: implied media="all" -->
    <?php
    	echo $html->includeCss('inc/bootstrap/css/bootstrap.min');
        echo $html->includeCss('inc/font-awesome/css/font-awesome.min');
    	echo $html->includeCss('css/styles');
        echo $html->includeCss('css/style-responsive');
        echo $html->includeCss('css/perfect-scrollbar');
        echo $html->includeCss('css/circle');
		echo $html->includeJs('js/modernizr');
	?>

    <script type="text/javascript">
        var baseUrl = '<?php echo BASE_PATH;?>';
        var server_variables = {
            facebook_app_id: '<?php echo FACEBOOK_APP_ID; ?>',
            fbPermissions: '<?php echo FBPERMISSIONS; ?>'
        };
    </script>

</head>
<body>
	
<div id="site">
<?php include('nav.php');?>