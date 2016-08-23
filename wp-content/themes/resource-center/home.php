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

				<div class="single-hero" style="background: linear-gradient(rgba(42, 59, 71, 0.8), rgba(42, 59, 71, 0.8)),
					              rgba(42, 59, 71, 0.8) url('<?php echo $thumb_url; ?>') no-repeat bottom center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
					<div class="single-hero-wrap">
						<div class="post-meta">Featured Article</div>
						<h1 class="entry-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h1>
					</div>
				</div>

			<?php endwhile; ?>
		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

		<nav class="site-navigation">
			<div class="button-group filters-button-group">
				<button class="button is-checked" data-filter="*">Show All</button>
				<button class="button" data-filter=".Culture">Culture</button>
				<button class="button" data-filter=".Health">Health</button>
				<button class="button" data-filter=".Medical">Medical</button>
				<button class="button" data-filter=".Resources">Resources</button>
				<button class="button" data-filter=".Recipes">Recipes</button>
				<!-- <button class="button" data-filter=".Benefits">Benefits</button> -->
			</div>
		</nav>

	<main id="main" class="site-main-home" role="main">

		<div class="grid">
			<div class="grid-sizer"></div>
				<?php
				$args = array(
					'post_type' => 'post',
					'cat' => '-2',
				);

				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<?php
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
							$cats = array();
							foreach (get_the_category() as $c) {
							$cat = get_category($c);
							array_push($cats, $cat->name);
							}

							if (sizeOf($cats) > 0) { $post_categories = implode(' ', $cats); } else { $post_categories = 'Not Assigned'; } ?>

							<div class="home-box grid-item <?php echo $post_categories; ?>">
								<div class="home-box-image" style="background: url('<?php echo $thumb_url; ?>') no-repeat center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; height: 200px;"></div>

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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
