<?php
/**
Template Name: ivt home page
 */
get_header(); ?>

<div class="ivt-slider">
    <?php 
        echo do_shortcode("[rev_slider kenburnsslider]"); 
    ?>
</div>

<div id="main-content" class="main-container">


<!---- РАЗДЕЛ ПРОДУКТОВ ---->


    <div class="products-list">
        <ul class="product-items">
            <li class="helios zoomIn">
				<a href="/products/helios/">
					<h2>Гелиос</h2>
					<p>Автоматизированная система управления освещением</p>
					<span class="more">Подробнее</span>
				</a>
			</li>
			<li class="synergy">
				<a href="/products/synergy-center/">
					<h2>Synergy Center</h2>
					<p>Система управления деятельностью компании и&nbsp;электронным документооборотом</p>
					<span class="more">Подробнее</span>
				</a>	
            </li>
			<li class="mtp">
				<a href="/products/monitoringtp/">
					<h2>МТП04</h2>
					<p>Система мониторинга трансформаторных подстанций</p>
					<span class="more">Подробнее</span>
				</a>
            </li>
		</ul>	
    </div>
	
    <div class="home-page">
	
		<!---- БЛОК СТАТИСТИКИ ---->

        <div class="ivt-statistic">
            <ul>
                <li class="exp">
                     <span class="bullet">
                        <span class="number">12</span>
						лет на рынке
                    </span>
					<p>350 квалифицированных сотрудников, более 200 из которых сертифицированы.</p>
                </li>
                <li class="proj">
                     <span class="bullet">
                        <span class="number">41</span>
						проектов
                    </span>
					<p>350 квалифицированных сотрудников, более 200 из которых сертифицированы.</p>
                 </li>
                <li class="licn">
                     <span class="bullet">
                        <span class="number">3710</span>
						лицензий
                    </span>
					<p>350 квалифицированных сотрудников, более 200 из которых сертифицированы.</p>
                 </li>
			</ul>
        </div>
		
		<!---- ОБЛАСТИ ПРИМЕНЕНИЯ ---->
		
        <div class="ivt-branches">
			<div class="ivt-branches-container">
				<h2>Отрасли применения</h2>
				<ul>
					<li class="obrazovanie">
						<img src="/wp-content/themes/ivt/img/branches/icon-obrazovanie.png" alt="образование">
						<h3>Образование</h3>
					</li>
					<li class="dorogi">
						<img src="/wp-content/themes/ivt/img/branches/icon-dorogi.png" alt="дороги">
						<h3>Дороги</h3>
					</li>
					<li class="elektroenergetika">
						<img src="/wp-content/themes/ivt/img/branches/icon-elektroenergetika.png" alt="электроэнергетика">
						<h3>Электроэнергетика</h3>
					</li>
					<li class="energosberezhenie">
						<img src="/wp-content/themes/ivt/img/branches/icon-energosberezhenie.png" alt="энергосбережения">
						<h3>Энергосбережение</h3>
					</li>  
					<li class="gosupravlenie">
						<img src="/wp-content/themes/ivt/img/branches/icon-gosupravlenie.png" alt="государственное управление">
						<h3>Государственное управление</h3>
					</li>
					<li class="prom-osv">
						<img src="/wp-content/themes/ivt/img/branches/icon-promishlennoe-osveshenie.png" alt="промышленное освещение">
						<h3>Промышленное освещение</h3>
					</li>
					<li class="sel-xoz">
						<img src="/wp-content/themes/ivt/img/branches/icon-selskoe-hozyaistvo.png" alt="сельское хозяйство">
						<h3>Сельское хозяйство</h3>
					</li>
					<li class="teplicy">
						<img src="/wp-content/themes/ivt/img/branches/icon-teplicy.png" alt="теплицы">
						<h3>Теплицы</h3>
					</li> 
					<li class="torgovlya">
						<img src="/wp-content/themes/ivt/img/branches/icon-torgovlya.png" alt="розничная торговля">
						<h3>Розничная торговля</h3>
					</li>
					<li class="udk">
						<img src="/wp-content/themes/ivt/img/branches/icon-udk.png" alt="удк">
						<h3>УДК</h3>
					</li>
					<li class="ulic-osv">
						<img src="/wp-content/themes/ivt/img/branches/icon-ulichnoe-osveshenie.png" alt="уличное освещение">
						<h3>Уличное освещение</h3>
					</li>   
				 </ul>
			</div>
		</div>

        <!---- Наши партнёры ---->
        <div class="ivt-partners">
            <?php 
                echo do_shortcode('[wonderplugin_carousel id="1"]'); 
            ?>
        </div>

		<!---- Последние новости ---->
        <div class="ivt-last-news">
            <h2>Последние новости</h2>
            <ul class="news-container">
                <?php
                    $latest = get_posts('numberposts=3');
                    foreach( $latest as $post ):
                ?>
                    <li class="news-item">
                        <div class="news-date">
                            <?php echo dateToRussian(get_the_date());?>
                        </div>
                        <div class="thumb">
                            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                        </div>
                        <div class="news-title">
                            <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                        </div>
                        <div class="news-content">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="news-category">
                            <span>Категория: </span><?php the_category(); ?>
                        </div>
                    </li>
                <?php endforeach ?>          
            </ul>
        </div>
        <hr style="height: 1px;color: #999999;width: 100%; max-width: 100%; position: relative; top: 0px;">
    </div>
<?php get_footer(); ?>
