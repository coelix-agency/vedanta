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


$price_current  = ( $product->is_on_sale() ) ? $product->get_sale_price() : $product->get_regular_price();
$price_corea    = 0;
$price_cost     = 0;

if( $price_current <> 0 && $price_corea <> 0 ) :
    $price_cost = $price_current - $price_corea;
endif;

?>
<!-- Cost -->
<div class="cart-cost">

    <!-- title -->
    <div class="cart-aside-title">
        <?= _e( 'Стоимость', 'vedanta' ) ?>:
    </div>
    <!-- end title -->

    <!-- row -->
    <div class="cart-cost-row">

        <span class="cart-cost-column">
            <?= _e( 'Авто под ключ в Украине', 'vedanta' ) ?>
        </span>

        <span class="cart-cost-column">
            <?= (number_format($price_current, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?>
        </span>

    </div>
    <!-- end row -->

	<?php if( $price_corea <> 0 ) : ?>
        <!-- row -->
        <div class="cart-cost-row">

        <span class="cart-cost-column">
            <?= _e( 'Авто в Корее', 'vedanta' ) ?>
        </span>

            <span class="cart-cost-column">
            <?= (number_format($price_corea, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?>
        </span>

        </div>
        <!-- end row -->
	<?php endif; ?>

    <?php if($price_cost <> 0) : ?>
    <!-- row -->
    <div class="cart-cost-row cart-cost-row-total">

        <span class="cart-cost-column">
            <?= _e( 'Выгода', 'vedanta' ) ?>
        </span>

        <span class="cart-cost-column">
            <?= (number_format($price_cost, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?>
        </span>

    </div>
    <!-- end row -->
    <?php endif; ?>

    <!-- row -->
    <div
            class="cart-cost-btn cart-cost-consultation modalForm"
            data-type="consultation"
            data-product="<?= $product->get_id() ?>"
    >
        <?= _e( 'Консультация', 'vedanta' ) ?>
    </div>
    <!-- end row -->

    <!-- row -->
    <div
            class="cart-cost-btn cart-cost-testdrive modalForm"
            data-type="drive"
            data-product="<?= $product->get_id() ?>"
    >
        <?= _e( 'Бесплатный тест-драйв', 'vedanta' ) ?>
    </div>
    <!-- end row -->

</div>
<!-- End Cost -->