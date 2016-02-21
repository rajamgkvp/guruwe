<div id="fb-root"></div>

<?php if($slug != '/'){ ?>
<footer>
	<div id="info_footer">
		<div class="col-sm-3 col-xs-12 text-left">
			<ul id="disclaimer">
				<li>
					<h4>&copy; 2016 GuruTransfer.All rights reserved.</h4>
					<li><a href="<?php echo BASE_PATH;?>/policy">Policies</a></li>
					<li><a href="<?php echo BASE_PATH;?>/terms">Terms</a></li>
					
				</li>
			</ul>
		</div>

		<div class="col-sm-3 col-xs-12 text-left">
			<ul>
				<li><h4>GuruTransfer</h4></li>
				<li><a href="<?php echo BASE_PATH;?>/about-us">About us</a></li>
				<li><a href="<?php echo BASE_PATH;?>/advertise">Advertise</a></li>
			</ul>
		</div>

		<div class="col-sm-3 col-xs-12 text-left">
			<ul>
				<li><h4>Support</h4></li>
				<li><a href="<?php echo BASE_PATH;?>/how-it-works">How it works</a></li>
				<li><a href="<?php echo BASE_PATH;?>/questions">Questions</a></li>
				<li><a href="<?php echo BASE_PATH;?>/guru-transfer-pro">Guru Transfer Pro</a></li>
			</ul>
		</div>

		<div class="col-sm-3 col-xs-12 text-left">
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
		echo $html->includeJs('js/jquery-1.10.2.min');
		echo $html->includeJs('js/bootstrap.min');
		echo $html->includeJs('js/jquery.form.min');
		echo $html->includeJs('js/perfect-scrollbar.jquery');
		echo $html->includeJs('js/apps');
		echo $html->includeJs('js/advertising');
	?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56b380b1dd5c3ad2" async="async"></script>

</body>
</html>