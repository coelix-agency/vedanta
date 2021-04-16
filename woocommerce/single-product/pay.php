<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/pay.php.
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
	exit; // Exit if accessed directly
}

global $product;

/**
 * Год
 */
$car_year_value_start = wp_get_post_terms( $product->get_id(), 'pa_ru-god-vypuska', [ 'fields' => 'names' ] )[0];
$car_year_start       = ( $car_year_value_start <> 0 ) ? $car_year_value_start : 0;

/**
 * Объем
 */
$car_obem_value_start = wp_get_post_terms( $product->get_id(), 'pa_ru-obem', [ 'fields' => 'names' ] )[0];
$car_obem_start       = ( $car_obem_value_start <> 0 ) ? $car_obem_value_start : 0;

/**
 * Тип авто
 */
$car_type_value_start = wp_get_post_terms( $product->get_id(), 'type_cars', [ 'fields' => 'ids' ] );
$car_type_value_start = array_flip( $car_type_value_start );
$car_type_start = key( $car_type_value_start );

/**
 * Тип топлива
 */
$car_oil_value_start = wp_get_post_terms( $product->get_id(), 'type_oil', [ 'fields' => 'ids' ] );
$car_oil_value_start = array_flip( $car_oil_value_start );
$car_oil_start = key( $car_oil_value_start );
?>

<!-- Container -->
<div
        class="cart-prices"
        id="calculatorSingle"
        data-product-id="<?= $product->get_id() ?>"
        data-product-price="<?= $product->get_regular_price() ?>"
        data-product-year="<?= $car_year_start ?>"
        data-product-obem="<?= $car_obem_start ?>"
        data-product-type="<?= (int)$car_type_start ?>"
        data-product-oil="<?= (int)$car_oil_start ?>"
        style="position: relative;z-index: 1"
>

</div>
<!-- End Container -->
