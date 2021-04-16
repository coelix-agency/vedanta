<?php
defined( 'ABSPATH' ) || exit;

/**
 * Woocommerce Require Settings
 * @require
 */
require '_taxonomy.php';
if( is_admin() ) :
    require '_admin.php';
    require '_taxonomy-cat.php';
    require '_taxonomy-brands.php';
    require '_taxonomy-team.php';
endif;
require '_loop.php';
require '_single.php';

/**
 * WooCommerce setup function.
 *
 * @return void
 * @add_action
 * @after_setup_theme
 * @vedanta_woocommerce_setup
 */
add_action( 'after_setup_theme', 'vedanta_woocommerce_setup' );
function vedanta_woocommerce_setup() {
    add_theme_support(
        'woocommerce',
        []
    );
}


/**
 * @init
 * @vedanta_remove_custom_action_woocommerce
 */
add_action( 'init', 'vedanta_remove_custom_action_woocommerce' );
function vedanta_remove_custom_action_woocommerce(){

	remove_action( 'wp_head', 'wc_gallery_noscript' );
	remove_action( 'wp_footer', 'wc_no_js', 10 );

}

/**
 * Woocommerce
 * Order By
 * @woocommerce_catalog_orderby hooks
 * @vedanta_filter_order_by function
 * @add_filter
 * @woocommerce_catalog_orderby
 * @vedanta_filter_order_by
 */
add_filter( 'woocommerce_catalog_orderby', 'vedanta_filter_order_by' );
function vedanta_filter_order_by( $array ){

    $array = [
        'menu_order' => __( 'Default sorting', 'woocommerce' ),
        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
        'date'       => __( 'Sort by latest', 'woocommerce' ),
        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
    ];

    return $array;
}

/**
 * Woocommerce
 * ACF
 * Loop Products
 * Create Default Car Characteristics
 * @add_filter
 * @acf/load_field/name=set-loop-chars-attr
 * @vedanta_defaultchar_acf_load_field
 */
add_filter('acf/load_field/name=set-loop-chars-attr', 'vedanta_defaultchar_acf_load_field');
function vedanta_defaultchar_acf_load_field( $field ) {
    $field['choices'] = array();
    $field['choices'][0] = 'Выбрать';
    $attributes = wc_get_attribute_taxonomies();
    $i = 0;
    if($attributes) :
        foreach ($attributes as $attribute) :
            $i++;
            $field['choices'][$attribute->attribute_id] = $attribute->attribute_label;
        endforeach;
    endif;
    return $field;
}

/**---------------------------- Function Global  **/
/**
 * Loop Products
 * @woocommerce_template_current_category
 * @return string
 */
function woocommerce_template_current_category() {

	$vedanta_template   = null;
	$id_category        = 0;

	/**
	 * ID Curren Category
	 * @get_queried_object
	 */
	if ( is_product() ) :

		global $product;

		$terms          = get_the_terms( $product->ID, 'product_cat' );
		$id_category    = $terms[0]->term_id;

	else:

		$category       = get_queried_object();
		$id_category    = $category->term_id;

	endif;

	/**
	 * Template Category
	 * @get_term_meta
	 */
	$vedanta_template   = get_term_meta($id_category, 'vedanta_category_tpl', true);

	/**
	 * @return
	 * @string
	 */
	return $vedanta_template;
}


/**
 * Min and Max Price
 */
function woocommerce_get_price() {
	global $wpdb;

	$args = wc()->query->get_main_query();

	$tax_query  = isset( $args->tax_query->queries ) ? $args->tax_query->queries : [];
	$meta_query = isset( $args->query_vars['meta_query'] ) ? $args->query_vars['meta_query'] : [];

	foreach ( $meta_query + $tax_query as $key => $query ) {
		if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
			unset( $meta_query[ $key ] );
		}
	}

	$meta_query = new \WP_Meta_Query( $meta_query );
	$tax_query  = new \WP_Tax_Query( $tax_query );

	$meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
	$tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

	$sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
	$sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
	$sql .= " 	WHERE {$wpdb->posts}.post_type IN ('product')
			AND {$wpdb->posts}.post_status = 'publish'
			AND price_meta.meta_key IN ('_price')
			AND price_meta.meta_value > 0 ";
	$sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

	$search = \WC_Query::get_main_search_query_sql();
	if ( $search ) {
		$sql .= ' AND ' . $search;
	}

	$prices = $wpdb->get_row( $sql ); // WPCS: unprepared SQL ok.

	return [
		'min' => floor( $prices->min_price ),
		'max' => ceil( $prices->max_price )
	];
};

/**
 * Min and Max Year
 */
function woocommerce_get_year() {

	$prices = [
		'min_year' => 1978,
		'max_year' => date('Y'),
	];

	return [
		'min' => floor( $prices['min_year'] ),
		'max' => ceil( $prices['max_year'] )
	];
};

/**
 * Contact Form 7
 * Create Input Model Car
 * @wpcf7_init
 */
add_action( 'wpcf7_init', 'vedanta_custom_add_form_tag_transport' );
function vedanta_custom_add_form_tag_transport() {
	wpcf7_add_form_tag( 'transport', 'vedanta_custom_transport_form_tag_handler' );
}
function vedanta_custom_transport_form_tag_handler( $tag ) {
	$out    = null;
	$value  = null;

	/**
	 * Global Variable
	 */
	if( is_product() ) :

		global $product;
		$value = $product->get_title();

	else:

		global $wpcf7_product;
		if($wpcf7_product <> 0) :
			$_product = wc_get_product( $wpcf7_product );
			$value = $_product->get_title();
		endif;

	endif;

	$out .= '<input type="hidden" name="your-transport" value="' . $value . '" >';

	return $out;
}