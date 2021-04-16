<?php
defined( 'ABSPATH' ) || exit;

/**
 * Exchange Rate
 * @wp_schedule_event
 */
if( !wp_next_scheduled('vedanta_exchange_rate_update_hook') ) :
	wp_schedule_event( time(), 'hourly', 'vedanta_exchange_rate_update_hook' );
endif;
add_action( 'vedanta_exchange_rate_update_hook', 'vedanta_exchange_rate_update_func', 10, 3 );
function vedanta_exchange_rate_update_func(){

	/**
	 * Get Rate
	 */
	$link = file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD&json");
	$data = json_decode($link,true);
	$value = ($data) ? $data[0]['rate'] : 28;

	if ( !empty( ( get_option( 'exchange_rate' ) ) ) ) :
		update_option( 'exchange_rate', $value );
	else:
		add_option( 'exchange_rate', $value );
	endif;

}