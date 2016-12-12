<?php
/**
 * The template for displaying all single posts.
 *
 * @package ivt
 */

get_header(); ?>
	<div class="container">
		<div id="primary" class="content-area">
			<div id="content" role="main">  
				<?php the_breadcrumb(); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php the_post_navigation(); ?>

			<?php endwhile; // End of the loop. ?>
			</div>
		</div><!-- #primary -->	
	    <div class="sidebar-container">
	        <div class="contact-us">
	            <span><img src="/wp-content/themes/ivt/img/btn-connet-icon.png" alt="connect_us"></span>
	            <a class="getcall" href="#" >Связаться с нами</a>
	        </div> 
   	 	</div>
   		 <hr style="height: 1px;color: #999999;max-width: 75em;width: 100%; position: relative;top: 0px;";>
	</div>

<?php get_footer(); ?>
