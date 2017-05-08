<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-ie no-js">
<!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
   <meta name="google-site-verification" content="IUssZCf14MfoosGza8gh44LRPhPa2GA9inXG3QU0gSo" />
    <meta name="p:domain_verify" content="6843b03c83000afaaaa9d249d90c07f8"/>
    <meta name="msvalidate.01" content="64AF61C84113C15D43831A43C49168B9" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9947635423203396",
    enable_page_level_ads: true
  });
</script>
    <title><?php echo $title; ?></title>
    <meta name="robots" content="index,follow,noodp,noydir"/> 
    <meta property="og:url" content="https://www.gurutransfer.com<?php echo $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:description" content="<?php echo $metadesc; ?>">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:image" content="https://www.gurutransfer.com/img/fb-image.png">
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="1535182570125606" />
    <meta name="google-site-verification" content="IUssZCf14MfoosGza8gh44LRPhPa2GA9inXG3QU0gSo" />
    <meta name="description" content="<?php echo $metadesc; ?>">
    <meta name="keywords" content="<?php echo $metakeywords; ?>" />
    <meta name="author" content="GuruTransfer">

    <link rel="icon" href="<?php echo BASE_PATH;?>/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo BASE_PATH;?>/favicon.ico" type="image/x-icon">
    <link rel="image_src" href="wt-facebook.png">
    <meta name="application-name" content="GuruTransfer" />
    <meta name="google-play-app" content="app-id=com.seventeencube.webstr.webstrapp">
    <!--<meta name="apple-itunes-app" content="app-id=636515332">-->

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo BASE_PATH;?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo BASE_PATH;?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo BASE_PATH;?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo BASE_PATH;?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo BASE_PATH;?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo BASE_PATH;?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo BASE_PATH;?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo BASE_PATH;?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_PATH;?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo BASE_PATH;?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_PATH;?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo BASE_PATH;?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_PATH;?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo BASE_PATH;?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo BASE_PATH;?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

    <!-- CSS: implied media="all" -->
    <?php
    	echo $html->includeCss('inc/bootstrap/css/bootstrap.min');
        echo $html->includeCss('inc/font-awesome/css/font-awesome.min');
    	echo $html->includeCss('css/styles');
        echo $html->includeCss('css/classicTheme/style');
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

    <?php
		//echo $html->includeJs('js/output.min');
		echo $html->includeJs('js/jquery-1.10.2.min');
		echo $html->includeJs('js/bootstrap.min');
		echo $html->includeJs('js/ajaxupload-min');
        echo $html->includeJs('js/perfect-scrollbar.jquery');
		echo $html->includeJs('js/jquery.smartbanner');
		echo $html->includeJs('js/apps');
	?>

</head>
<body>
<div id="site">
<?php include('nav.php');?>
