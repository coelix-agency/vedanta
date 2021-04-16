<?php 
/*
 * Home: Intro Brands
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;
?>

<?php if( ! get_field( 'home-intro-brands-hide', get_the_ID() ) ) : ?>

    <!-- Brands Wrap -->
    <div class="hero__brands-wrap">

        <!-- Brands -->
        <div class="hero__brands">

            <?php if( ! empty( get_field( 'home-intro-brands-hide' ) ) ) : ?>
                <!-- Title -->
                <h3 class="hero__brands-title">
                    <?= get_field( 'home-intro-brands-hide' ) ?>
                </h3>
                <!-- End Title -->
            <?php endif; ?>

            <?php
            $brands = get_field( 'home-intro-brands-list', get_the_ID() );
            if( $brands ) :
            ?>
                <!-- Slider -->
                <div class="hero__brands-slider">
                    <!-- container -->
                    <div class="swiper-container">
                        <!-- wrapper -->
                        <div class="swiper-wrapper">

                            <?php foreach ($brands as $brand) : $image_id = get_term_meta ( $brand->term_id, 'category-image-id', true ); ?>
                                <!-- slide -->
                                <a href="<?= get_term_link( $brand->term_id ) ?>" class="hero__brands-item swiper-slide">
                                    <?php if($image_id) : ?>
                                    <div class="hero__brands-slide-img">
                                        <img
                                                src="<?= wp_get_attachment_image_url( $image_id, 'full' ) ?>"
                                                alt="<?= $brand->name ?>"
                                                title="<?= $brand->name ?>"
                                                class="hero__brands-img"
                                        >
                                    </div>
                                    <?php endif; ?>
                                    <p class="hero__brands-txt">
                                        <?= $brand->name ?>
                                    </p>
                                </a>
                                <!-- end slide -->
                            <?php endforeach; ?>

                        </div>
                        <!-- end wrapper -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- End Slider -->
            <?php endif; ?>

            <!-- Navi -->
            <div class="swiper-button-next">
                <img
                        src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg"
                        alt=""
                        title=""
                        class="svg hero__brands-arrow"
                >
            </div>
            <!-- End Navi -->

        </div>
        <!-- End Brands -->

    </div>
    <!-- End Brands Wrap -->

<?php endif; ?>





