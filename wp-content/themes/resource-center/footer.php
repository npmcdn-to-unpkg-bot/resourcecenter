<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package resource_center
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a class="bottom-logo" href="https://proactive-md.com" rel="home">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/proactive-logo.svg' ?>">
			</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->



<?php wp_footer(); ?>

</body>
</html>
