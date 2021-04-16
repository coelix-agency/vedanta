<?php
defined( 'ABSPATH' ) || exit;

/**
 *
 * This file displays everything that is in the product.
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 * Single Product
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

/**
 * Single Product
 * @woocommerce_single_product_otcher
 * @woocommerce_output_parts_contacts
 */
add_action('woocommerce_single_product_otcher', 'woocommerce_output_parts_contacts', 30);
function woocommerce_output_parts_contacts() {
	/*
	 * Home: Contacts
	 */
	get_template_part('template-parts/pages/home/_home', 'contacts', ['page_id' => 2]);
}

/**
 * Single Product
 * @woocommerce_single_product_otcher
 * @woocommerce_output_parts_feedback
 */
add_action('woocommerce_single_product_otcher', 'woocommerce_output_parts_feedback', 25);
function woocommerce_output_parts_feedback() {
	/*
	 * Home: Feedback
	 */
	get_template_part('template-parts/pages/home/_home', 'feedback', ['page_id' => 2]);
}

/**
 * Single Product
 * @woocommerce_single_product_otcher
 * @woocommerce_output_parts_faq
 */
add_action('woocommerce_single_product_otcher', 'woocommerce_output_parts_faq', 20);
function woocommerce_output_parts_faq() {
	/*
	 * Home: Faq
	 */
	get_template_part('template-parts/pages/home/_home', 'faq', ['page_id' => 2]);
}

/**
 * Single Product: Related Products
 * @woocommerce_single_product_otcher
 * @woocommerce_after_main_content_related_products
 */
add_action('woocommerce_single_product_otcher', 'woocommerce_output_related_products', 10);

/**
 * Single Product: Upseil Products
 * @woocommerce_single_product_otcher
 * @woocommerce_upsell_display
 */
add_action('woocommerce_single_product_otcher', 'woocommerce_upsell_display', 15);

/**
 * Single Product
 * @woocommerce_before_single_product_header
 * @woocommerce_before_single_product_header_open
 */
add_action('woocommerce_before_single_product_header', 'woocommerce_before_single_product_header_open', 5);
function woocommerce_before_single_product_header_open() {
    ?>
    <!-- header -->
    <div class="cart-header">
    <!-- container -->
    <div class="container">
    <?php
}

/**
 * Single Product
 * @woocommerce_before_single_product_header
 * @woocommerce_before_single_product_header_close
 */
add_action('woocommerce_before_single_product_header', 'woocommerce_before_single_product_header_close', 30);
function woocommerce_before_single_product_header_close() {
    ?>
    </div>
    <!-- end container -->
    </div>
    <!-- end header -->
    <?php
}

/**
 * Single Product
 * @woocommerce_before_single_product_header
 * @woocommerce_shop_loop_item_chars_content
 */
add_action('woocommerce_before_single_product_header', 'woocommerce_before_single_product_header_title', 10);
function woocommerce_before_single_product_header_title() {

    wc_get_template( 'single-product/title.php' );
}

/**
 * Single Product
 * @woocommerce_before_single_product_header
 * @woocommerce_before_single_product_header_price
 */
add_action('woocommerce_before_single_product_header', 'woocommerce_before_single_product_header_price', 20);
function woocommerce_before_single_product_header_price() {

    wc_get_template( 'single-product/price.php' );

}

/**
 * Single Product
 * @woocommerce_single_product_summary
 * @woocommerce_show_product_images
 */
add_action('woocommerce_single_product_summary', 'woocommerce_show_product_images', 15);
function woocommerce_show_product_images() {

    wc_get_template( 'single-product/product-image.php' );

}

/**
 * Single Product
 * @woocommerce_before_single_content_open
 * @woocommerce_before_single_content_open_tag
 */
add_action('woocommerce_before_single_content_open', 'woocommerce_before_single_content_open_tag', 10);
function woocommerce_before_single_content_open_tag() {

    ?>
    <!-- container -->
    <div class="container">

    <!-- container > card -->
    <div class="cart-main">
    <?php

}

/**
 * Single Product
 * @woocommerce_before_single_content_close
 * @woocommerce_before_single_content_close_tag
 */
add_action('woocommerce_before_single_content_close', 'woocommerce_before_single_content_close_tag', 10);
function woocommerce_before_single_content_close_tag() {

    ?>
    </div>
    <!-- end container > card -->

    <?php

	/**
	 * Get Template Ctagory
	 * @woocommerce_template_current_category()
	 */
	$vedanta_template = woocommerce_template_current_category();

	if( 'template_outstock' == $vedanta_template ) :

		wc_get_template( 'single-product/pay.php' );

	endif;

    ?>

    </div>
    <!-- end container -->
    <?php

}

/**
 * Single Product
 * @woocommerce_stock_single_product
 * @woocommerce_stock_single_product_template
 */
add_action('woocommerce_stock_single_product', 'woocommerce_stock_single_product_template', 10);
function woocommerce_stock_single_product_template() {

    wc_get_template( 'single-product/stock.php' );

}

/**
 * Single Product
 * @woocommerce_single_product_aside
 * @woocommerce_single_product_aside_char
 */
add_action('woocommerce_single_product_aside', 'woocommerce_single_product_aside_char', 10);
function woocommerce_single_product_aside_char() {

	/**
	 * Get Template Ctagory
     * @woocommerce_template_current_category()
	 */
    $vedanta_template = woocommerce_template_current_category();

    if( 'template_outstock' == $vedanta_template ) :

	    wc_get_template( 'single-product/passport.php' );

    else:

        wc_get_template( 'single-product/characteristics.php' );

    endif;

}

/**
 * Single Product
 * @woocommerce_single_product_aside
 * @woocommerce_single_product_aside_price
 */
add_action('woocommerce_single_product_aside', 'woocommerce_single_product_aside_price', 20);
function woocommerce_single_product_aside_price() {

	/**
	 * Get Template Ctagory
	 * @woocommerce_template_current_category()
	 */
	$vedanta_template = woocommerce_template_current_category();

	if( 'template_outstock' == $vedanta_template ) :

		wc_get_template( 'single-product/cost-outstock.php' );

	else:

		wc_get_template( 'single-product/cost.php' );

	endif;

}

/**
 * Single Product
 * @woocommerce_after_single_product_summary
 * @woocommerce_output_product_characteristics
 */
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_characteristics', 10);
function woocommerce_output_product_characteristics() {

	/**
	 * Get Template Ctagory
	 * @woocommerce_template_current_category()
	 */
	$vedanta_template = woocommerce_template_current_category();

	if( 'template_outstock' == $vedanta_template ) :

		wc_get_template( 'single-product/characteristics-outstock.php' );

	endif;

}

/**
 * Single Product
 * @woocommerce_after_single_product_summary
 * @woocommerce_output_product_complectation
 */
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_complectation', 11);
function woocommerce_output_product_complectation() {

    wc_get_template( 'single-product/complectation.php' );

}

/**
 * Single Product
 * @woocommerce_after_single_product_summary
 * @woocommerce_output_product_description
 */
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_description', 12);
function woocommerce_output_product_description() {

    wc_get_template( 'single-product/description.php' );

}

/**
 * Related Product
 * @woocommerce_output_related_products_args
 * @vedanta_related_products_count_args
 */
add_filter( 'woocommerce_output_related_products_args', 'vedanta_related_products_count_args' );
function vedanta_related_products_count_args( $args ) {
	$args['posts_per_page'] = 6;
	return $args;
}