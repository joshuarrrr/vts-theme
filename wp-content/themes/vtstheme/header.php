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
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-24528753-5', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vtstheme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php
		/**
		 * The header area containing the optional header widget.
		 *
		 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
		 *
		 * @package vtstheme
		 */
		?>

		<?php if ( is_active_sidebar( 'header-1' ) && !is_single() ) : ?>
		<?php dynamic_sidebar( 'header-1' ); ?>
		<?php elseif ( is_single() ) : ?>
		<div class="splash" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>) center/cover;">
			<div class="site-branding">
				<?php 
				global $wp_query;
				$$post_id = $wp_query->post->ID;
				$post_author_id = get_post_field( 'post_author', $post_id );
				?>
				<?php /* the_title( '<h1 class="entry-title">', '</h1>' ); */ ?>
				<h1 class="entry-title"><?php echo get_the_title( $$post_id ) ?></h1>
				<div class="entry-meta">
					<?php vtstheme_posted_on(); ?> by <?php echo get_the_author_meta('user_firstname', $post_author_id); ?> <?php echo get_the_author_meta('user_lastname', $post_author_id); ?>
				</div><!-- .entry-meta -->
			</div>
			<?php /*the_post_thumbnail( 'full' );*/ ?>
		</div>
		<?php else : ?>
		<div class="splash" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>) center/cover;">
			<div class="site-branding">
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="hero-title"><?php bloginfo( 'name' ); ?></h1>
					<?php else : ?>
						<p class="hero-title"><?php bloginfo( 'name' ); ?></p>
					<?php endif;
				?>
			</div>
		</div>
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
