<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>
		<div class="container">
            <div style="display: inline-block;"></div>
			<div id="primary" class="full-width">
				<div id="content" role="main">
					<?php the_breadcrumb(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
					<?php endwhile; // End of the loop. ?>
				</div><!-- #content -->
			</div><!-- #primary -->
			<hr style="height: 1px;color: #999999;width: 100%; max-width: 100%; position: relative; top: 0;";>
		</div>
			
<?php get_footer(); ?>