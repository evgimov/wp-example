<?php
/**
 * The Ivt-news-sidebar
 *
 */
?>	
	<div id="sidebar" class="sidebar-container">
		<div class="sidebar-documents-block">
			<ul>
				<li><a href="/home/docs">Правовые документы</a></li>
				<li><a href="/home/achieve">Достижения</a></li>
			</ul>
		</div>
		<div id="secondary" class="sidebar-ivt-news" role="complementary">
			<a href="/home/news" class="all-news">Все новости</a>
			<h2 class="sidebar-title">Новости</h2>
			<?php
				$recent = new WP_Query("cat=10&showposts=3"); 
				while($recent->have_posts()) : $recent->the_post();
				?>
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


