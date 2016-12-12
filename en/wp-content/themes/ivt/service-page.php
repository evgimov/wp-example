<?php
/**
Template Name: service-page
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
    <div class="sidebar-container">
        <div class="contact-us">
            <span><img src="/wp-content/themes/ivt/img/btn-connet-icon.png" alt="connect_us"></span>
            <a class="getcall" href="#" >Связаться с нами</a>
        </div> 
    </div>

    <hr>
</div>
<?php get_footer(); ?>
