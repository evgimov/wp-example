<?php
/**
Template Name: all-products-page
 */
get_header(); ?>
	<div class="container">
		<div id="primary" class="full-width">
			<div style="display: inline-block;"></div>
			<div id="content" class="all-products-container" role="main">
				<?php the_breadcrumb(); ?>
				<div class="main-products-container">
					<a href="/home/products/synergy-center">
						<div class="product-sc-block">
							<div class="product-header">
								<div class="product-title">
									<h1>Synergy Center</h1>
								</div>
								<div class="product-description">
									Система управления деятельностью компании и электронным документооборотом
								</div>
							</div>
						</div>
					</a>
					<a href="/home/products/helios">
						<div class="product-helios-block">
							<div class="product-header">
								<div class="product-title">
									<h1>Асуно Гелиос</h1>
								</div>
								<div class="product-description">
									Автоматизированная система управления наружным наблюдением
								</div>
							</div>
						</div>
					</a>
					<a href="/home/products/monitoringtp">
						<div class="product-mtp-block">
							<div class="product-header">
								<div class="product-title">
									<h1>МТП04</h1>
								</div>
								<div class="product-description">
									Система мониторинга трансформаторных подстанций
								</div>	
							</div>
						</div>
					</a>
					<a href="/home/products/ustroystva-upravlenija-svetilnikami">
						<div class="product-svet-block">
							<div class="product-header">
								<div class="product-title">
									<h1>Устройства управления светильниками</h1>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div><!-- #content -->
    	</div>
		<hr style="height: 1px;color: #999999;width: 75em;position: relative; top: 0px">
	</div><!-- #primary -->

<?php get_footer(); ?>
