<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package vtstheme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function vtstheme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'vtstheme_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function vtstheme_jetpack_setup
add_action( 'after_setup_theme', 'vtstheme_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function vtstheme_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'templates/content/content', get_post_format() );
	}
} // end function vtstheme_infinite_scroll_render
