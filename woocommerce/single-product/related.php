<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get Template Ctagory
 * @woocommerce_template_current_category()
 */
$vedanta_template = woocommerce_template_current_category();

if ( $related_products ) : ?>
    <!-- Section Related Products -->
    <section class="list-like silver-bg <?= $vedanta_template ?>">

        <!-- container -->
        <div class="container">

            <!-- col -->
            <div class="section-left-col"></div>
            <!-- end col -->

            <!-- col -->
            <div class="section-right-col">

                <!-- title -->
                <div class="section-title list-like-title">
					<?= _e( 'Похожие <span class="main-color">автомобили</span>', 'vedanta' ) ?>
                </div>
                <!-- end title -->

				<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );
					setup_postdata( $GLOBALS['post'] =& $post_object );
					wc_get_template_part( 'content', 'product' );
					?>

				<?php endforeach; ?>

				<?php woocommerce_product_loop_end(); ?>
            </div>
            <!-- end col -->

        </div>
        <!-- end container -->

    </section>
    <!-- End Section Related Products -->
<?php
endif;
wp_reset_postdata();
