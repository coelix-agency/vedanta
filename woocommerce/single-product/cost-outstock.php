<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
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


/*$price_current  = ( $product->is_on_sale() ) ? $product->get_sale_price() : $product->get_regular_price();
$price_corea    = get_post_meta( $product->get_id(), '_car_price', true );
$price_cost     = 0;

if( $price_current <> 0 && $price_corea <> 0 ) :
    $price_cost = $price_current - $price_corea;
endif;*/


get_template_part('calculator/template/calculator', 'single');


?>
