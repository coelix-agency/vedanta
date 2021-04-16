<?php 
/*
 * Home: Sheme
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;
?>

<?php if( ! get_field( 'home-sheme-hide', get_the_ID() ) ) : ?>
    <!-- Promo Section -->
    <section class="information silver-bg">

        <!-- container -->
        <div class="container">

            <!-- col -->
            <div class="section-left-col main">

                <!-- header -->
                <div class="section-left-col_header">

                    <?php if( ! empty( get_field( 'home-sheme-title' ) ) ) : ?>
                        <!-- title -->
                        <h2 class="section-title section-left-title">
                            <?= get_field( 'home-sheme-title' ) ?>
                        </h2>
                        <!-- end title -->
                    <?php endif; ?>

                    <?php if( ! empty( get_field( 'home-sheme-text' ) ) ) : ?>
                        <!-- subtitle -->
                        <p class="section-left-subtitle">
                            <?= get_field( 'home-sheme-text' ) ?>
                        </p>
                        <!-- end subtitle -->
                    <?php endif; ?>

                </div>
                <!-- end header -->

                <!-- bottom -->
                <div class="information-left-bottom">

                    <!-- Title -->
                    <div class="information-left-bottom-title">
                        <?= _e( 'Узнайте стоимость авто прямо сейчас', 'vedanta' ) ?>
                    </div>
                    <!-- End Title -->

                    <!-- Subtitle -->
                    <div class="information-left-bottom-subtitle">
                        <?= _e( 'Воспользуйтесь нашим калькулятором для просчета доставки и растаможки автомобиля', 'vedanta' ) ?>
                    </div>
                    <!-- End Subtitle -->

                    <!-- btn -->
                    <a href="<?= the_permalink( 36 ) ?>" class="calculator aside-btn">
                        <img
                                src="<?= get_template_directory_uri() ?>/assets/images/icons/calculator.svg"
                                alt=""
                                title=""
                                class="svg"
                        >
                        <?= _e( 'Калькулятор', 'vedanta' ) ?>
                    </a>
                    <!-- end btn -->

                </div>
                <!-- end bottom -->

            </div>
            <!-- end col -->

            <?php if( have_rows('home-sheme-list') ) : ?>
            <!-- col -->
            <div class="section-right-col">

                <!-- row -->
                <div class="information-right-row">

                    <?php while ( have_rows('home-sheme-list') ) : the_row(); ?>
                        <!-- column -->
                        <div class="information-column">

                            <!-- elem -->
                            <div class="information-elem">

                                <?php if( ! empty( get_sub_field('home-sheme-list-icon') ) ) : ?>
                                    <!-- icon -->
                                    <div class="information-elem-img">
                                        <img
                                                src="<?= get_sub_field('home-sheme-list-icon') ?>"
                                                alt="<?= get_sub_field('home-sheme-list-title') ?>"
                                                title="<?= get_sub_field('home-sheme-list-title') ?>"
                                                class=""
                                        >
                                    </div>
                                    <!-- end icon -->
                                <?php endif; ?>

                                <!-- title -->
                                <div class="information-elem-title">
                                    <?= get_sub_field('home-sheme-list-title') ?>
                                </div>
                                <!-- end title -->

                                <!-- text -->
                                <div class="information-elem-content">
                                    <?= get_sub_field('home-sheme-list-text') ?>
                                </div>
                                <!-- end text -->

                            </div>
                            <!-- end elem -->

                        </div>
                        <!-- end column -->
                    <?php endwhile; ?>

                </div>
                <!-- end row -->

            </div>
            <!-- end col -->
            <?php endif; ?>

        </div>
        <!-- end container -->

    </section>
    <!-- End Promo Section -->
<?php endif; ?>





