<?php
/**
 * Template part for displaying single posts.
 *
 * @package ivt
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php ivt_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ivt' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php ivt_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

