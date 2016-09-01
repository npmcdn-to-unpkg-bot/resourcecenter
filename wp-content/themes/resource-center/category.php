<?php
/**
 * The template for displaying the Category pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package resource_center
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main-home" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php single_cat_title(); ?></h1>
			</header><!-- .page-header -->

      	<div class="grid">
    			<div class="grid-sizer"></div>

    				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    						<?php $thumb_id = get_post_thumbnail_id();
    							    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    							    $thumb_url = $thumb_url_array[0]; ?>

    							<div class="home-box grid-item">
                    <div class="home-box-image" style="background: url('<?php echo $thumb_url; ?>') no-repeat center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; height: 130px;"></div>
    								<div class="home-box-wrap">
    									<a class="home-box-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    									<p><?php the_excerpt(); ?></p>
    								</div>
    							</div>

    			  <?php endwhile; else : ?>
	             <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
    			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
