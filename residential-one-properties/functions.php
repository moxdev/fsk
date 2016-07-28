<?php
/**
 * Residential One Properties functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Residential_One_Properties
 */

if ( ! function_exists( 'residential_one_properties_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function residential_one_properties_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Residential One Properties, use a find and replace
	 * to change 'residential-one-properties' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'residential-one-properties', get_template_directory() . '/languages' );

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
	//add_theme_support( 'post-thumbnails' );
	add_image_size('gallery-thumb', 375, 320, true);
	add_image_size('gallery-main', 1400, 1000, false);
	add_image_size('floor-plan-main', 1400, 1400, false);
	add_image_size('home-highlight-lg', 1400, 1000, true);
	add_image_size('home-highlight-sm', 800, 600, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mobile' => esc_html__( 'Mobile Navigation', 'residential-one-properties' ),
		'desktop_primary_home' => esc_html__( 'Desktop Home Page Primary Navigation', 'residential-one-properties' ),
		'desktop_primary' => esc_html__( 'Desktop Site Primary Navigation', 'residential-one-properties' ),
		'desktop_alt' => esc_html__( 'Desktop Site Alt Navigation', 'residential-one-properties' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'residential_one_properties_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
}
endif;
add_action( 'after_setup_theme', 'residential_one_properties_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function residential_one_properties_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'residential_one_properties_content_width', 640 );
}
add_action( 'after_setup_theme', 'residential_one_properties_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function residential_one_properties_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Global Sidebar', 'residential-one-properties' ),
		'id'            => 'sidebar-global',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'residential-one-properties' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'residential_one_properties_widgets_init' );

/**
 * Load jQuery in the footer.
 */
function register_jquery()  {  
	if (!is_admin()) {  
		wp_deregister_script('jquery');  
        // Load the copy of jQuery that comes with WordPress  
        // The last parameter set to TRUE states that it should be loaded in the footer.  
        wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', FALSE, FALSE, TRUE);  
    }  
}  
add_action('init', 'register_jquery');

/**
 * Enqueue scripts and styles.
 */
function residential_one_properties_scripts() {
	wp_enqueue_style( 'residential-one-properties-style', get_stylesheet_uri() );

	wp_enqueue_script( 'residential-one-properties-navigation', get_template_directory_uri() . '/js/min/navigation-min.js', array(), '20151215', true );

	if(function_exists('get_field')) {
		if(is_page_template('page-photo-gallery.php')) {
			wp_enqueue_script( 'residential-one-properties-lightbox', get_template_directory_uri() . '/js/min/imagelightbox-min.js', array('jquery'), '20160524', true );
			wp_enqueue_script( 'residential-one-properties-gallery', get_template_directory_uri() . '/js/min/photo-gallery-min.js', array('residential-one-properties-lightbox'), '20160524', true );
		}
	}

	if(function_exists('get_field')) {
		if(is_page_template('page-location.php')) {
			$lat = get_field('latitude');
			$lng = get_field('longitude');
			if($lat && $lng) {
				//wp_enqueue_script( 'residential-one-properties-google-map-api', 'http://maps.google.com/maps/api/js', array(), '', true );
				wp_enqueue_script( 'residential-one-properties-location-map', get_template_directory_uri() . '/js/min/location-map-min.js', array(), '20160524', true );
			}
		}
	}

	if(function_exists('get_field')) {
		if(is_page_template('page-floor-plans.php')) {
			if( have_rows('floor_plans') ) {
				wp_enqueue_script( 'residential-one-properties-floor-plan-sort', get_template_directory_uri() . '/js/min/floor-plan-sort-min.js', array(), '20160524', true );
			}
		}
	}

	wp_enqueue_script( 'residential-one-properties-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'residential_one_properties_scripts' );

/**
 * Add async attributes to enqueued scripts where needed.
 * The ability to filter script tags was added in WordPress 4.1 for this purpose.
 * http://scottnelle.com/756/async-defer-enqueued-wordpress-scripts/
 */
function residential_one_properties_async_scripts( $tag, $handle, $src ) {
    // the handles of the enqueued scripts we want to async
    $async_scripts = array( 'residential-one-properties-navigation', 'residential-one-properties-location-map', 'residential-one-properties-floor-plan-sort' );

    if ( in_array( $handle, $async_scripts ) ) {
        return '<script type="text/javascript" src="' . $src . '" defer="defer"></script>' . "\n";
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'residential_one_properties_async_scripts', 10, 3 );

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

/**
 * Require Plugins
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'residential_one_properties_register_required_plugins' );

function residential_one_properties_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name' => 'Advanced Custom Fields', // The plugin name.
			'slug' => 'advanced-custom-fields', // The plugin slug (typically the folder name).
			'required' => true, // If false, the plugin is only 'recommended' instead of required.
		),

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name' => 'WP Smush - Image Optimization', // The plugin name.
			'slug' => 'wp-smushit', // The plugin slug (typically the folder name).
			'required' => false, // If false, the plugin is only 'recommended' instead of required.
		),
	);

	tgmpa( $plugins, $config );
}

/**
 * Included Plugins
 */
include_once( get_stylesheet_directory() . '/plugins/mm4-you-contact-form/mm4-you-cf.php' );

/**
 * SEO Page Headers
 */
function residential_one_properties_page_header() {
	if( function_exists( 'get_field' ) ) { 
		$on_page_title = get_field('on_page_title');
			if($on_page_title) { ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php echo $on_page_title; ?></h1>
			</header><!-- .entry-header -->
		<?php } else { ?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		<?php }
	}
}

/**
 * Sidebar Content
 */
function residential_one_properties_sidebar_content() {
	if( function_exists( 'get_field' ) ) { 
		$sidebar_content = get_field('custom_sidebar_content');
			if($sidebar_content) { ?>
				<aside class="custom_sidebar_content">
					<?php echo $sidebar_content; ?>
				</aside>
		<?php }
	}
}