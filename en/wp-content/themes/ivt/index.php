<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ivt
 */

get_header(); ?>
	<main id="main" class="site-main" role="main">
		
		<img src="/wp-content/themes/ivt/img/slider-1.png">
	</main><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
