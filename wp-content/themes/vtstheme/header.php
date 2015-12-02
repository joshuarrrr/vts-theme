<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vtstheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vtstheme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if ( is_single() ) : ?>
		<div class="splash" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>) center/cover;">
			<div class="site-branding">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
			<!-- <?php the_post_thumbnail( 'full' ); ?> -->
		</div>	
		<?php else : ?>
		<?php echo do_shortcode('[smartslider3 slider="1"]'); ?>
		<?php endif; ?>

		<a class="horizontal-logo" href="/">
			<span class="logo"></span>
		</a>
		<div class="social-follow">
			<a href="https://twitter.com/viewthespace">
				<i class="fa fa-twitter"></i>
			</a>
			<a href="https://instagram.com/viewthespace/">
				<i class="fa fa-instagram"></i>
			</a>
			<a href="https://www.linkedin.com/company/view-the-space">
				<i class="fa fa-linkedin "></i>
			</a>
			<a href="https://vimeo.com/viewthespace">
				<i class="fa fa-vimeo"></i>
			</a>
			<a class="subscribe-button secondary button" onclick="MktoForms2.loadForm('//app-sj05.marketo.com', '811-SJQ-803', 1175, function (form){MktoForms2.lightbox(form).show();});">Subscribe <i class="fa fa-envelope"></i></a>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle menu-button" aria-controls="primary-menu" aria-expanded="false">
				<span class="burger-icon"></span>
			</button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
