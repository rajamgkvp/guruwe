<header id="header" class="wide-fat">
	<nav class="navbar navbar-default navbar-fixed-top always-open">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
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
						<a href="<?php echo BASE_PATH;?>/blog" class="dropdown-toggle">Blog</a>
					</li>

					<?php if(isset($_SESSION['Member']) && !empty($_SESSION['Member'])){
							$parts = explode(" ", $_SESSION['Member']['user_name']);
							$lastname = array_pop($parts);
							$firstname = implode(" ", $parts);
					?>
						<li class="dropdown">
				          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $firstname; ?> <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="<?php echo BASE_PATH;?>/logout">LogOut</a></li>
				          </ul>
				        </li>
					<?php }else{ ?>
						<li>
							<a href="javascript:void(0)" class="dropdown-toggle connect-with-facebook">Connect with <i class="fa fa-facebook"></i></a>
						</li>
					<?php } ?>
					<!--<li class="menu-item blog">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
					</li>-->
				</ul>
			</div><!--/.nav-collapse -->
		  </div>
		</nav>
</header>

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
