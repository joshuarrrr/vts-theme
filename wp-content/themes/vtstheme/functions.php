<?php
/**
 * vtstheme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package vtstheme
 */

if ( ! function_exists( 'vtstheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vtstheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vtstheme, use a find and replace
	 * to change 'vtstheme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'vtstheme', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'vtstheme' ),
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

	/**
	 * Hide admin bar for all users
	 */
	add_filter('show_admin_bar', '__return_false');

	/**
	 * Clean up wp_head
	 */
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link');
	remove_action( 'wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'index_rel_link');
	remove_action( 'wp_head', 'parent_post_rel_link_wp_head', 10, 0);
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action( 'wp_head', 'wp_generator');
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link');
	remove_action( 'wp_head', 'rel_canonical');
}
endif; // vtstheme_setup
add_action( 'after_setup_theme', 'vtstheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vtstheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vtstheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'vtstheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vtstheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vtstheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vtstheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vtstheme_scripts() {
	wp_enqueue_style( 'vtstheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'vtstheme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'vtstheme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	// JQuery
	if( !is_admin()){
		wp_deregister_script('jquery');
	}

	// Main
	wp_enqueue_script( 'main', get_template_directory_uri() . '/script.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Livereload
	if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
	  wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
	  wp_enqueue_script('livereload');
	}
}
add_action( 'wp_enqueue_scripts', 'vtstheme_scripts' );

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' … <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More ❭', 'your-text-domain' ) . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/lib/jetpack.php';
