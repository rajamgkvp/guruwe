<nav id="mainNav" class="nav navbar-right">
    <div class="container-fluid navbar-header">
		<div class="bars float-left"><a id="headerMenu" href="javascript:void(0);" class="menu"><div class="bar"></div></a></div>
		<div class="left-nav">
		    <!--<dl id="leftMenu" class="leftMenu accordion" style="height: 210px;">
		        <dt><a href="{{baseUrl}}">Home</a></dt>
		        <dt><a href="{{baseUrl}}/event">Event</a></dt>
		        <dt><a href="{{baseUrl}}/hubs">Hubs</a></dt>
		        <dt><a href="{{baseUrl}}/{{city}}/tag/fooddrinks"> Food &amp; Drinks </a></dt>
		        <dt><a href="{{baseUrl}}/{{city}}/tag/music"> Music </a></dt>
		        <dt><a href="{{baseUrl}}/{{city}}/tag/artculture">Art &amp; Culture</a></dt>
		        <dt><a href="{{baseUrl}}/collections">Hot 11</a></dt>
		    </dl>
		    <ul class="nav navbar-nav navbar-right">-->
		    <ul id="leftMenu" class="leftMenu accordion">
				<li <?php if($slug == '/'){ echo "class='active home'";} ?>>
					<a class="dropdown-toggle" href="<?php echo BASE_PATH;?>">Home</a>
				</li>
				<li <?php if($slug == 'questions'){ echo "class='active question'";} ?>>
					<a href="<?php echo BASE_PATH;?>/questions" class="dropdown-toggle">Question</a>
				</li>
				<li <?php if($slug == 'guru-transfer-pro'){ echo "class='active question'";} ?>>
					<a href="<?php echo BASE_PATH;?>/guru-transfer-pro" class="dropdown-toggle">Guru Transfer Pro</a>
				</li>
				<li <?php if($slug == 'mobile'){ echo "class='active mobile'";} ?>>
					<a href="<?php echo BASE_PATH;?>/mobile" class="dropdown-toggle">Mobile</a>
				</li>
				<li>
					<a href="<?php echo BASE_PATH;?>/blog/" class="dropdown-toggle">Blog</a>
				</li>

				<?php if(isset($_SESSION['Member']) && !empty($_SESSION['Member'])){
						$parts = explode(" ", $_SESSION['Member']['user_name']);
						$lastname = array_pop($parts);
						$firstname = implode(" ", $parts);
				?>
					<li>
			        	<a href="<?php echo BASE_PATH;?>/profile" class="dropdown-toggle">Welcome <?php echo $firstname; ?></a>
			        </li>
				<?php }else{ ?>
					<li>
						<a href="javascript:void(0)" class="dropdown-toggle connect-with-facebook">Connect with Facebook</a>
					</li>
				<?php } ?>
				<!--<li class="menu-item blog">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
				</li>-->
			</ul>

		</div>
	</div>
</nav>


<div class="connect-facebook hide">
	<div class="content">
		<div class="sign-in-text">Click on 'Connect with Facebook' so that you can access 1GB more.</div>
		<div id="results"></div>
		<div id="LoginButton" class="facebook-sign-in" onClick="javascript:CallAfterLogin();return false;">
			<img src="<?php echo BASE_PATH;?>/img/facebook-login.png">
		</div>
		<span class="small-login">we will never post anything without your permission</span>
	</div>
</div>
