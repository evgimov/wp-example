<?php
/**
Template Name: svet-product-page
 */
get_header(); ?>

<div id="main-content">
    <div style="display: inline-block;"></div>
    <div class="product-svet-main-container">
        <div class="product-container">
            <div class="product-header">
                <div class="product-description">
                    <h1>Устройства управления светильниками</h1>
                </div>
            </div>
            <div class="product-content">
                <div class="product-content-centered">
                    <div class="product-content-block">
                        <?php the_breadcrumb(); ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', 'page' ); ?>
                        <?php endwhile; // End of the loop. ?>  
                    </div>
                    <div id="sidebar" class="sidebar-product-container">
                        <div id="secondary" class="sidebar-ivt-news" role="complementary">
                            <a href="/home/news" class="all-product-news">Все новости</a>
                            <h2 class="sidebar-title">Новости продукта</h2>
                            <?php
                                $recent = new WP_Query("cat=7&showposts=3"); 
                                while($recent->have_posts()) : $recent->the_post();
                                ?>
                                <hr>
                                <div class="ivt-news-item">
                                    <div class="ivt-news-date">
                                        <?php echo dateToRussian(get_the_date());?>
                                    </div>
                                    <div class="ivt-news-title">
                                        <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                                    </div>
                                </div>

                                <?php endwhile; ?>
                        </div><!-- #secondary .sidebar-ivt-news -->
                        <div class="contact-us">
                            <span><img src="/wp-content/themes/ivt/img/btn-connet-icon.png" alt="connect_us"></span>
                            <a class="getcall" href="#" >Связаться с нами</a>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
   <hr style="height: 1px;color: #999999;width: 100%; max-width: 75em; position: relative;top: 0.7em;";>
</div>
<?php get_footer(); ?>
