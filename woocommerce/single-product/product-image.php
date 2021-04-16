<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
}


global $product;
/*
 * Title Product
 */
$post_title = $product->get_title();
/*
 * ID Single Image
 */
$post_thumbnail_id = $product->get_image_id();
/*
 * Array Gallery
 */
$attachment_ids = $product->get_gallery_image_ids();
?>

<!-- Gallery -->
<div class="cart-slider">

    <!-- Top -->
    <div class="swiper-container gallery-top">

        <?php
        /**
         * Hook: woocommerce_stock_single_product.
         *
         * @hooked woocommerce_stock_single_product_template - 10
         */
        do_action( 'woocommerce_stock_single_product' );
        ?>

        <!-- wrapper -->
        <div class="swiper-wrapper">

            <!-- Slide -->
            <div class="swiper-slide">
                <img
                        src="<?= kama_thumb_src('h=800 &q=75 &crop=false &attach_id='.$post_thumbnail_id) ?>"
						data-src="<?= kama_thumb_src('h=800 &q=75 &crop=false &attach_id='.$post_thumbnail_id) ?>"
                        alt="<?= $post_title ?>"
                        title="<?= $post_title ?>"
						data-fancybox="gallery-1"
                >
            </div>
            <!-- End Slide -->

            <?php if($attachment_ids) : $i=2; foreach ($attachment_ids as $thumb) : ?>
                <!-- slide -->
                <div class="swiper-slide">
                    <img
                            src="<?= kama_thumb_src('h=800 &q=75 &crop=false &attach_id='.$thumb) ?>"
							data-src="<?= kama_thumb_src('h=800 &q=75 &crop=false &attach_id='.$thumb) ?>"
                            alt="<?= $post_title ?>"
                            title="<?= $post_title ?>"
							data-fancybox="gallery-1"
                    >
                </div>
                <!-- end slide -->
            <?php $i++; endforeach; endif; ?>

        </div>
        <!-- end wrapper -->

        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white">
            <img
                    src="<?= get_template_directory_uri() ?>/assets/images/icons/cart-swiper-next.svg"
                    alt=""
                    title=""
                    class="svg"
            >
        </div>
        <div class="swiper-button-prev swiper-button-white">
            <img
                    src="<?= get_template_directory_uri() ?>/assets/images/icons/cart-swiper-next.svg"
                    alt=""
                    title=""
                    class="svg"
            >
        </div>
        <!-- End Add Arrows -->

    </div>
    <!-- End Top -->

    <!-- Thumbs -->
    <div class="swiper-container gallery-thumbs">

        <!-- wrapper -->
        <div class="swiper-wrapper">

            <!-- Slide -->
            <div class="swiper-slide">
                <img
                        src="<?= kama_thumb_src('w=200 &h=200 &q=75 &crop=false &attach_id='.$post_thumbnail_id) ?>"
                        alt="<?= $post_title ?>"
                        title="<?= $post_title ?>"
                >
            </div>
            <!-- End Slide -->

            <?php if($attachment_ids) : $i=2; foreach ($attachment_ids as $thumb) : ?>
                <!-- slide -->
                <div class="swiper-slide">
                    <img
                            src="<?= kama_thumb_src('w=200 &h=200 &q=75 &attach_id='.$thumb) ?>"
                            alt="<?= $post_title ?>"
                            title="<?= $post_title ?>"
                    >
                </div>
                <!-- end slide -->
            <?php $i++; endforeach; endif; ?>

        </div>
        <!-- end wrapper -->

    </div>
    <!-- End Thumbs -->

</div>
<!-- End Gallery -->
