<?php
/*
 * Page: Delivery
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;
?>

<?= get_template_part( 'template-parts/partials/_partial', 'pagehead', [] ) ?>

<!-- Delivery Page -->
<section class="delivery about-section">
	<div class="container">
		<div class="about-content">
			<div class="section-left-col">
				<div class="title">Компания <span class="main-color">Vedanta&nbsp;Auto&nbsp;—</span></div>
				<div class="subtitle">это самая большая площадка автомобилей в наличии в Украине.</div>
			</div>
			<div class="section-right-col">
				<div class="content">
					<p>В нашем автопарке представлено множество автомобилей Kia, Hyundai, Chevrolet и Renault, от бюджетных до эксклюзивных новых автомобилей в различных комплектациях.
					</p>
					<p>В автосалонах представлен магазин, где вы после покупки автомобиля с легкостью найдете фильтры и другие необходимые запчасти, которые для вас мы уже заказали из Южной Кореи.
					</p>
				</div>
				<div class="image">
					<img src="<?= get_template_directory_uri() ?>/assets/images/delivery/01.jpg" alt="">
				</div>
			</div>
		</div>
		<!-- /.about-content -->
		<div class="about-content">
			<div class="section-left-col">
				<div class="title">Процедура заказа <span class="main-color">автомобиля:</span></div>
			</div>
			<div class="section-right-col">
				<div class="content">
					<p>Процедура заказа автомобиля из Южной Кореи с компанией Vedanta очень проста, ведь менеджер предоставляет большое количество вариантов через сертифицированного брокера, а также есть возможность по очень выгодной цене подобрать автомобиль с максимальной комплектацией и в том цвете, о котором вы давно мечтали.
					</p>
					<p>Доставка из Южной Кореи занимает около 1,5месяца, при этом ваш груз полностью застрахован, а наши менеджеры постоянно держать руку на пульсе и у вас есть возможность отслеживать процесс на любом этапе.
					</p>
					<p>
						Компания Vedanta осуществляет полный спект брокерских услуг и может взять на себя все вопросы по растаможиванию грузов из любой страны.
					</p>
				</div>
				<div class="image">
					<img src="<?= get_template_directory_uri() ?>/assets/images/delivery/02.jpg" alt="">
				</div>
			</div>
		</div>
		<!-- /.about-select -->
	</div>
	<!-- /.container -->
</section>
<!-- End delivery Page -->

<?php
/**
 * Home: Feedback
 * @get_template_part
 */
get_template_part('template-parts/pages/home/_home', 'feedback', ['page_id' => 2]);

/**
 * Home: Contacts
 * @get_template_part
 */
get_template_part('template-parts/pages/home/_home', 'contacts', ['page_id' => 2]);