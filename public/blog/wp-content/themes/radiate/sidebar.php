<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- my blog ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9947635423203396"
     data-ad-slot="4025605668"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php _e( 'Archives', 'radiate' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Meta', 'radiate' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
