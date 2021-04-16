<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register jQuery
 * @add_action
 * @wp_enqueue_scripts
 * @vedanta_jquery
 */
add_action( 'wp_enqueue_scripts', 'vedanta_jquery' );
function vedanta_jquery() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/min/jquery.min.js', false, '3.2.1', false );
	wp_enqueue_script( 'jquery' );
}
/**
 * CSS files
 * @add_action
 * @wp_enqueue_scripts
 * @vedanta_styles
 */
add_action( 'wp_enqueue_scripts', 'vedanta_styles' );
function vedanta_styles() {

	/**
	 * Dequeue Style
	 * @wp_dequeue_style
	 */
	wp_dequeue_style('font-awesome');
	wp_dequeue_style('wc-block-vendors-style');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('berocket_aapf_widget-style');
	wp_dequeue_style('woocommerce-layout');
	wp_dequeue_style('woocommerce-smallscreen');
	wp_dequeue_style('woocommerce-general');
	wp_dequeue_style('woocommerce-inline-inline');

	/**
	 * Enqueue Style
	 * @wp_enqueue_style
	 */
    wp_enqueue_style( 'swiper-vedanta', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', [], '6.3.5' );
	wp_enqueue_style( 'fancybox-vedanta', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', [], '3.0.0' );
    wp_enqueue_style( 'bundle-vedanta', get_template_directory_uri() . '/assets/css/bundle.css', [], '1.0.0' );
    wp_enqueue_style( 'customize-vedanta', get_template_directory_uri() . '/assets/css/customize.css', [], '1.0.0' );

}
/**
 * JS files
 * @add_action
 * @wp_enqueue_scripts
 * @vedanta_scripts
 */
add_action( 'wp_enqueue_scripts', 'vedanta_scripts' );
function vedanta_scripts() {

	/**
	 * Enqueue Script
	 * @wp_enqueue_script
	 */
    wp_enqueue_script( 'swiper-vedanta', get_template_directory_uri() . '/assets/js/min/swiper-bundle.min.js', ['jquery'], '6.3.5', true );
    wp_enqueue_script( 'bundle-vedanta', get_template_directory_uri() . '/assets/js/min/bundle.js', ['jquery'], '1.0.0', true );
    wp_enqueue_script( 'customize-vedanta', get_template_directory_uri() . '/assets/js/customize.js', ['bundle-vedanta'], '1.0.0', true );
    wp_enqueue_script( 'googleapis-vedanta', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCSqQeiH6f0iSnHMZ0-WMAcZKkS3dKjEqQ&callback=initMap', ['jquery'], null, true );

	/**
	 * Enqueue Script
	 * @wp_register_script
	 */
	wp_register_script('blockui-vedanta', get_template_directory_uri() . '/assets/js/src/vendor/jquery.blockUI.js', ['jquery'], '2.7', true);

	/**
	 * Filter Home
	 */
	wp_register_script('filter-home-vedanta', get_template_directory_uri() . '/assets/js/filter-home.js', ['jquery'], '1.0.0', true);
    if( is_front_page() || is_home() ) :
	    wp_enqueue_script('blockui-vedanta');
	    wp_enqueue_script('filter-home-vedanta');
	endif;

	/**
	 * Calculator
	 */
	wp_register_script('calculator-calculate-vedanta', get_template_directory_uri() . '/calculator/js/calculate.js', ['jquery'], '1.0.1', true);
	wp_register_script('calculator-calculate-korea-vedanta', get_template_directory_uri() . '/calculator/js/calculate-korean.js', ['jquery'], '1.0.1', true);
	wp_register_script('calculator-calculate-filesaver', get_template_directory_uri() . '/calculator/js/FileSaver.js', ['jquery'], '1.0.0', true);
	wp_register_script('calculator-calculate-jspdf', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js', ['jquery'], '1.0.0', true);
	wp_register_script('calculator-calculate-html2canvas', get_template_directory_uri() . '/calculator/js/html2canvas.min.js', ['jquery'], '1.0.0', true);

	wp_register_script('calculator-calculate-single-vedanta', get_template_directory_uri() . '/calculator/js/calculate-single-product.js', ['jquery'], '1.0.1', true);

	if ( is_product() ) :
		wp_enqueue_script('blockui-vedanta');
		wp_enqueue_script('calculator-calculate-single-vedanta');
	endif;

	if ( is_page_template('templates/template-calculator.php') ) :
		wp_enqueue_script('blockui-vedanta');
		wp_enqueue_script('calculator-calculate-filesaver');
		wp_enqueue_script('calculator-calculate-html2canvas');
		wp_enqueue_script('calculator-calculate-vedanta');
	endif;

	if ( is_page_template('templates/template-calculator-korea.php') ) :
		wp_enqueue_script('blockui-vedanta');
		wp_enqueue_script('calculator-calculate-jspdf');
		wp_enqueue_script('calculator-calculate-filesaver');
		wp_enqueue_script('calculator-calculate-korea-vedanta');
	endif;

}

/**
 * Remove CSS
 * @wp_enqueue_scripts
 * @vedanta_dequeue_style
 * @wp_dequeue_style
 * @wp_dequeue_script
 */
add_action( 'wp_enqueue_scripts', 'vedanta_dequeue_style' );
function vedanta_dequeue_style() {

	wp_dequeue_style( 'wordfenceAJAXcss' );



    wp_dequeue_style( 'wp-block-library' );
    /**
     * WP Multilang
     */
    wp_dequeue_style( 'wpm-main' );
    /*
     * Otcher
     */
    wp_dequeue_style( 'jquery-selectBox' );
    wp_dequeue_style( 'mfcf7_zl_button_style' );
    /*
     * Contact Form
     */
    wp_dequeue_style( 'contact-form-7' );
	/*
	 * JS
	 */
    wp_deregister_script( 'wp-embed' );
    wp_dequeue_script( 'wp-embed-js' );
	wp_dequeue_script( 'wc_price_slider' );
	wp_dequeue_script( 'wc-chosen' );
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
	wp_dequeue_script( 'jquery-blockui' );
	wp_dequeue_script( 'jquery-placeholder' );
	wp_dequeue_script( 'fancybox' );
	wp_dequeue_script( 'jqueryui' );
	wp_dequeue_script( 'flexslider' );
	wp_dequeue_script( 'zoom' );
	wp_dequeue_script( 'photoswipe' );
    wp_dequeue_style( 'dashicons' );
    wp_dequeue_style( 'tawcvs-frontend' );
    wp_dequeue_style( 'dashicons' );
}


/**
 * Remove CSS
 * @add_action
 * @wp_print_styles
 * @wp_style_add_data
 */
if ( class_exists( 'WooCommerce' ) ) :
	add_action( 'wp_print_styles', function(){
		wp_style_add_data( 'woocommerce-inline', 'after', '' );
	});
endif;

