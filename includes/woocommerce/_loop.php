<?php
defined( 'ABSPATH' ) || exit;

/**
 * Loop Products
 * @hooked remove
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

/**
 * Loop Products
 * @woocommerce_before_main_content
 * @woocommerce_output_content_wrapper
 */
add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
function woocommerce_output_content_wrapper() {

    $title = woocommerce_page_title(false);
    $class = 'catalog-list silver-bg';

    if( is_product_category() || is_tax() ) :

        $category = get_queried_object();
        $term_meta = get_option("taxonomy_" . $category->term_id);

        if($term_meta['wh_meta_title']) :
            $title = $term_meta['wh_meta_title'];
            $excerpt = $term_meta['wh_meta_desc'];
        endif;

        if( is_tax() ) :
	        $title = get_term_meta ( $category->term_id, 'brands-title', true );
	        $title = (!empty($title)) ? $title : $category->name;
	        $excerpt = get_term_meta ( $category->term_id, 'brands-excerpt', true );
        endif;

        get_template_part( 'template-parts/partials/_partial', 'pagehead', [
            'page_title'    => $title,
            'page_excerpt'  => $excerpt
        ] );
    endif;

    if ( is_product() ) :
        $class = 'cart silver-bg';
    endif;

    ?>
    <section class="<?= $class ?>">
    <?php
    if ( is_product() ) :
        get_template_part( 'template-parts/partials/_partial', 'breadcrumbs' );
    else:
        echo '<div class="container">';
    endif;
    ?>

    <?php

}

/**
 * Loop Products
 * @woocommerce_before_main_content
 * @woocommerce_output_content_wrapper_end
 */
add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
function woocommerce_output_content_wrapper_end() {

    if ( ! is_product() ) :
        echo '</div>';
    endif;
    ?>

    </section>
    <?php
}

/**
 * Loop Products
 * @woocommerce_before_main_content_brands
 * @woocommerce_output_content_wrapper
 */
add_action('woocommerce_before_main_content_brands', 'woocommerce_brands_slider', 10);
function woocommerce_brands_slider() {

    wc_get_template( 'loop/brands-slider.php' );

}

/**
 * Loop Products
 * @woocommerce_before_main_content_body
 * @woocommerce_before_main_content_body_open_tag
 */
add_action('woocommerce_before_main_content_body_open', 'woocommerce_before_main_content_body_open_tag', 10);
function woocommerce_before_main_content_body_open_tag() {
    ?>
    <!-- Body -->
    <div class="catalog-body">
<?php
}

/**
 * Loop Products
 * @woocommerce_before_main_content_body
 * @woocommerce_before_main_content_body_close_tag
 */
add_action('woocommerce_before_main_content_body_close', 'woocommerce_before_main_content_body_close_tag', 10);
function woocommerce_before_main_content_body_close_tag() {
    ?>

    </div>
    <!-- End Body -->
    <?php
}

/**
 * Loop Products
 * @woocommerce_before_shop_loop
 * @woocommerce_catalog_filters
 */
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_filters', 40);
function woocommerce_catalog_filters() {
    ?>
    <!-- Col -->
    <div class="section-left-col">

        <!-- aside -->
        <aside class="catalog-aside">
            <?= wc_get_template( 'loop/filter.php' ) ?>
        </aside>
        <!-- end aside -->

    </div>
    <!-- End Col -->
    <?php
}

/**
 * Loop Products
 * @woocommerce_before_shop_loop
 * @woocommerce_catalog_products_open
 */
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_products_open', 50);
function woocommerce_catalog_products_open() {
    ?>
    <!-- Col -->
    <div class="section-right-col">
    <?php
}

/**
 * Loop Products
 * @woocommerce_after_shop_loop
 * @woocommerce_catalog_products_close
 */
add_action('woocommerce_after_shop_loop', 'woocommerce_catalog_products_close', 20);
function woocommerce_catalog_products_close() {
    ?>
    </div>
    <!-- End Col -->

    <?php
}

/**
 * Loop Products
 * @woocommerce_before_shop_loop_item_title
 * @woocommerce_template_loop_product_thumbnail
 */
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
function woocommerce_template_loop_product_thumbnail() {
    global $product;
    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	/**
	 * ID Curren Category
	 * @get_queried_object
	 */
	$vedanta_template = woocommerce_template_current_category();

	/**
	 * Stock Status
	 * @get_stock_status
	 */
	$status = $product->get_stock_status();

    ?>
    <!-- Image -->
    <a href="<?= $link ?>" class="car-image">
        <?php
        $badge = null;
        if( 'template_instock' == $vedanta_template ) :

            if( 'instock' == $status ) :

	            $badge = '<div class="car-status instock">';
	            $badge .= '<img src="'. get_template_directory_uri() .'/assets/images/icons/status.svg" alt="" title="" class="svg">';
	            $badge .= __( 'В наличии', 'vedanta' );
	            $badge .= '</div>';

	        elseif ( 'onbackorder' == $status ) :

		        $badge = '<div class="car-status onbackorder">';
		        $badge .= '<img src="'. get_template_directory_uri() .'/assets/images/icons/status-clock.svg" alt="" title="" class="svg">';
		        $badge .= __( 'Ожидается', 'vedanta' );
		        $badge .= '</div>';

            elseif ( 'outofstock' == $status ) :

	            $badge = '<div class="car-status outstock">';
	            $badge .= '<img src="'. get_template_directory_uri() .'/assets/images/icons/status-clock.svg" alt="" title="" class="svg">';
	            $badge .= __( 'В пути', 'vedanta' );
	            $badge .= '</div>';

            endif;

        elseif ( 'template_outstock' == $vedanta_template ) :

        endif;

        echo $badge;
        ?>
        <img
            src="<?= kama_thumb_src('w=560 &attach_id='.get_post_thumbnail_id($product->get_id())) ?>"
            alt="<?= $product->get_title() ?>"
            title="<?= $product->get_title() ?>"
        >
    </a>
    <!-- End Image -->
    <?php
}

/**
 * Loop Products
 * @woocommerce_shop_loop_item_info_open
 * @woocommerce_catalog_products_close
 */
add_action('woocommerce_shop_loop_item_info_open', 'woocommerce_shop_loop_item_info_open_tag', 10);
function woocommerce_shop_loop_item_info_open_tag() {
    ?>
    <!-- Info -->
    <div class="car-info">
    <?php
}

/**
 * Loop Products
 * @woocommerce_shop_loop_item_info_close
 * @woocommerce_shop_loop_item_info_close_tag
 */
add_action('woocommerce_shop_loop_item_info_close', 'woocommerce_shop_loop_item_info_close_tag', 10);
function woocommerce_shop_loop_item_info_close_tag() {
    ?>
    </div>
    <!-- End Info -->
    <?php
}

/**
 * Loop Products
 * @woocommerce_shop_loop_item_title
 * @woocommerce_shop_loop_item_info_close_tag
 */
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
function woocommerce_template_loop_product_title() {
    global $product;
    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
	/**
	 * VIN CODE
	 */
	$vin = get_post_meta( $product->get_id(), '_car_vincode', true );
	$vin = (!empty($vin)) ? '<span class="car-info-vin">(' . $vin . ')</span>' : '';
    ?>
    <!-- Header -->
    <div class="car-info-header">

        <!-- Header > Title -->
        <a href="<?= $link ?>" class="car-info-name">
            <?= get_the_title() ?> <?= $vin ?>
        </a>
        <!-- End Header > Title -->

    <?php
}

/**
 * Loop Products
 * @woocommerce_shop_loop_item_title_close
 * @woocommerce_shop_loop_item_info_close_tag
 */
add_action('woocommerce_shop_loop_item_title_close', 'woocommerce_shop_loop_item_title_close_tag', 10);
function woocommerce_shop_loop_item_title_close_tag() {
    global $product;
    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
    ?>
    </div>
    <!-- End Header -->

    <?php
}

/**
 * Loop Products
 * @woocommerce_after_shop_loop_item
 * @woocommerce_shop_loop_item_info_close_tag
 */
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_btn_group', 15);
function woocommerce_template_loop_btn_group() {

	/**
	 * ID Curren Category
	 * @get_queried_object
	 */
	$vedanta_template = woocommerce_template_current_category();

	if( 'template_instock' == $vedanta_template ) :

		wc_get_template( 'loop/btns.php' );

    else:

	    wc_get_template( 'loop/btns-outstock.php' );

	endif;
}

/**
 * Loop Products
 * @woocommerce_shop_loop_item_chars
 * @woocommerce_shop_loop_item_chars_content
 */
add_action('woocommerce_shop_loop_item_chars', 'woocommerce_shop_loop_item_chars_content', 10);
function woocommerce_shop_loop_item_chars_content() {

    wc_get_template( 'loop/char.php' );
}

/**
 * Loop Products
 * @woocommerce_archive_contacts
 * @woocommerce_archive_contacts_feedback
 */
add_action('woocommerce_archive_contacts', 'woocommerce_archive_contacts_feedback', 10);
function woocommerce_archive_contacts_feedback() {
	/*
     * Home: Feedback
     */
	get_template_part('template-parts/pages/home/_home', 'feedback', ['page_id' => 2]);
}

/**
 * Loop Products
 * @woocommerce_archive_contacts
 * @woocommerce_archive_contacts_contacts
 */
add_action('woocommerce_archive_contacts', 'woocommerce_archive_contacts_contacts', 15);
function woocommerce_archive_contacts_contacts() {
	/*
     * Home: Contacts
    */
	get_template_part('template-parts/pages/home/_home', 'contacts', ['page_id' => 2]);
}
