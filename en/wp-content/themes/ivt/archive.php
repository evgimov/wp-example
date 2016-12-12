<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ivt
 */

get_header(); ?>
		<div class="container">
			<div id="primary" class="full-width">
				<div style="display: inline-block;"></div>
				<div id="content" class="all-news-container" role="main">
					<?php the_breadcrumb(); ?>
					<?php 
						$categories = get_the_category();
						$category_id = $categories[0]->cat_ID;
						$category_name = $categories[0]->name;
					?>
					<h1>Новости - <?php echo $category_name ?></h1>
					<div class="news-filter">
						<?php 
							$categories = get_categories();  
								echo "<ul>";
									echo '<li><a href="/news">Все новости</a></li>';
								 	foreach($categories as $category) {
								 		if ($category->cat_name != "Новости"){
								 			echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>'; 
								 		}
								    } 
							    echo "</ul>";
					    ?>
					</div>
					<div class="news-content">
						<?php
							global $paged;
							if( get_query_var( 'paged' ) )
								$my_page = get_query_var( 'paged' );
							else {
								if( get_query_var( 'page' ) )
									$my_page = get_query_var( 'page' );
								else
									$my_page = 1;
								set_query_var( 'paged', $my_page );
								$paged = $my_page;
							}
						?>
								<?php
									$categories = get_the_category();
									$category_id = $categories[0]->cat_ID;
									$wp_query = new WP_Query(array('posts_per_page' => 7,'cat' => $category_id, 'paged' => $paged )); 

									while($wp_query->have_posts()) : $wp_query->the_post();
									?>
								
										<div class="ivt-news-item">
									        <div class="ivt-news-date">
									            <?php echo dateToRussian(get_the_date());?>
									        </div>
									        <div class="ivt-news-title">
									            <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
									        </div>
									        <div class="news-content">
									            <?php the_excerpt(); ?>
									        </div>
										</div>

								<?php endwhile; ?>	
							</div>	

							<?php
								if(function_exists('wp_pagenavi')) {
								 	wp_pagenavi( array( 'query' => $wp_query ));  
									 	
							 	}
								?>			
					</div>
				</div><!-- #content -->
                <div id="sidebar" class="sidebar-container-news">
                    <div id="secondary" class="sidebar-news-filter" role="complementary">
						<h2>Рубрики</h2>
							<?php 
								$categories = get_categories();  
									echo "<ul>";
										echo '<li><a href="/news">Все новости</a></li>';
									 	foreach($categories as $category) {
									 		if ($category->cat_name != "Новости"){
									 			echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>'; 
									 		}
									    } 
								    echo "</ul>";
						    ?>
                    </div>
                    <div class="contact-us">
                        <span><img src="/wp-content/themes/ivt/img/btn-connet-icon.png" alt="connect_us"></span>
                        <a class="getcall" href="#" >Связаться с нами</a>
                    </div>
                </div>
			</div><!-- #primary -->
			<hr style="height: 1px;color: #999999;max-width: 75em;width: 100%; position: relative; top: 0.625em";>
		</div>
		<div id="modal_form"><!-- Само окно --> 
		    <span id="modal_close">X</span> <!-- Кнопка закрыть --> 
		        <?php  
		    	  	echo do_shortcode("[contact-form-7 id='303' title='Feedback']"); 
		        ?>
		</div>
		<div id="overlay"></div><!-- Подложка -->

<?php get_footer(); ?>
			

