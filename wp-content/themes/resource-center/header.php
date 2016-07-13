<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package resource_center
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script src="https://use.typekit.net/rbt8sio.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<?php wp_head(); ?>
<script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'resource-center' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="header-wrap">
				<div class="site-branding">
					<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/rs-logo.svg' ?>">
					</a>
				</div><!-- .site-branding -->

				<div class="email-signup">
					<div class="modal">
					  <label for="modal-1">
					    <div class="modal-trigger">Subscribe</div>
					  </label>
					  <input class="modal-state" id="modal-1" type="checkbox" />
					  <div class="modal-fade-screen">
					    <div class="modal-inner">
					      <div class="modal-close" for="modal-1"></div>
					      <p class="modal-intro">Subscribe to Proative MD's blog to recieve notifications when a new article or resource is posted.</p>
					      <p class="modal-content">
									<!-- Begin MailChimp Signup Form -->
									<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
									<style type="text/css">
										#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
										/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
										   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
									</style>
									<div id="mc_embed_signup">
									<form action="//proactive-md.us13.list-manage.com/subscribe/post?u=843ae67918930fc6b330a0d0d&amp;id=614fe38337" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
									    <div id="mc_embed_signup_scroll">
										<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" style="width: 100%;" required>
									    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
									    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_843ae67918930fc6b330a0d0d_614fe38337" tabindex="-1" value=""></div>
									    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="width: 100%; background-color: #52B5E0;"></div>
									    </div>
									</form>
									</div>
									<!--End mc_embed_signup-->
								</p>
								<p class="modal-disclaimer">*No spam just industry insites and resrouces.</p>
					    </div>
					  </div>
					</div>
				</div>

			</div>
		</header><!-- #masthead -->




	<div id="content" class="site-content">
