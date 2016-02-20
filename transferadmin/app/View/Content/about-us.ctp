<!--All Content Start-->
<div class="wrapper boxstyle">
	<!--Page Header Start-->
	<section class="page-header">
		<h1>About us</h1>
		<p><?php echo $content['title']; ?></p>
	</section>
	<!--Page Header End-->
	
	<!--Feature Image and Details-->
	<section class="box-container">
		
		<!--Page Navigation-->
		<nav class="pagenav">
			<ul>
				<li><a href="<?php echo SITE_URL;?>">home</a></li>
				<li>about us</li>
			</ul>
		</nav>
		
		<?php echo $content['content']; ?>
		
	</section>
	<!--Feature Image and Details End-->		
</div>
<!--All Content End-->

<script>
addClass('container', 'background backimage1');
function addClass(element, myClass) {
    $('.'+element).addClass(myClass);
}
</script>