<?php
/**
 * Single Product stock.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/stock.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Global Product
 * @global
 */
global $product;

/**
 * Get Meta Attr
 * @get_post_meta
 * @wp_get_post_terms
 */
$meta_vin       = get_post_meta( $product->get_id(), '_car_vincode', true );
$meta_key       = get_post_meta( $product->get_id(), '_car_key', true );
$meta_year      = wp_get_post_terms( $product->get_id(), 'pa_ru-god-vypuska', ['fields' => 'names'] );
$meta_probeg    = wp_get_post_terms( $product->get_id(), 'pa_ru-probeg', ['fields' => 'names'] );

?>



<!-- Passport -->
<div class="cart-passport">

    <!-- Title -->
    <div class="cart-aside-title">
		<?= _e( 'Технический паспорт', 'vedanta' ) ?>:
    </div>
    <!-- End Title -->

    <!-- List -->
    <ul class="cart-passport-list">

		<?php if( $meta_vin ) : ?>
            <li class="cart-passport-item">
                <div class="text">
                    <span class="title"><?= _e( 'VIN', 'vedanta' ) ?>:</span>
                    <span class="name"><?= $meta_vin ?></span>
                </div>
            </li>
		<?php endif; ?>

		<?php if( $meta_year ) : ?>
            <li class="cart-passport-item">
                <div class="text">
                    <span class="title"><?= _e( 'Год', 'vedanta' ) ?>:</span>
                    <span class="name"><?= implode(', ', $meta_year) ?></span>
                </div>
            </li>
		<?php endif; ?>

		<?php if( $meta_key ) : ?>
            <li class="cart-passport-item">
                <div class="text">
                    <span class="title"><?= _e( 'Ключи', 'vedanta' ) ?>:</span>
                    <span class="name"><?= ($meta_key) ? __( 'Да', 'vedanta' ) : __( 'Нет', 'vedanta' ) ?></span>
                </div>
            </li>
		<?php endif; ?>

		<?php if( $meta_probeg ) : ?>
            <li class="cart-passport-item">
                <div class="text">
                    <span class="title"><?= _e( 'Пробег', 'vedanta' ) ?>:</span>
                    <span class="name"><?= implode(', ', $meta_probeg) ?> км.</span>
                </div>
            </li>
		<?php endif; ?>

    </ul>
    <!-- End List -->

</div>
<!-- End Passport -->
