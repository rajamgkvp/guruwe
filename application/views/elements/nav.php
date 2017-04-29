<div class="logo"><img src="<?php echo BASE_PATH; ?>/img/gt-logo.png" style="width: 100%;"></div>

<nav class="nav nav--loaded">
	<ul class="nav__items">
		<li <?php if($slug == '/'){ echo "class='active home nav__item'";}else{echo "class='nav__item'";} ?> >
			<a class="dropdown-toggle" href="<?php echo BASE_PATH;?>">Home</a>
		</li>
		<li <?php if($slug == 'questions'){ echo "class='active question nav__item'";}else{echo "class='nav__item'";} ?>>
			<a href="<?php echo BASE_PATH;?>/questions" class="dropdown-toggle">FAQ</a>
		</li>
		<li class='nav__item'>
			<a href="<?php echo BASE_PATH;?>/blog/" class="dropdown-toggle">Blog</a>
		</li>
                        <?php
                        /*
		<li <?php if($slug == 'guru-transfer-pro'){ echo "class='active question'";} ?>>
			<a href="<?php echo BASE_PATH;?>/guru-transfer-pro" class="dropdown-toggle">Guru Transfer Pro</a>
		</li>
                        
		<li <?php if($slug == 'mobile'){ echo "class='active mobile'";} ?>>
			<a href="<?php echo BASE_PATH;?>/mobile" class="dropdown-toggle">Mobile</a>
		</li>
                          * 
                         */
                        ?>
 
		

		<?php /*if(isset($_SESSION['Member']) && !empty($_SESSION['Member'])){
				$parts = explode(" ", $_SESSION['Member']['user_name']);
				$lastname = array_pop($parts);
				$firstname = implode(" ", $parts);
		?>
			<li class='nav__item'>
	        	<a href="<?php echo BASE_PATH;?>/profile" class="dropdown-toggle">Welcome <?php echo $firstname; ?></a>
	        </li>
		<?php }else{ ?>
			<li class='nav__item'>
				<a href="javascript:void(0)" class="dropdown-toggle connect-with-facebook">Sign Up / Log In</a>
			</li>
		<?php } */?>
		<!--<li class="menu-item blog">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
		</li>-->
	</ul>
</nav>


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
					<a href="<?php echo BASE_PATH;?>/questions" class="dropdown-toggle">FAQ</a>
				</li>
                                <?php
                                /*
				<li <?php if($slug == 'guru-transfer-pro'){ echo "class='active question'";} ?>>
					<a href="<?php echo BASE_PATH;?>/guru-transfer-pro" class="dropdown-toggle">Guru Transfer Pro</a>
				</li>
                                
				<li <?php if($slug == 'mobile'){ echo "class='active mobile'";} ?>>
					<a href="<?php echo BASE_PATH;?>/mobile" class="dropdown-toggle">Mobile</a>
				</li>
                                  * 
                                 */
                                ?>
         
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
						<a href="javascript:void(0)" class="dropdown-toggle connect-with-facebook">Sign Up / Log In</a>
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
		<div class="login-container">
		    <div class="social-btn btn-facebook">
		        <button onClick="javascript:CallAfterLogin();return false;"><span><i class="fa fa-facebook"></i></span>CONTINUE WITH FACEBOOK</button>
		    </div>
		    <div class="errorbox relative">
		        <div id="error"></div>
		    </div>
		    <div class="sign-in-block">
		        <div class="login-block">
		            <div class="box-title">Or Email</div>
		            <form name="login" onsubmit="handleLogin()">
		                <div class="inputbox"><input placeholder="Email" name="email" value="" type="text"></div>
		                <div class="inputbox"><input placeholder="Password" name="password" value="" type="password"></div>
		                <button class="btn btn-danger btn-login">LOG IN</button>
		                <!--<div class="forgot-block-link">
		                    <div class="pull-right"><span class="link cursor-pointer">Forgot Password</span></div>
		                    <div class="clearfix"></div>
		                </div>-->
		            </form>
		            <div class="footer-label">
		                <div class="move-block">
		                    <span class="pull-left">Do not have an account?&nbsp;&nbsp;</span><span class="link pull-left cursor-pointer" onclick="gotosignup()">Sign up with email</span>
		                    <div class="clearfix"></div>
		                </div>
		            </div>
		        </div>
		    </div>


			<div class="sign-up-block hide">
			    <div class="signup-block">
			        <div class="box-title">Sign up with Email</div>
			        <form name="signup" onsubmit="handleSignup()">
			            <div class="inputbox"><input placeholder="Name" name="fullname" value="" type="text"></div>
			            <div class="inputbox"><input placeholder="Email" name="email" value="" type="text"></div>
			            <div class="inputbox"><input placeholder="Password" name="password" value="" type="password"></div>
			            <button class="btn btn-danger btn-login">SIGN UP</button>
			        </form>
			        <div class="footer-label">
			            <div class="move-block">
			                <span class="pull-left">Already have an Guru Transfer account?&nbsp;&nbsp;</span><span class="link pull-left cursor-pointer" onclick="gotosignin()">Log in</span>
			                <div class="clearfix"></div>
			            </div>
			            <div class="terms-line">By signing up. you agree to Guru Transfer Terms &amp; Privacy Policy.</div>
			        </div>
			    </div>
			</div>



		</div>
	</div>
</div>
