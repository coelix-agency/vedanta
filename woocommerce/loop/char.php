<?php
/**
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */
defined( 'ABSPATH' ) || exit;

global $product;
$atributes = get_field('set-loop-chars', 'option');

?>
<!-- Characteristics -->
<div class="car-info-characteristics">

    <?php if($atributes) : foreach ($atributes as $atribute) : ?>

        <?php
        $attr = wc_get_attribute($atribute['set-loop-chars-attr']);
        $attr = $product->get_attribute( $attr->slug );
        if($attr) :
            ?>
            <div class="car-info-item year">
                <?php if( ! empty( $atribute['set-loop-chars-icon'] ) ) : ?>
                    <img
                            src="<?= $atribute['set-loop-chars-icon'] ?>"
                            alt=""
                            title=""
                            class="svg"
                    >
                <?php endif; ?>
                <?= $attr ?>
                <?= (!empty($atribute['set-loop-chars-end'])) ? ' ' . $atribute['set-loop-chars-end'] : '' ?>
            </div>
        <?php endif; ?>
    <?php endforeach; endif; ?>

</div>
<!-- End Characteristics -->