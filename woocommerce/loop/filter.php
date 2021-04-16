<?php
/**
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */
defined( 'ABSPATH' ) || exit;
?>

<!-- Btns -->
<div class="catalog-aside-mobile-btns">

    <!-- Btn -->
    <div class="show-btn show-filter-btn">
        <?= _e( 'Фильтр', 'vedanta' ) ?>
    </div>
    <!-- End Btn -->

    <!-- Btn -->
    <div class="show-btn show-sort-btn">
        <?= _e( 'Сортировка', 'vedanta' ) ?>
    </div>
    <!-- End Btn -->

</div>
<!-- End Btns -->

<!-- Sort -->
<div class="catalog-body-sort">
	<div class="close">
		<img src="<?= get_template_directory_uri() ?>/assets/images/icons/arrow-mobile-filter.svg" alt=""
			 class="svg"> <?= _e( 'Сортировка', 'vedanta' ) ?>
	</div>

    <!-- Header -->
    <div class="sort-header">

        <!-- Title -->
        <div class="sort-title">
            <?= _e( 'Сортировка', 'vedanta' ) ?>:
        </div>
        <!-- End Title -->

        <img
                src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg"
                alt=""
                class="svg"
        >

    </div>
    <!-- End Header -->

    <!-- Wrap -->
    <div class="sort-list-wrap">

        <!-- Sort List -->
        <div class="sort-list">

            <a href="?orderby=menu_order" data-orderby="menu_order">По умолчанию</a>
            <a href="?orderby=price" data-orderby="price">От дешевых к дорогим</a>
            <a href="?orderby=price-desc" data-orderby="price-desc">От дорогих к дешевым</a>
            <a href="?orderby=date" data-orderby="date">Новинки</a>
            <a href="?orderby=popularity" data-orderby="popularity">Популярные</a>

        </div>
        <!-- End Sort List -->

    </div>
    <!-- End Wrap -->

</div>
<!-- End Sort -->

<!-- Filter -->
<div class="catalog-body-filter">

    <?php
    $queryFilters = new WP_Query(
        array(
            'post_type'     => 'br_product_filter',
            'nopaging'      => true,
            'fields'        => 'ids'
        )
    );
    $filters = $queryFilters->get_posts();
    if($filters) :
        foreach ($filters as $filter) :
            if($filter <> 2314) :
                ?>
                <!-- Item -->
                <div class="catalog-body-filter-item">
                    <?= do_shortcode('[br_filter_single filter_id='.$filter.']') ?>
                </div>
                <!-- End Item -->
                <?php
            endif;
        endforeach;
    endif;
    ?>

</div>
<!-- End Filter -->

<!-- Filter Footer -->
<div class="catalog-body-filter-footer">
    <?= do_shortcode( '[br_filter_single filter_id=2314]' ) ?>
</div>
<!-- End Filter Footer -->
