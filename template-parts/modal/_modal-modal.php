<?php
/*
 * Modal: Modal
 */
if ( ! defined('ABSPATH')) :
    exit();
endif;
?>

<!-- Pop -->
<div class="pop-up"></div>
<!-- End Pop -->

<!-- Menu -->
<div class="mobile-menu">

    <!-- Menu > header -->
    <div class="mobile-header close">
		<!-- Logo -->
		<?php
		$logo_url = get_theme_mod( 'logo' );
		?>
		<div class="logo">
			<img
				src="<?= $logo_url ?>"
				alt="<?= get_bloginfo('name') ?>"
				title="<?= get_bloginfo('name') ?>"
				class="svg"
			>
		</div>
		<!-- End Logo -->
		<div class="close">
			<img src="<?= get_template_directory_uri() ?>/assets/images/icons/close.svg" alt="" class="svg">
		</div>
    </div>
    <!-- End Menu > header -->
	<div class="wrapper">
		<div class="mobile-bottom-nav"></div>
		<div class="mobile-top-nav"></div>
		<div class="mobile-lang"></div>
		<div class="mobile-worktime"></div>
		<div class="mobile-social"></div>
	</div>

</div>
<!-- End Menu -->
<!--popup-check-->
<div class="popup-check">
	<div class="close">
		<img src="<?= get_template_directory_uri() ?>/assets/images/icons/close.svg" alt="" class="svg">
	</div>
	<div class="container">
		<div class="title">Полная проверка автомобиля в корее</div>
		<div class="content">
			<ul>
				<li>Проверка лакокрасочного покрытия с помощью толщиномера</li>
				<li>Проверка состояния двигателя</li>
				<li>Проверка ходовой части и КПП</li>
				<li>Полный фото и видео обзор автомобиля </li>
				<li>Проверка пробега</li>
			</ul>
			<p>Стоимость данной услуги составляет 200$, срок осуществления – 3
				рабочих дня после оплаты. Как только проверка будет завершена, с вами
				свяжется наш менеджер и предоставит всю актуальную информацию.</p>
		</div>
		<?= get_template_part('template-parts/forms/_form', 'checking') ?>
	</div>
</div>
<!--End popup-check-->

