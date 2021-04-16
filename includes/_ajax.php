<?php
defined( 'ABSPATH' ) || exit;

/**
 * Ajax
 * Script
 * @include
 */
add_action( 'wp_enqueue_scripts', 'vedanta_ajax_fancybox_script' );
function vedanta_ajax_fancybox_script(){
	$script_data_array = array(
		'ajaxurl'           => admin_url( 'admin-ajax.php' )
	);
	wp_localize_script( 'bundle-vedanta', 'ajax_fancybox_object', $script_data_array );
}

/**
 * Ajax
 * @init
 * @vedanta_fancybox_ajax_init
 */
add_action('init', 'vedanta_fancybox_ajax_init');
function vedanta_fancybox_ajax_init(){

	/**
	 * Form
	 * @fancybox
	 */
	add_action('wp_ajax_fancybox_form', 'vedanta_fancybox_form');
	add_action('wp_ajax_nopriv_fancybox_form', 'vedanta_fancybox_form');

}

/**
 *
 */
function vedanta_fancybox_form(){

	$type       = sanitize_text_field($_POST['type']);
	$product    = absint($_POST['product']);
	$output = null;

	if( $product <> 0 ) :
		global $wpcf7_product;
		$wpcf7_product = $product;
	endif;

	ob_start();
	get_template_part('template-parts/forms/_form', $type, ['product' => $product]);
	$output = ob_get_contents();
	ob_end_clean();

	echo $output;
	wp_die();


}