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

$list           = get_field( 'set-complectation', 'options' );
$results        = [];
$id_product     = get_the_ID();

if( $list ) :

    foreach ($list as $key => $item) :

        if($item['set-complectation-list']) :

            foreach ($item['set-complectation-list'] as $key_child => $item_child) :

                $title = get_post_meta( $id_product, '_complectation_'.$key.'_'.$key_child );

                if($title && $title[0] == 'yes') :
                    $results[$key][] = $list[$key]['set-complectation-list'][$key_child];
                endif;

            endforeach;

        endif;

    endforeach;

endif;

?>

<?php if($results) : ?>
<!-- equipment -->
<div class="cart-equipment">

    <!-- title -->
    <div class="cart-equipment-title">
        <?= _e( 'Комплектация', 'vedanta' ) ?>:
    </div>
    <!-- end title -->

    <!-- row -->
    <div class="cart-equipment-row">

        <?php foreach ($results as $key => $result) : ?>
            <!-- column -->
            <div class="cart-equipment-column">

                <!-- title -->
                <div class="list-title">
                    <?= $list[$key]['set-complectation-title'] ?>
                </div>
                <!-- end title -->

                <?php if($result) : ?>
                <!-- list -->
                <ul class="cart-equipment-list">
                    <?php foreach ($result as $key_child => $item) : ?>
                        <li>
                            <?= $list[$key]['set-complectation-list'][$key_child]['set-complectation-list-name'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!-- end list -->
                <?php endif; ?>

            </div>
            <!-- end column -->
        <?php endforeach; ?>

    </div>
    <!-- end row -->

</div>
<!-- end equipment -->
<?php endif; ?>