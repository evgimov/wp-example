<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ivt
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area">
		<div id="content" role="main">	
			<?php the_breadcrumb(); ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; // End of the loop. ?>

		</div><!--#content-->
	</div><!-- #primary -->
<?php 
	$sidebar = get_post_meta($post->ID, "sidebar", true);
	get_sidebar($sidebar);
?>
<hr>
</div>
<?php get_footer(); ?>
