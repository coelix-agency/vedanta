<?php
/*
 * Page: Crediting
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;
?>

<?= get_template_part( 'template-parts/partials/_partial', 'pagehead', [] ) ?>

<!-- lizing Page -->
<section class="lizing about-section">

	<!-- container -->
	<div class="container">

		<!-- content -->
		<div class="about-content">
			<div class="section-left-col">
				<div class="title">Кредитование <span class="main-color">и&nbsp;лизинг</span></div>
			</div>
			<div class="section-right-col">
				<div class="content">
					<p>У нас возможен кредит или лизинг.</p>
					<p>Процентная ставка  будет составлять от 15 до 35% за год. Срок кредита/лизинга возможен от года до семи. Все в зависимости от подходящих Вам условий. Для более детальной информации, обращайтесь к менеджерам.</p>
				</div>
				<div class="image">
					<img src="<?= get_template_directory_uri() ?>/assets/images/lizing/01.jpg" alt="">
				</div>
			</div>
		</div>
		<!-- end content -->

		<!-- select -->
		<div class="about-select">
			<div class="section-left-col">
				<div class="title">Вы <span class="main-color">выбираете</span></div>
			</div>
			<div class="section-right-col">
				<div class="about-select-row">
					<div class="about-select-column">
						<div class="about-select-image">
							<img src="<?= get_template_directory_uri() ?>/assets/images/icons/protection.svg" alt="" class="svg">
						</div>
						<div class="about-select-title">беззалоговые кредиты</div>
						<div class="about-select-content">Кредит на машину на беззалоговой основе. Приобретенный автомобиль не может быть отчужден и является исключительно вашей собственностью.</div>
					</div>
					<div class="about-select-column">
						<div class="about-select-image">
							<img src="<?= get_template_directory_uri() ?>/assets/images/icons/document.svg" alt="" class="svg">
						</div>
						<div class="about-select-title">Прозрачные условия</div>
						<div class="about-select-content">Мы работаем только по обоюдному договору между Клиентом и компанией. Покупайте б/у авто в кредит по понятным и простым условиям.</div>
					</div>
					<div class="about-select-column">
						<div class="about-select-image">
							<img src="<?= get_template_directory_uri() ?>/assets/images/icons/money.svg" alt="" class="svg">
						</div>
						<div class="about-select-title">Деньги «на руки»</div>
						<div class="about-select-content">Банк выдает вам необходимую сумму, на которую вы сможете осуществить покупку автомобиля</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end select -->

	</div>
	<!-- end container -->

</section>
<!-- End lizing Page -->
<!-- .Banks-section -->
<section class="banks about-section">
		<div class="container">
			<div class="about-content">
				<div class="section-left-col">

					<div class="title">
                        <?= _e( 'Кредитные условия наших <span class="main-color">и&nbsp;банков-партнеров</span>', 'vedanta' ) ?>
                    </div>

					<div class="subtitle">
						<?= _e( 'Мы предлагаем автолизинг – это дешевле кредита, принимаем решение за 2 часа, а передаем авто в течение нескольких дней после прибытия авто в Украину и его оформления на государственные номерные знаки.', 'vedanta' ) ?>
                    </div>

				</div>

				<div class="section-right-col">
					<?php
					global $post;
					$tmp_post   = $post;
					$args       = [
					                'posts_per_page'    => -1,
                                    'post_type'         => 'banks',
                    ];
					$banks      = get_posts( $args );

					if( $banks ) : ?>
                    <div class="banks-row-wrap">
                        <div class="banks-row">
						<?php foreach( $banks as $post ) : setup_postdata($post); ?>
                            <div class="banks-item">
                                <div class="banks-elem">
                                    <?php if( has_post_thumbnail() ) : ?>
                                    <div class="banks-logo">
                                        <img
                                                src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full') ?>"
                                                alt=""
                                                title=""
                                        >
                                    </div>
                                    <?php endif; ?>

                                    <div class="banks-table">
                                        <table>

                                            <?php if( !empty( get_field( 'banks_summa', get_the_ID() ) ) ) : ?>
                                            <tr>
                                                <td><?= _e( 'Сумма', 'vedanta' ) ?>:</td>
                                                <td><?= get_field( 'banks_summa', get_the_ID() ) ?></td>
                                            </tr>
                                            <?php endif; ?>

	                                        <?php if( !empty( get_field( 'banks_valuta', get_the_ID() ) ) ) : ?>
                                                <tr>
                                                    <td><?= _e( 'Валюта', 'vedanta' ) ?>:</td>
                                                    <td><?= get_field( 'banks_valuta', get_the_ID() ) ?></td>
                                                </tr>
	                                        <?php endif; ?>

	                                        <?php if( !empty( get_field( 'banks_time', get_the_ID() ) ) ) : ?>
                                                <tr>
                                                    <td><?= _e( 'Срок', 'vedanta' ) ?>:</td>
                                                    <td><?= get_field( 'banks_time', get_the_ID() ) ?></td>
                                                </tr>
	                                        <?php endif; ?>

	                                        <?php if( !empty( get_field( 'banks_procent', get_the_ID() ) ) ) : ?>
                                                <tr>
                                                    <td><?= _e( 'Процентная ставка в месяц', 'vedanta' ) ?>:</td>
                                                    <td><?= get_field( 'banks_procent', get_the_ID() ) ?></td>
                                                </tr>
	                                        <?php endif; ?>

	                                        <?php if( !empty( get_field( 'banks_commission', get_the_ID() ) ) ) : ?>
                                                <tr>
                                                    <td><?= _e( 'Разовая комиссия', 'vedanta' ) ?>:</td>
                                                    <td><?= get_field( 'banks_commission', get_the_ID() ) ?></td>
                                                </tr>
	                                        <?php endif; ?>

                                        </table>
                                    </div>
                                    <!-- /.banks-table -->
                                    <div class="banks-btn-wrap">
                                        <a
                                                data-fancybox="modal-<?= get_the_ID() ?>"
                                                data-src="#modal-<?= get_the_ID() ?>"
                                                href="javascript:;"
                                                class="btn"
                                                href="#modal-<?= get_the_ID() ?>"
                                        >
	                                        <?= _e( 'Подробнее', 'vedanta' ) ?>
                                        </a>
                                        <button class="btn-consultation modalForm" data-type="consultation">
                                            <?= _e( 'Консультация', 'vedanta' ) ?>
                                        </button>
                                    </div>
                                    <!-- /.banks-btn-wrap -->

                                    <!-- Modal -->
                                    <div class="hidden" id="modal-<?= get_the_ID() ?>" style="max-width: 800px">
                                        <?= the_content() ?>
                                    </div>
                                    <!-- end Modal -->

                                </div>
                            </div>
						<?php endforeach; ?>
                        </div>
                        <!-- /.banks-row -->
                    </div>
                    <?php endif; $post = $tmp_post; ?>

				</div>

			</div>
			<!-- /.about-content -->
			<div class="about-select">
				<div class="section-left-col">
					<div class="title">Вы <span class="main-color">выбираете</span></div>
				</div>
				<div class="section-right-col">
					<div class="about-select-row">
						<div class="about-select-column">
							<div class="about-select-image">
								<img src="<?= get_template_directory_uri() ?>/assets/images/icons/protection.svg" alt="" class="svg">
							</div>
							<div class="about-select-title">беззалоговые кредиты</div>
							<div class="about-select-content">Кредит на машину на беззалоговой основе. Приобретенный автомобиль не может быть отчужден и является исключительно вашей собственностью.</div>
						</div>
						<div class="about-select-column">
							<div class="about-select-image">
								<img src="<?= get_template_directory_uri() ?>/assets/images/icons/document.svg" alt="" class="svg">
							</div>
							<div class="about-select-title">Прозрачные условия</div>
							<div class="about-select-content">Мы работаем только по обоюдному договору между Клиентом и компанией. Покупайте б/у авто в кредит по понятным и простым условиям.</div>
						</div>
						<div class="about-select-column">
							<div class="about-select-image">
								<img src="<?= get_template_directory_uri() ?>/assets/images/icons/money.svg" alt="" class="svg">
							</div>
							<div class="about-select-title">Деньги «на руки»</div>
							<div class="about-select-content">Банк выдает вам необходимую сумму, на которую вы сможете осуществить покупку автомобиля</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.about-select -->
		</div>
		<!-- /.container -->
	</section>
<!-- /.Banks-section -->

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
