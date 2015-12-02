<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vtstheme
 */

get_header(); ?>

	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/content/content', 'single' ); ?>

			<?php the_post_navigation( ['prev_text' => '<span class="nav-arrow">❬</span> Prev', 'next_text' => 'Next <span class="nav-arrow">❭</span>'] ); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
