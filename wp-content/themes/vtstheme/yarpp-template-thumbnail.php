<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>

<?php if (have_posts()):?>
<h3>See what else is new...</h3>
<ol>
	<?php while (have_posts()) : the_post(); ?>
		<li>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if (has_post_thumbnail()):?>
				<div class="entry-thumbnail">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
				<?php endif; ?>
				<div class="entry-content">
					<header class="entry-header">
						<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php vtstheme_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-summary">
						<?php the_excerpt(); ?>
						<?php vtstheme_posted_in_category(); ?>
					</div><!-- .entry-summary -->
				</div>
			</article><!-- #post-## -->
		</li>
	<?php endwhile; ?>
</ol>

<?php else: ?>
<?php endif; ?>
