<?php

header('Content-Type: text/html; charset=utf-8');
	// подгружаем среду WP
	require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

	$catIds = $_POST['checks'];
	// global $paged;
	// if( get_query_var( 'paged' ) )
	// 	$my_page = get_query_var( 'paged' );
	// else {
	// 	if( get_query_var( 'page' ) )
	// 		$my_page = get_query_var( 'page' );
	// 	else
	// 		$my_page = 1;
	// 	set_query_var( 'paged', $my_page );
	// 	$paged = $my_page;
	// }

		$wp_query = new WP_Query(array('posts_per_page' => 7, 'cat' => $catIds)); 
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

