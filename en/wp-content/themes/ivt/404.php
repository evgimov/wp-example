<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ivt
 */

get_header(); ?>
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="entry-title">Страница «404»</h1>
						<p>Здравствуйте! <br>
							Добро пожаловать на «страницу 404» нашего сайта.<br>
							К сожалению, введенный Вами адрес недоступен. Этому может быть несколько объяснений:<br>
							<ol>
								<li>Страница удалена (из-за утраты актуальности информации)</li>
								<li>Страница перенесена в другое место</li>
								<li>Возможно, при вводе адреса была пропущена какая-то буква</li>
							</ol>
						</p>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'Пожалуйста, воспользуйтесь навигацией или формой поиска, чтобы найти интересующую Вас информацию.', 'ivt' ); ?></p>
	
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- #primary -->
		<hr style="height: 1px;color: #999999;max-width: 100%; position: relative; top: 30px;";>
	</div>
<?php get_footer(); ?>