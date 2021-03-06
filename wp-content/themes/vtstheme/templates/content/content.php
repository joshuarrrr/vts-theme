<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vtstheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-listing' ); ?>>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
	<div class="entry-content">
		<header class="entry-header">
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php vtstheme_posted_on(); ?>
				<!-- <?php vtstheme_posted_in_category(); ?> -->
			</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<!-- <div class="entry-summary">
			<?php the_excerpt(); ?>
		</div> --><!-- .entry-summary -->

		<div class="entry-summary">
			<?php
				the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'vtstheme' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php vtstheme_posted_in_category(); ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vtstheme' ),
					'after'  => '</div>',
				) );
			?>


		</div><!-- .entry-summary -->

		<!-- <footer class="entry-footer">
			<?php vtstheme_entry_footer(); ?>
		</footer> --><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
