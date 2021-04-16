<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $product;

/**
 * VIN CODE
 */
$vin = get_post_meta( $product->get_id(), '_car_vincode', true );
$vin = (!empty($vin)) ? '<span class="car-info-vin">(' . $vin . ')</span>' : '';

/**
 * Title
 */
the_title( '<div class="cart-name">', $vin . '</div>' );
