<?php if(!isset($_COOKIE['seen_banner'])) { ?>
    <div class="coockie-accept"><div class="make-left">We use cookie files to improve site functionality and personalisation. By continuing to use GuruTransfer, you accept our cookie and privacy policy.</div><div class="make-right"><i class="fa fa-times"></i></div></div>
<?php } ?>
<div id="fb-root"></div>

<?php if($slug != '/'){ ?>
<footer>
	<div id="info_footer">
		<div class="col-sm-2 col-xs-6 text-left">
			<ul id="disclaimer">
				<li>
					<li><img src="<?php echo BASE_PATH;?>/img/comodo_secure_white.png"></li>
				</li>
			</ul>
		</div>

		<div class="col-sm-2 col-xs-6 text-left">
			<ul id="disclaimer">
				<li>
					<h4>&copy; 2016 GuruTransfer.All rights reserved.</h4>
					<li><a href="<?php echo BASE_PATH;?>/policy">Policies</a></li>
					<li><a href="<?php echo BASE_PATH;?>/terms">Terms</a></li>
				</li>
			</ul>
		</div>

		<div class="col-sm-2 col-xs-6 text-left">
			<ul>
				<li><h4>GuruTransfer</h4></li>
				<li><a href="<?php echo BASE_PATH;?>/about-us">About us</a></li>
				<li><a href="<?php echo BASE_PATH;?>/advertise">Advertise</a></li>
			</ul>
		</div>

		<div class="col-sm-2 col-xs-6 text-left">
			<ul>
				<li><h4>Support</h4></li>
				<li><a href="<?php echo BASE_PATH;?>/how-it-works">How it works</a></li>
				<li><a href="<?php echo BASE_PATH;?>/questions">Questions</a></li>
				<li><a href="<?php echo BASE_PATH;?>/guru-transfer-pro">Guru Transfer Pro</a></li>
			</ul>
		</div>

		<div class="col-sm-2 col-xs-6 text-left">
			<ul>
				<li><h4>Community</h4></li>
				<li><a target="_blank" href="http://twitter.com/gurutransfer">Twitter</a></li>
				<li><a target="_blank" href="http://www.facebook.com/gurutransfer">Facebook</a></li>
			</ul>
		</div>
	</div>
</footer>
<?php } ?>
</div>
	<!-- Scripts -->
	<!-- jQuery -->
	<?php
		//echo $html->includeJs('js/output.min');

		echo $html->includeJs('js/jquery-1.10.2.min');
		echo $html->includeJs('js/bootstrap.min');
		echo $html->includeJs('js/perfect-scrollbar.jquery');
		echo $html->includeJs('js/ajaxupload-min');
		echo $html->includeJs('js/jquery.smartbanner');
		echo $html->includeJs('js/apps');
	?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56b380b1dd5c3ad2" async="async"></script>

	<script type="text/javascript" defer>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-75174295-1', 'auto');
	  ga('send', 'pageview');

	</script>
	
</body>
</html>