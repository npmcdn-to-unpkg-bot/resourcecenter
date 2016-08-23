<?php
/**
 * resource center functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package resource_center
 */

if ( ! function_exists( 'resource_center_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function resource_center_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on resource center, use a find and replace
	 * to change 'resource-center' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'resource-center', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'resource-center' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// /*
	//  * Enable support for Post Formats.
	//  * See https://developer.wordpress.org/themes/functionality/post-formats/
	//  */
	// add_theme_support( 'post-formats', array(
	// 	'recipe',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'resource_center_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'resource_center_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function resource_center_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'resource_center_content_width', 640 );
}
add_action( 'after_setup_theme', 'resource_center_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function resource_center_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'resource-center' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'resource-center' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'resource_center_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function resource_center_scripts() {
	wp_enqueue_style( 'resource-center-main-styles', get_template_directory_uri() . '/assets/css/style.css' );

	wp_enqueue_script( 'resource-center-proactive', get_template_directory_uri() . '/assets/js/min/proactive-blog-min.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'resource_center_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/* New excerpt length of 120 words*/
function my_excerpt_length($length) {
return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');






function social_sharing_buttons($content) {
	if(is_singular()){

		// Get current page URL
		$crunchifyURL = get_permalink();

		$tempateURL = get_template_directory_uri();

		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL;
		$facebookURL = 'http://www.facebook.com/sharer.php?u='.$crunchifyURL;
		$linkedinURL = 'http://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;

		// Add sharing button at the end of page/page content
		$content .= '<div class="social-share">';
		$content .= '<a class="twitter" href="'. $twitterURL.'" target="_blank"><img src="'.$tempateURL.'/assets/img/twitter.svg"></a>';
		$content .= '<a class="facebook" href="'.$facebookURL.'" target="_blank"><img src="'.$tempateURL.'/assets/img/facebook.svg"></a>';
		$content .= '<a class="linkedin" href="'.$linkedinURL.'" target="_blank"><img src="'.$tempateURL.'/assets/img/linkedin.svg"></a>';
		$content .= '</div>';

		return $content;

	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'social_sharing_buttons');
