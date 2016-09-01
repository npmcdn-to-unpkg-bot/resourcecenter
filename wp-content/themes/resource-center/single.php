<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package resource_center
 */

get_header(); ?>

<?php $postid = get_the_ID(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
				$thumb_url = $thumb_url_array[0];
				?>

			<div class="single-hero" style="background: linear-gradient(rgba(53, 53, 53, 0.6), rgba(53, 53, 53, 0.6)),
			              rgba(53, 53, 53, 0.6) url('<?php echo $thumb_url; ?>') no-repeat top center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-attachment: scroll;">
				<div class="single-hero-wrap">
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>

					<div class="post-meta">
						<?php resource_center_posted_on(); ?>
					</div>
				</div>
			</div>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if( in_category( '1' ) ): ?><?php get_sidebar(); ?><?php endif; ?>

				<div class="entry-content">

					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'resource-center' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'resource-center' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php echo get_avatar( get_the_author_meta('user_email'), $size = '120'); ?>
					<p><span>About the Author</span><?php echo get_the_author_meta('description'); ?></p>

				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

		<?php	endwhile; // End of the loop.?>


		<div class="single-featured">
			<h1>Related Posts</h1>
			<div class="single-featured-wrap">
				<?php
				$categories = get_the_category();
				$cat_name = $categories[0]->cat_name;

				$args = array(
					'post_type' => 'post',
					'post__not_in' => array( $postid ),
					'posts_per_page' => 3,
					'category_name' => $cat_name,
				);

				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<?php
						$thumb_ids = get_post_thumbnail_id();
						$thumb_url_arrays = wp_get_attachment_image_src($thumb_ids, 'thumbnail-size', true);
						$thumb_urls = $thumb_url_arrays[0];
						?>

						<div class="single-box">
							<div class="home-box-image" style="background: url('<?php echo $thumb_urls; ?>') no-repeat center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; height: 100px;"></div>
							<div class="home-box-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>

					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
			</div>
		</div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
