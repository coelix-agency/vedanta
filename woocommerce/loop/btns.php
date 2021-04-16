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
    <div
            class="car-info-btn car-info-test modalForm"
            data-type="drive"
            data-product="<?= $product->get_id() ?>"
    >
        <?= _e( 'Бесплатный тест-драйв', 'vedanta' ) ?>
    </div>
    <!-- End Test -->

    <!-- Consultation -->
    <div
            class="car-info-btn car-info-consultation modalForm"
            data-type="consultation"
            data-product="<?= $product->get_id() ?>"
    >
        <?= _e( 'Получить консультацию', 'vedanta' ) ?>
    </div>
    <!-- End Consultation -->

</div>
<!-- End Btn Group -->