<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package resource_center
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php
		$args = array(
			'category_name' => 'featured',
		);

		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<?php
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0]; ?>

				<div class="single-hero" style="background: linear-gradient(rgba(53, 53, 53, 0.6), rgba(53, 53, 53, 0.6)),
					              rgba(53, 53, 53, 0.6) url('<?php echo $thumb_url; ?>') no-repeat top center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-attachment: scroll;">
					<div class="single-hero-wrap">
						<div class="post-meta">Featured Article</div>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<a href="<?php the_permalink(); ?>"><button class="learn-more">Read More</button></a>
					</div>
				</div>

			<?php endwhile; ?>
		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

	<main id="main" class="site-main-home" role="main">

		<div class="grid">
			<div class="grid-sizer"></div>
				<?php
				$args = array(
					'post_type' => 'post',
					'cat' => '-2',
					'posts_per_page' => '-1'
				);

				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<?php
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0]; ?>

							<div class="home-box grid-item">
								<div class="home-box-image" style="background: url('<?php echo $thumb_url; ?>') no-repeat center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; height: 130px;"></div>

								<div class="home-box-wrap">
									<a class="home-box-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<p><?php the_excerpt(); ?></p>
								</div>

							</div>

					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
