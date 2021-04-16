<?php
defined( 'ABSPATH' ) || exit;

/**
 * New Field From Pricing
 * @add_action
 * @woocommerce_product_options_pricing
 * @vedanta_admin_add_custom_fields
 */
add_action( 'woocommerce_product_options_pricing', 'vedanta_admin_add_custom_fields' );
function vedanta_admin_add_custom_fields() {
    global $product, $post;

    echo '<div class="options_group">';

//    woocommerce_wp_text_input( array(
//        'id'                => '_car_price',
//        'label'             => __( 'Стоимость авто в Корее', 'woocommerce' ),
//        'placeholder'       => 'Стоимость авто в Корее',
//        'style'             => 'text-transform: uppercase;',
//        'desc_tip'          => 'true',
//        'custom_attributes' => array(),
//        'description'       => '',
//    ) );

    woocommerce_wp_text_input( array(
        'id'                => '_car_vincode',
        'label'             => __( 'VIN код', 'woocommerce' ),
        'placeholder'       => 'VIN',
        'style'             => 'text-transform: uppercase;',
        'desc_tip'          => 'true',
        'custom_attributes' => array(),
        'description'       => '',
    ) );

    woocommerce_wp_checkbox( array(
        'id'            => '_car_key',
        'wrapper_class' => 'show_if_simple',
        'label'         => 'Ключи',
        'description'   => 'Да',
    ) );

    echo '</div>';
}

/**
 * Add Tab Complectation Product Edit
 * @add_filter
 * @woocommerce_product_data_tabs
 * @vedanta_admin_added_tabs
 */
add_filter( 'woocommerce_product_data_tabs', 'vedanta_admin_added_tabs', 10, 1 );
function vedanta_admin_added_tabs( $tabs ) {

    $tabs['complectation_panel'] = array(
        'label'    => __( 'Комплектация', 'vedanta' ),
        'target'   => 'complectation_panel_product_data',
        'class'    => array( 'hide_if_grouped' ),
        'priority' => 100,
    );

    return $tabs;
}

/**
 * Add Tab Complectation Product Content
 * @add_action
 * @woocommerce_product_data_panels
 * @vedanta_admin_added_tabs_panel
 */
add_action( 'woocommerce_product_data_panels', 'vedanta_admin_added_tabs_panel' );
function vedanta_admin_added_tabs_panel() {
	global $woocommerce, $post;
    $items = get_field( 'set-complectation', 'options' );
    ?>
    <div id="complectation_panel_product_data" class="panel woocommerce_options_panel hidden">

        <div class="options_group">
            <h2>
                <strong>
                    <?= __( 'Комплектация', 'vedanta' ) ?>
                </strong>
            </h2>
            <?php if( $items ) : ?>

            <div class="form-field">

                <?php foreach ($items as $key => $item) : ?>

                    <div class="options_group">

                        <p class="form-field">
                            <label>
                                <strong style="font-size: 22px"><?= $item['set-complectation-title'] ?></strong>
                            </label>
                        </p>

                        <?php if($item['set-complectation-list']) : ?>

                            <?php foreach ($item['set-complectation-list'] as $key_child => $item_child) : ?>

                                <?php
                                woocommerce_wp_checkbox( array(
                                    'id'            => '_complectation_' . $key . '_' . $key_child,
                                    //'value'         => get_post_meta( get_the_ID(), '_complectation_' . $key . '_' . $key_child, true ),
                                    'name'          => '_complectation[' . $key . '][' . $key_child . ']',
                                    'wrapper_class' => 'show_if_simple',
                                    'label'         => $item_child['set-complectation-list-name'],
                                    'description'   => '',
                                ) );
                                ?>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            </div>

            <?php else: ?>

                <div class="form-field custom_field_type">
                    <?= __( 'Комплектации не созданы! Создайте комплектации в разделе Настройки сайта.', 'vedanta' ) ?>
                </div>

            <?php endif; ?>
        </div>

    </div>
    <?php
}

/**
 * Save Fields
 * @add_action
 * @woocommerce_process_product_meta
 * @vedanta_admin_custom_fields_save
 */
add_action( 'woocommerce_process_product_meta', 'vedanta_admin_custom_fields_save', 10 );
function vedanta_admin_custom_fields_save( $post_id ) {

    /**
     * Complectation
     */
    $complectation = $_POST['_complectation'];

	if(isset($complectation)) :

	    $complects = get_field( 'set-complectation', 'options' );

		foreach ($complects as $key => $item) :

			if($item['set-complectation-list']) :

				foreach ($item['set-complectation-list'] as $key_child => $item_child) :

					$woocommerce_checkbox = isset( $_POST['_complectation'][$key][$key_child] ) ? 'yes' : null;
					update_post_meta( $post_id, '_complectation_' . $key . '_' . $key_child, $woocommerce_checkbox );

                endforeach;

            endif;

        endforeach;

	endif;

    /**
     * Prcie in Corea
     */
//	$woocommerce_field = $_POST['_car_price'];
//	update_post_meta( $post_id, '_car_price', esc_attr($woocommerce_field) );

    /**
     * VIN Code
     */
	$woocommerce_field = $_POST['_car_vincode'];
	update_post_meta( $post_id, '_car_vincode', esc_attr($woocommerce_field) );

    /**
     * Key
     */
    $woocommerce_field = isset($_POST['_car_key']) ? 'yes' : null;
	update_post_meta( $post_id, '_car_key', esc_attr($woocommerce_field) );

}

/**
 * Stock Status Options
 * @add_filter
 * @woocommerce_product_stock_status_options
 * @vedanta_filter_woocommerce_product_stock_status_options
 */
add_filter( 'woocommerce_product_stock_status_options', 'vedanta_filter_woocommerce_product_stock_status_options', 10, 1 );
function vedanta_filter_woocommerce_product_stock_status_options( $status ) {

    $status['outofstock'] = __( 'В пути', 'woocommerce' );
	$status['onbackorder'] = __( 'Ожидается', 'woocommerce' );

    return $status;
}

/**
 * Stock Status Availability text
 * @add_filter
 * @woocommerce_get_availability_text
 * @vedanta_filter_woocommerce_get_availability_text
 */
add_filter( 'woocommerce_get_availability_text', 'vedanta_filter_woocommerce_get_availability_text', 10, 2 );
function vedanta_filter_woocommerce_get_availability_text( $availability, $product ) {
    switch( $product->stock_status ) :
        case 'outofstock':
            $availability = __( 'В пути', 'woocommerce' );
            break;

	    case 'onbackorder':
		    $availability = __( 'Ожидается', 'woocommerce' );
		    break;

    endswitch;
    return $availability;
}

/**
 * Stock Status Change Name
 * @add_filter
 * @woocommerce_admin_stock_html
 * @vedanta_filter_function_name_change
 */
add_filter( 'woocommerce_admin_stock_html', 'vedanta_filter_function_name_change', 10, 2 );
function vedanta_filter_function_name_change( $stock_html, $object ){

    if ( $object->is_on_backorder() ) {
        $stock_html = '<mark class="onbackorder">' . __( 'Ожидается', 'woocommerce' ) . '</mark>';
    } elseif ( $object->is_in_stock() ) {
        $stock_html = '<mark class="instock">' . __( 'In stock', 'woocommerce' ) . '</mark>';
    } else {
        $stock_html = '<mark class="outofstock">' . __( 'В пути', 'woocommerce' ) . '</mark>';
    }

    return $stock_html;
}

/** ================= New Template By Category ==========================================  **/
/**
 * Change Template By Category
 * @template
 * @add_action
 * @product_cat_add_form_fields
 * @vedanta_taxonomy_add_new_meta_field
 */
add_action('product_cat_add_form_fields', 'vedanta_taxonomy_add_new_meta_field', 10, 1);
function vedanta_taxonomy_add_new_meta_field() {
	$templates = vedanta_taxonomy_list_category_template();
	if($templates) :
		?>
        <div class="form-field term-parent-wrap">
            <label for="vedanta_category_tpl">
				<?= __('Шаблон категории', 'vedanta') ?>
            </label>
            <select name="vedanta_meta_category_template" id="vedanta_category_tpl" class="postform">
				<?php $i=0; foreach ($templates as $key => $val) : ?>
                    <option class="level-<?= $i ?>" value="<?= $key ?>"><?= $val ?></option>
					<?php $i++; endforeach; ?>
            </select>
            <p><?= __('Выберите шаблон для этой категории', 'vedanta') ?></p>
        </div>
	<?php
	endif;
}

/**
 * Change Template By Category
 * @template
 * @add_action
 * @product_cat_edit_form_fields
 * @vedanta_taxonomy_edit_meta_field
 */
add_action('product_cat_edit_form_fields', 'vedanta_taxonomy_edit_meta_field', 10, 1);
function vedanta_taxonomy_edit_meta_field($term) {
	$templates              = vedanta_taxonomy_list_category_template();
	$term_id                = $term->term_id;
	$vedanta_meta_template  = get_term_meta($term_id, 'vedanta_category_tpl', true);
	if($templates) :
		?>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="vedanta_category_tpl">
					<?= __( 'Шаблон категории', 'vedanta' ) ?>
                </label>
            </th>
            <td>
                <select name="vedanta_category_tpl" id="vedanta_category_tpl" class="postform">
					<?php $i=0; foreach ($templates as $key => $val) : ?>
                        <option class="level-<?= $i ?>" value="<?= $key ?>" <?= ($key == $vedanta_meta_template) ? 'selected="selected"' : '' ?> >
							<?= $val ?>
                        </option>
						<?php $i++; endforeach; ?>
                </select>
                <p class="description"><?= __( 'Выберите шаблон для этой категории', 'vedanta' ) ?></p>
            </td>
        </tr>
	<?php
	endif;
}

/**
 * Change Template By Category
 * Save Func
 * @template
 * @add_action
 * @edited_product_cat
 * @create_product_cat
 * @vedanta_save_taxonomy_custom_meta
 */
add_action('edited_product_cat', 'vedanta_save_taxonomy_custom_meta', 10, 1);
add_action('create_product_cat', 'vedanta_save_taxonomy_custom_meta', 10, 1);
function vedanta_save_taxonomy_custom_meta($term_id) {
	$vedanta_meta_title = filter_input(INPUT_POST, 'vedanta_category_tpl');
	update_term_meta($term_id, 'vedanta_category_tpl', $vedanta_meta_title);
}

/**
 * Change Template By Category
 * @vedanta_taxonomy_list_category_template
 */
function vedanta_taxonomy_list_category_template() {
	$templates = [
		'template_default'    => __('Каталог: Default', 'vedanta'),
		'template_instock'    => __('Каталог: Авто в наличии', 'vedanta'),
		'template_outstock'   => __('Каталог: Авто под заказ', 'vedanta'),
	];
	return $templates;
}


/**
 * Use radio inputs instead of checkboxes for term checklists in specified taxonomies.
 *
 * @param   array   $args
 * @return  array
 */
add_filter( 'wp_terms_checklist_args', 'vedanta_term_radio_checklist' );
function vedanta_term_radio_checklist( $args ) {
	if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'type_cars' || $args['taxonomy'] === 'type_oil' || $args['taxonomy'] === 'brands' ) {
		if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
			if ( ! class_exists( 'Vedanta_Walker_Taxonomy_Radio_Checklist' ) ) {
				/**
				 * Custom walker for switching checkbox inputs to radio.
				 *
				 * @see Walker_Category_Checklist
				 */
				class Vedanta_Walker_Taxonomy_Radio_Checklist extends Walker_Category_Checklist {
					function walk( $elements, $max_depth, ...$args ) {
						$output = parent::walk( $elements, $max_depth, ...$args );
						$output = str_replace(
							array( 'type="checkbox"', "type='checkbox'" ),
							array( 'type="radio"', "type='radio'" ),
							$output
						);

						return $output;
					}
				}
			}

			$args['walker'] = new Vedanta_Walker_Taxonomy_Radio_Checklist;
		}
	}

	return $args;
}

/**
 * Add Exchange Rate to Admin Bar
 * @admin_bar_menu
 */
add_action('admin_bar_menu', 'add_items');
function add_items($admin_bar) {
    $value_exchange_rate = get_option('exchange_rate');
	$admin_bar->add_menu( array(
		'id'        => 'exchange-rate',
		'parent'    => 'top-secondary',
		'title'     => 'Курс: USD ' . round($value_exchange_rate, 2),
		'href'      => false,
		'meta'      => [
			'title' => __('Курс валют'),
		],
	) );
}

/**
 * Set All Atributes Default Add Product
 * @save_post
 */
add_action( 'save_post', 'vedanta_auto_add_product_attributes', 50, 3 );
function vedanta_auto_add_product_attributes( $post_id, $post, $update  ) {

	## --- Checking --- ##

	if ( $post->post_type != 'product') return; // Only products

	// Exit if it an autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	// Exit if it an update
	if( $update )
		return $post_id;

	// Exit if user is not allowed
	if ( ! current_user_can( 'edit_product', $post_id ) )
		return $post_id;

	## --- The Settings for your product attributes --- ##

	$visible   = ''; // can be: '' or '1'
	$variation = ''; // can be: '' or '1'

	## --- The code --- ##

	// Get all existing product attributes
	global $wpdb;
	$attributes = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}woocommerce_attribute_taxonomies ORDER BY attribute_name ASC;" );

	$position   = 0;  // Auto incremented position value starting at '0'
	$data       = array(); // initialising (empty array)

	// Loop through each exiting product attribute
	foreach( $attributes as $attribute ){
		// Get the correct taxonomy for product attributes
		$taxonomy = 'pa_'.$attribute->attribute_name;
		$attribute_id = $attribute->attribute_id;

		// Get all term Ids values for the current product attribute (array)
		$term_ids = get_terms(array('taxonomy' => $taxonomy, 'fields' => 'ids'));

		// Get an empty instance of the WC_Product_Attribute object
		$product_attribute = new WC_Product_Attribute();

		// Set the related data in the WC_Product_Attribute object
		$product_attribute->set_id( $attribute_id );
		$product_attribute->set_name( $taxonomy );
		//$product_attribute->set_options( $term_ids );
		$product_attribute->set_position( $position );
		$product_attribute->set_visible( $visible );
		$product_attribute->set_variation( $variation );

		// Add the product WC_Product_Attribute object in the data array
		$data[$taxonomy] = $product_attribute;

		$position++; // Incrementing position
	}
	// Get an instance of the WC_Product object
	$product = wc_get_product( $post_id );

	// Set the array of WC_Product_Attribute objects in the product
	$product->set_attributes( $data );

	$product->save(); // Save the product
}
