<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vtstheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<!-- <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> -->

		<div class="entry-meta">
			<?php vtstheme_posted_on(); ?> by <?php the_author_meta('user_firstname'); ?> <?php the_author_meta('user_lastname'); ?>
			<a id="share-toggle" class="button tertiary share"><i class="fa fa-share"></i> Share</a>
			<?php naked_social_share_buttons(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail( 'medium' );
		} 
		?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vtstheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">
		<?php vtstheme_entry_footer(); ?>
	</footer> --><!-- .entry-footer -->
</article><!-- #post-## -->

