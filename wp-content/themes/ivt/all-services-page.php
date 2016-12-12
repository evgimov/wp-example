<?php
/**
Template Name: all-services-page
 */
get_header(); ?>
	<div class="container">
		<div id="primary" class="full-width">
			<div style="display: inline-block;"></div>
			<div id="content" class="all-services-container" role="main">
				<?php the_breadcrumb(); ?>
				<!-- <hr style="height: 1px;color: #999999;width: 65em; position: relative;top: -37px;left: 80px;"> -->
				<div class="main-services-container">
					<a href="/home/services/development">
						<div class="service-block razr">
							<div class="service-header">
								<h1>Разработка программного обеспечения</h1>
								<ul class="service-description">
									<li>Разработка и техническая поддержка ПО</li>
									<li>Внедрение ПО и обучение персонала</li>
									<li>Доработка и интеграция ПО</li>
								</ul>		
							</div>
						</div>
					</a>
					<a href="/home/services/consultation">
						<div class="service-block cons">
							<div class="service-header">
								<h1>Консультации в ИТ</h1>
								<ul class="service-description">
									<li>Аудит ИТ-инфраструктуры</li>
									<li>Разработка стратегии развития ИТ</li>
									<li>Организации работы ИТ-подразделений</li>
								</ul>
							</div>
						</div>
					</a>
					<a href="/home/services/projecting-asu">
						<div class="service-block proj-asu">
							<div class="service-header">
								<h1>Проектирование АСУ</h1>
								<ul class="service-description">
									<li>Обследование объекта автоматизации</li>
									<li>Разработка технического задания на проектирование</li>
									<li>Разработка проектно-сметной документации</li>
								</ul>
							</div>
						</div>
					</a>
					<a href="/home/services/projecting-osv">
						<div class="service-block proj-osv">
							<div class="service-header">
								<h1>Проектирование освещения</h1>
								<ul class="service-description">
									<li>Уличное освещение</li>
									<li>Промышленное освещение</li>
								</ul>
							</div>
						</div>
					</a>
				</div>
			</div><!-- #content -->
		</div>
		<hr style="height: 1px;color: #999999;max-width: 75em;width: 100%; position: relative;top: 0px;">
	</div>

<?php get_footer(); ?>
