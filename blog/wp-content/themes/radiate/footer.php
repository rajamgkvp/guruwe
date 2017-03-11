<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */
?>

		</div><!-- .inner-wrap -->
	</div><!-- #content -->

	<!--<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'radiate_credits' ); ?>
			<?php _e( 'Proudly  powered by ', 'radiate' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php _e( 'WordPress', 'radiate' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'radiate' ), 'Radiate', '<a href="'.esc_url('http://themegrill.com/').'" rel="designer">ThemeGrill</a>' ); ?>
		</div>
	</footer><!-- #colophon -->
   <a href="#masthead" id="scroll-up"><span class="genericon genericon-collapse"></span></a>
</div><!-- #page -->

<script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
<script type="text/javascript" defer>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75174295-1', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_footer(); ?>

</body>
</html>
