<?php
defined( 'ABSPATH' ) || exit;

/**
 * Filter Home
 * @hooked
 */
add_action('wp_enqueue_scripts', 'vedanta_ajax_filter_home_script');
function vedanta_ajax_filter_home_script(){
	$script_data_array = array(
		'ajaxurl'                   => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script( 'filter-home-vedanta', 'ajax_filter_home_object', $script_data_array );
}

/**
 * Ajax
 * @init
 */
add_action('init', 'vedanta_ajax_filter_home_init');
function vedanta_ajax_filter_home_init(){

	/**
	 * Action
	 * @add_action
	 */
	add_action('wp_ajax_filter_home', 'vedanta_filter_home');
	add_action('wp_ajax_nopriv_filter_home', 'vedanta_filter_home');

}

/**
 * @vedanta_filter_home
 */
function vedanta_filter_home() {

	$type       = $_POST['type'];
	$brands     = (array)$_POST['brands'];

	/**
	 * Data
	 */
	$data = [
		'message'       => 'Сохранено',
		'html'          => [
			'models'    => '',
			'price'     => [
				'min'   => 0,
				'max'   => 0
			],
		]
	];

	/**
	 * POST
	 */
	$brands = $_POST['brands'];
	$models = $_POST['models'];


	/**
	 * Brands
	 */
    if( 'brand' == $type) :
		$price = [];
		$tax_query = [
			'taxonomy' => 'brands', // Product attribute taxonomy: always start with 'pa_'
			'field'    => 'term_id', // Can be 'term_id', 'slug' or 'name'
			'terms'    => $brands,
		];
	    $item_brands = new WP_Query(
		    [
			    'posts_per_page' => -1,
			    'post_type'   => 'product',
			    'post_status' => 'publish',

			    'tax_query' => [
				    'relation' => 'OR',
				    $tax_query
			    ]
		    ]
	    );
	    if( $item_brands->have_posts() ) :
		    $data['html']['models'] = '<input type="checkbox" class="option-input checkbox allFilterChecked" id="model-0">';
		    $data['html']['models'] .= '<label for="model-0"><span></span>Все</label>';

		    $arr_model = [];
		    while ( $item_brands->have_posts() ) : $item_brands->the_post();

			    $id         = get_the_ID();
			    $_product   = wc_get_product( $id );
			    $term       = get_the_terms($id, 'pa_ru-model');
			    $key        = $term[0]->name;
			    $name       = $term[0]->name;
			    $term_id    = $term[0]->term_id;
			    $price[$_product->get_regular_price()] = $_product->get_regular_price();

			    if ( ! array_key_exists($key, $arr_model)) :

				    $arr_model[$key] = $key;
				    $data['html']['models'] .= '<input type="checkbox" class="option-input checkbox allFilterUnChecked" id="model-' . $term_id . '" name="models[]" data-id="' . $term_id . '" value="' . $term_id . '" data-type="model">';
				    $data['html']['models'] .= '<label for="model-' . $term_id . '"><span></span>' . $name . '</label>';

			    endif;

		    endwhile; wp_reset_postdata();

		    /**
		     *
		     */
		    $data['html']['price']['min'] = min($price);
		    $data['html']['price']['max'] = max($price);

	    endif;

	endif;

	/**
	 * Models
	 */
	if( 'model' == $type) :
		$price = [];
		$data['test'] = [];
		$tax_query = [];

		/**
		 * Brands
		 */
		if($brands) :
			$tax_query[] = [
				'taxonomy' => 'brands', // Product attribute taxonomy: always start with 'pa_'
				'field'    => 'term_id', // Can be 'term_id', 'slug' or 'name'
				'terms'    => $brands,
			];
		endif;

		/**
		 * Models
		 */
		$tax_query[] = [
			'taxonomy' => 'pa_ru-model', // Product attribute taxonomy: always start with 'pa_'
			'field'    => 'term_id', // Can be 'term_id', 'slug' or 'name'
			'terms'    => $models,
			'operator'  => 'IN',
		];

		$item_models = new WP_Query(
			[
				'posts_per_page'    => -1,
				'post_type'         => ['product', 'product_variation'],
				'post_status'       => 'publish',

				'tax_query' => [
					'relation' => 'OR',
					$tax_query
				]
			]
		);
		if( $item_models->have_posts() ) :

			while ( $item_models->have_posts() ) : $item_models->the_post();

				$id         = get_the_ID();
				$_product   = wc_get_product( $id );
				$price[$_product->get_regular_price()] = $_product->get_regular_price();
				$data['test'][] = $id;

			endwhile; wp_reset_postdata();

			/**
			 *
			 */
			$data['html']['price']['min'] = min($price);
			$data['html']['price']['max'] = max($price);

		endif;



	endif;

	/**
	 * json
	 */
	wp_send_json_success( $data );
	wp_die();

}
