<?php
/**
 * Single Product stock.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/description.php.
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

$textContent = get_the_content();
if( $textContent && $textContent !== "" ) :
	?>
    <!-- description -->
    <div class="cart-description">

        <!-- Title -->
        <div class="cart-description-title">
			<?= _e( 'Описание', 'vedanta' ) ?>:
        </div>
        <!-- End Title -->

        <!-- content -->
        <div class="cart-description-content">
			<?= the_content() ?>
        </div>
        <!-- end content -->

    </div>
    <!-- end description -->
<?php endif; ?>