<?php
/**
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */
defined( 'ABSPATH' ) || exit;

global $product;

?>
<!-- Btn Group -->
<div class="car-info-btns">

    <!-- Test -->
    <a href="<?= the_permalink() ?>" class="car-info-btn car-info-test">
        <?= _e( 'Подробнее', 'vedanta' ) ?>
    </a>
    <!-- End Test -->

    <!-- Consultation -->
    <div
            class="car-info-btn car-info-consultation modalForm"
            data-type="order"
            data-product="<?= $product->get_id() ?>"
    >
        <?= _e( 'Заказать', 'vedanta' ) ?>
    </div>
    <!-- End Consultation -->

</div>
<!-- End Btn Group -->