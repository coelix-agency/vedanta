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
global $product;

$terms = get_the_terms( get_the_id(), 'product_cat' );

?>
<!-- Status -->

<?php if( $terms[0]->term_id == 25 ) : ?>

	<?php
	$status = $product->get_stock_status();
	if( 'instock' == $status ) :

		$badge = '<div class="cart-car-status instock">';
		$badge .= '<img src="'. get_template_directory_uri() .'/assets/images/icons/status.svg" alt="" title="" class="svg">';
		$badge .= __( 'В наличии', 'vedanta' );
		$badge .= '</div>';

    elseif ( 'onbackorder' == $status ) :

		$badge = '<div class="cart-car-status onbackorder">';
		$badge .= '<img src="'. get_template_directory_uri() .'/assets/images/icons/status-clock.svg" alt="" title="" class="svg">';
		$badge .= __( 'Ожидается', 'vedanta' );
		$badge .= '</div>';

    elseif ( 'outofstock' == $status ) :

		$badge = '<div class="cart-car-status outstock">';
		$badge .= '<img src="'. get_template_directory_uri() .'/assets/images/icons/status-clock.svg" alt="" title="" class="svg">';
		$badge .= __( 'В пути', 'vedanta' );
		$badge .= '</div>';

	endif;
	?>

<?php else: ?>

	<?php
	$badge = '<div class="cart-car-status outstock">';
	$badge .= '<img src="'. get_template_directory_uri() .'/assets/images/icons/status-clock.svg" alt="" title="" class="svg">';
	$badge .= __( 'Под заказ', 'vedanta' );
	$badge .= '</div>';
	?>

<?php endif; ?>

<?= $badge ?>

<!-- End Status -->