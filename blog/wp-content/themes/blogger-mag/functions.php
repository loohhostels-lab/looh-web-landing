<?php /**
 * Blogger-Mag functions and definitions
 *
 * @package Blogger-Mag
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Theme version.
$blogger_mag = wp_get_theme();
if ( ! defined( ' BLOGGER_MAG_PATH' ) ) {
	define( ' BLOGGER_MAG_PATH', get_template_directory() . '/' );
}
if ( ! defined( ' BLOGGER_MAG_URI' ) ) {
	define( ' BLOGGER_MAG_URI', get_template_directory_uri() . '/' );
}
if ( ! defined( ' BLOGGER_MAG_VERSION' ) ) {
	define( ' BLOGGER_MAG_VERSION', $blogger_mag->get( 'Version' ) );
} 
if ( ! defined( ' BLOGGER_MAG_NAME' ) ) {
	define( ' BLOGGER_MAG_NAME'   , $blogger_mag->get( 'Name' ) );
} 

// Include admin plugin installer
require_once get_template_directory() . '/admin/blogger-mag-admin-plugin-install.php';

/**
 * Enqueue scripts and styles.
 */
function blogger_mag_scripts() {
	wp_enqueue_style( 'blogger-mag-theme-style', get_stylesheet_uri() );
	
	// Add Gooogle Font
	wp_enqueue_style( 
		'google-fonts', 
		'https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap', 
		[], 
		null 
	);
	wp_enqueue_style('blogger-mag-core', get_template_directory_uri() . '/css/core.css');

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'blogger_mag_scripts' );
if ( ! function_exists( 'blogger_mag_admin_scripts' ) ) :
function blogger_mag_admin_scripts() {
    wp_enqueue_script(
        'blogger-mag-admin-script',
        get_template_directory_uri() . '/admin/js/blogger-mag-admin-script.js',
        array( 'jquery' ),
        '',
        true
    );
    wp_localize_script(
        'blogger-mag-admin-script',
        'blogger_mag_ajax_object',
        array(
            'ajax_url'      => admin_url( 'admin-ajax.php' ),
            'install_nonce' => wp_create_nonce( 'blogger_mag_install_plugin_nonce' ),
            'can_install'   => current_user_can( 'install_plugins' ),
        )
    );
	wp_enqueue_style('blogger-mag-admin', get_template_directory_uri() . '/admin/css/admin.css');
}
endif;
add_action( 'admin_enqueue_scripts', 'blogger_mag_admin_scripts' );


if ( ! function_exists( 'blogger_mag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blogger_mag_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on stote elementor, use a find and replace
	 * to change 'blogger-mag' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blogger-mag', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/* Add theme support for gutenberg block */
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary menu', 'blogger-mag' ),
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

	/**
	 * Custom background support.
	 */
	add_theme_support( 'custom-background' );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

    // Woocommerce Gallery Support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

    // Added theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 210,
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	add_theme_support( "wp-block-styles" );

}
endif;
add_action( 'after_setup_theme', 'blogger_mag_setup' );


function blogger_mag_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) 
		the_custom_logo();
}

add_filter('get_custom_logo','blogger_mag_logo_class');

function blogger_mag_logo_class($html){
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
}
//Editor Styling 
add_editor_style( array( 'css/editor-style.css') );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('blogger_mag_archive_page_title')) :
        
	function blogger_mag_archive_page_title($title)	{
		if (is_category()) {
			$title = single_cat_title('', false);
		} elseif (is_tag()) {
			$title = single_tag_title('', false);
		} elseif (is_author()) {
			$title =  get_the_author();
		} elseif (is_post_type_archive()) {
			$title = post_type_archive_title('', false);
		} elseif (is_tax()) {
			$title = single_term_title('', false);
		}
		
		return $title;
	}
    endif;
add_filter('get_the_archive_title', 'blogger_mag_archive_page_title');

function blogger_mag_remove_section( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
}
add_action( 'customize_register', 'blogger_mag_remove_section' );

function blogger_mag_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'blogger_mag_excerpt_length', 999 );

require( get_template_directory() .'/inc/customizer.php');
