<?php
/**
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */
defined( 'ABSPATH' ) || exit;

/**
 * Get Terms Brands
 */
$brands = get_terms(
    [
        'taxonomy' => 'brands'
    ]
);

if( is_array( $brands ) ) :

?>

    <!-- Brands -->
    <div class="catalog-brands">

        <!-- button > prev -->
        <div class="catalog-brands-nav swiper-button-prev">
            <img
                    src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg"
                    alt=""
                    title=""
                    class="svg hero__brands-arrow"
            >
        </div>
        <!-- end button > prev -->

        <!-- button > next -->
        <div class="catalog-brands-nav swiper-button-next">
            <img
                    src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg"
                    alt=""
                    title=""
                    class="svg hero__brands-arrow"
            >
        </div>
        <!-- end button > next -->

        <!-- container -->
        <div class="swiper-container">

            <!-- wrapper -->
            <div class="swiper-wrapper">

                <?php foreach ($brands as $brand) : ?>

                    <a href="<?= get_term_link( $brand->term_id, $brand->taxonomy ) ?>" class="hero__brands-item swiper-slide">
                        <?php
                        $image_id = get_term_meta( $brand->term_id, 'category-image-id', true );
                        if($image_id) : $image_url = kama_thumb_src( 'h=100 &attach_id=' . $image_id);
                            ?>
                            <!-- logo -->
                            <div class="hero__brands-slide-img">
                                <img
                                        src="<?= $image_url ?>"
                                        alt="<?= $brand->name ?>"
                                        title="<?= $brand->name ?>"
                                        class="hero__brands-img">
                            </div>
                            <!-- end logo -->
                        <?php endif; ?>

                        <!-- title -->
                        <p class="hero__brands-txt">
                            <?= $brand->name ?>
                        </p>
                        <!-- end title -->

                    </a>

                <?php endforeach; ?>

            </div>
            <!-- end wrapper -->

        </div>
        <!-- end container -->

    </div>
    <!-- Brands -->

<?php endif; ?>