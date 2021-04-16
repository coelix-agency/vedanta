<?php 
/*
 * Home: Faq
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;

$id_page = ($args && array_key_exists('page_id', $args) && !empty( $args['page_id'] )) ? $args['page_id'] : get_the_ID();

?>

<?php if( ! get_field( 'home-faq-hide', $id_page ) ) : ?>

    <!-- Faq Section -->
    <section class="faq">

        <!-- container -->
        <div class="container">

            <!-- col -->
            <div class="section-left-col main">

                <!-- header -->
                <div class="section-left-col_header">

                    <?php if( ! empty( get_field( 'home-faq-title', $id_page ) ) ) : ?>
                    <!-- title -->
                    <h2 class="section-title section-left-title">
                        <?= get_field( 'home-faq-title', $id_page )  ?>
                    </h2>
                    <!-- end title -->
                    <?php endif; ?>

                    <?php if( ! empty( get_field( 'home-faq-text', $id_page ) ) ) : ?>
                    <!-- subtitle -->
                    <p class="section-left-subtitle">
                        <?= get_field( 'home-faq-text', $id_page )  ?>
                    </p>
                    <!-- end subtitle -->
                    <?php endif; ?>

                </div>
                <!-- end header -->

                <!-- bottom -->
                <div class="faq-left-bottom faq-clone">

                    <!-- title -->
                    <div class="faq-left-bottom-title">
                        <?= _e( 'Не нашли ответ на ваш вопрос?', 'vedanta' ) ?>
                    </div>
                    <!-- end title -->

                    <!-- text -->
                    <div class="faq-left-bottom-text">
                        <?= _e( 'Заполните небольшую форму и наш менеджер перезвонит вам в течении 15 минут', 'vedanta' ) ?>
                    </div>
                    <!-- end text -->

                    <!-- btn -->
                    <a
                            href="#"
                            class="callback-phone aside-btn modalForm"
                            data-type="callback"
                    >
                        <img
                                src="<?= get_template_directory_uri() ?>/assets/images/icons/phone-call.svg"
                                class="svg"
                                alt=""
                                title=""
                        >
                        <?= _e( 'Обратный звонок', 'vedanta' ) ?>
                    </a>
                    <!-- end btn -->

                </div>
                <!-- end bottom -->

            </div>
            <!-- end col -->

            <?php
            $faqs = get_field( 'home-faq-list', $id_page );
            if( $faqs ) :
            ?>
            <!-- col -->
            <div class="section-right-col">

                <?php foreach ($faqs as $post) : setup_postdata($post); ?>
                <!-- Item -->
                <div class="faq-question-list">

                    <!-- question -->
                    <div class="question">
                        <?= the_title() ?>
                        <img
                                src="<?= get_template_directory_uri() ?>/assets/images/icons/plus.svg"
                                alt=""
                                title=""
                                class="svg"
                        >
                    </div>
                    <!-- end question -->

                    <!-- answer -->
                    <div class="answer-item">

                        <!-- answer text -->
                        <div class="answer">
                            <?= get_the_content() ?>
                        </div>
                        <!-- end answer text -->

                    </div>
                    <!-- end answer -->

                </div>
                <!-- End Item -->
                <?php endforeach; wp_reset_postdata(); ?>

				<!-- mobile-clone-->
				<div class="mobile-clone"></div>
				<!-- end mobile-clone-->

            </div>
            <!-- end col -->
            <?php endif; ?>

        </div>
        <!-- end container -->

    </section>
    <!-- End Faq Section -->

<?php endif; ?>





