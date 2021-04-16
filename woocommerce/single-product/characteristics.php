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
 * Get Attributes
 */
global $product;
$attributes  = $product->get_attributes();

?>

<?php if( $attributes ) : ?>
    <!-- Passport -->
    <div class="cart-passport">

        <!-- Title -->
        <div class="cart-aside-title">
			<?= _e( 'Характеристики', 'vedanta' ) ?>
        </div>
        <!-- End Title -->

        <!-- List -->
        <ul class="cart-passport-list">

	        <?php foreach ($attributes as $attr => $attribute) : ?>
                <?php
		        $attribute_label = wc_attribute_label($attr);
		        $attribute_value = $product->get_attribute($attr);
		        if( $attribute_value ) :
			        ?>
                    <li class="cart-passport-item">

                        <?php
                        $icon_id = get_post_meta($attribute->get_id(), 'itm_uploader_attribute_section',true);
                        $image = wp_get_attachment_image_src( $icon_id );
                        if($image) :
                        ?>
                        <div class="image">
                            <img
                                    src="<?= $image[0] ?>"
                                    alt=""
                                    title=""
                                    class="svg"
                            >
                        </div>
                        <?php endif; ?>

                        <div class="text">
                            <span class="title"><?= $attribute_label ?>:</span>
                            <span class="name"><?= $attribute_value ?> <?= ($attribute->get_name() == 'pa_ru-probeg') ? 'км.' : '' ?></span>
                        </div>
                    </li>
		        <?php endif; ?>
	        <?php endforeach; ?>

        </ul>
        <!-- End List -->

    </div>
    <!-- End Passport -->
<?php endif; ?>