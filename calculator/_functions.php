<?php
if ( ! defined('ABSPATH')) :
	exit();
endif;

/**
 * Calculator
 * @hooked
 */
add_action('wp_enqueue_scripts', 'vedanta_calculator_ajax_script');
function vedanta_calculator_ajax_script(){
	$script_data_array = array(
		'ajaxurl'                   => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script( 'blockui-vedanta', 'ajax_calculator', $script_data_array );
}

/**
 * Ajax
 * @init
 */
add_action('init', 'vedanta_calculator_ajax_init');
function vedanta_calculator_ajax_init(){

	/**
	 * Calculator
	 * @fancybox
	 */
	add_action('wp_ajax_calculator', 'vedanta_calculator');
	add_action('wp_ajax_nopriv_calculator', 'vedanta_calculator');

}

/**
 * vedanta_calculator
 * @func
 */
function vedanta_calculator(){

	$type   = sanitize_text_field($_POST['type']);
	$data   = $_POST['fields'];
	$output = null;
	$tpl    = null;

	if( 'CalculatorCustoms' == $type ) :
		$tpl = 'customs';
	endif;

	if( 'CalculatorKorea' == $type ) :
		$tpl = 'korea';
	endif;

	if( 'CalculatorSingle' == $type ) :
		$tpl = 'single';
	endif;

	ob_start();
	get_template_part('calculator/template/calculator', $tpl, $data);
	$output = ob_get_contents();
	ob_end_clean();

	echo $output;
	wp_die();
}

/**
 * vedanta_script_loader_calculator
 * @script_loader_tag
 */
add_filter( 'script_loader_tag', 'vedanta_script_loader_calculator', 10 ,2 );
function vedanta_script_loader_calculator( $tag, $handle ){
	if ( $handle == 'calculator-calculate-jspdf' ) {
		return str_replace( '<script', '<script integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"', $tag );
	}
	return $tag;
}