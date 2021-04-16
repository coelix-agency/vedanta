<?php 
/*
 * Home: Intro
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;
?>

<?php if( ! get_field( 'home-intro-hide', get_the_ID() ) ) : ?>
    <!-- Intro Section -->
    <section class="hero">

        <!-- Background -->
        <div class="section-bg">
            <img
                    src="<?= get_template_directory_uri() ?>/assets/images/promo-bg.svg"
                    alt="<?= get_bloginfo('name') ?>"
                    title="<?= get_bloginfo('name') ?>"
            >
        </div>
        <!-- End Background -->

        <!-- Container -->
        <div class="container">

            <!-- Wrapper -->
            <div class="hero-wrapper">

                <!-- Header -->
                <div class="hero__header">

                    <?php if( ! empty( get_field( 'home-intro-title' ) ) ) : ?>
                        <h1 class="hero__title">
                            <?= get_field( 'home-intro-title' ) ?>
                        </h1>
                    <?php endif; ?>

                    <?php if( ! empty( get_field( 'home-intro-text' ) ) ) : ?>
                        <p class="hero__sub-title">
                            <?= get_field( 'home-intro-text' ) ?>
                        </p>
                    <?php endif; ?>

                </div>
                <!-- End Header -->

                <?php if( ! empty( get_field( 'home-intro-image' ) ) ) : ?>
                <!-- Image -->
                <div class="hero-img">
                    <div class="hero-wrapper-img">
                        <img
                                src="<?= get_field( 'home-intro-image' ) ?>"
                                alt="<?= get_bloginfo('name') ?>"
                                title="<?= get_bloginfo('name') ?>"
                        >
                    </div>
                </div>
                <!-- End Image -->
                <?php endif; ?>

                <?= get_template_part('template-parts/pages/home/_home', 'intro-brands'); ?>

            </div>
            <!-- End Wrapper -->

        </div>
        <!-- End Container -->

    </section>
    <!-- End Intro Section -->
<?php endif; ?>





