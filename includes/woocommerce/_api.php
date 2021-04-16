<?php
defined( 'ABSPATH' ) || exit;

/**
 * Rest API
 */

add_filter( 'rest_pre_dispatch', 'vedanta_restapi_product_set_taxonomy', 10, 3 );
function vedanta_restapi_product_set_taxonomy( $result, $server, $request ){

	if( ( $request->get_method() == 'PUT' ) && ( strpos($request->get_route(), 'wc/v3/products') !== false ) ) :

		$body = json_decode($request->get_body());

		if( $body->type_operation == 'change_taxonomy' ) :

			foreach ( $body->taxonomy as $key => $value ) :

				wp_set_post_terms( $body->product->id, $value, $key );

			endforeach;

		endif;

	endif;

	return $result;
}