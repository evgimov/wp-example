<?php
/**
 * The template for displaying search results pages.
 *
 * @package ivt
 */


get_header(); ?>
<div class="container">
    <div id="primary" class="content-area">
 		<div id="content" role="main">  
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Результаты поиска: "%s"', 'ivt' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation( array(
						'prev_text'          => 'Предыдущие записи',
						'next_text'          => 'Следующие записи',
						'screen_reader_text' => 'Навигация',
					) );
				?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>
		
		</div>
	</div>
	<hr style="height: 1px;color: #999999;max-width: 75em; width: 100%; position: relative;top: 0px;";>
</div>
<?php get_footer(); ?>
