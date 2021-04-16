<?php
defined( 'ABSPATH' ) || exit;

/**
  * Add a form field in the new category page
  * @since 1.0.0
  * @add_action
  * @brands_add_form_fields
  * @vedanta_brands_add_category_image
  */
add_action( 'brands_add_form_fields', 'vedanta_brands_add_category_image' );
function vedanta_brands_add_category_image( $taxonomy ) { ?>
    <div class="form-field term-group">
        <label for="brands-title"><?php _e('Форматированный заголовок', 'vedanta'); ?></label>
        <input type="text" id="brands-title" name="brands-title">
        <div id="brands-title-wrapper"></div>
    </div>
    <div class="form-field term-group">
        <label for="brands-excerpt"><?php _e('Краткое опписание', 'vedanta'); ?></label>
        <textarea name="brands-excerpt" id="brands-excerpt" rows="5" cols="40"></textarea>
        <div id="brands-excerpt-wrapper"></div>
    </div>
    <div class="form-field term-group">
        <label for="category-image-id"><?php _e('Logo Brand', 'vedanta'); ?></label>
        <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
        <div id="category-image-wrapper"></div>
        <p>
            <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Logo', 'vedanta' ); ?>" />
            <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Logo', 'vedanta' ); ?>" />
        </p>
    </div>
    <?php
}

/**
 * Save the form field
 * @since 1.0.0
 * @add_action
 * @brands_category
 * @vedanta_brands_save_category_image
*/
add_action( 'brands_category', 'vedanta_brands_save_category_image' );
function vedanta_brands_save_category_image ( $term_id, $tt_id ) {

	/**
	 * Image
	 */
    if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ) :
        $image = $_POST['category-image-id'];
        add_term_meta( $term_id, 'category-image-id', $image, true );
    endif;

	/**
	 * Title Formated
	 */
	if( isset( $_POST['brands-title'] ) && '' !== $_POST['brands-title'] ) :
		$title = $_POST['brands-title'];
		add_term_meta( $term_id, 'brands-title', $title, true );
	endif;

	/**
	 * Excerpt
	 */
	if( isset( $_POST['brands-excerpt'] ) && '' !== $_POST['brands-excerpt'] ) :
		$excerpt = $_POST['brands-excerpt'];
		add_term_meta( $term_id, 'brands-excerpt', $excerpt, true );
	endif;
}

/**
 * Edit the form field
 * @since 1.0.0
 * @add_action
 * @brands_edit_form_fields
 * @vedanta_brands_update_category_image
*/
add_action( 'brands_edit_form_fields', 'vedanta_brands_update_category_image' );
function vedanta_brands_update_category_image( $term ) { ?>

    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="category-image-id"><?php _e( 'Logo', 'vedanta' ); ?></label>
        </th>
        <td>
            <?php $image_id = get_term_meta ( $term->term_id, 'category-image-id', true ); ?>
            <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
            <div id="category-image-wrapper">
                <?php if ( $image_id ) { ?>
                    <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
                <?php } ?>
            </div>
            <p>
                <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Logo', 'vedanta' ); ?>" />
                <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Logo', 'vedanta' ); ?>" />
            </p>
        </td>
    </tr>

    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="brands-title"><?php _e( 'Форматированный заголовок', 'vedanta' ); ?></label>
        </th>
        <td>
			<?php $title = get_term_meta ( $term->term_id, 'brands-title', true ); ?>
            <input name="brands-title" id="brands-title" type="text" value="<?= $title ?>">
        </td>
    </tr>

    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="brands-excerpt"><?php _e( 'Краткое опписание', 'vedanta' ); ?></label>
        </th>
        <td>
			<?php $excerpt = get_term_meta ( $term->term_id, 'brands-excerpt', true ); ?>
            <textarea name="brands-excerpt" id="brands-excerpt" rows="5" cols="40"><?= $excerpt ?></textarea>
        </td>
    </tr>

    <?php
}

/**
 * Update the form field value
 * @since 1.0.0
 * @add_action
 * @edited_brands
 * @vedanta_brands_updated_category_image
 */
add_action( 'edited_brands', 'vedanta_brands_updated_category_image' );
function vedanta_brands_updated_category_image ( $term_id ) {

	/**
	 * Image
	 */
    if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ) :
        $image = $_POST['category-image-id'];
        update_term_meta ( $term_id, 'category-image-id', $image );
    else:
        update_term_meta ( $term_id, 'category-image-id', '' );
    endif;

	/**
	 * Title
	 */
	if( isset( $_POST['brands-title'] ) && '' !== $_POST['brands-title'] ) :
		$title = $_POST['brands-title'];
		update_term_meta ( $term_id, 'brands-title', $title );
	else:
		update_term_meta ( $term_id, 'brands-title', '' );
	endif;

	/**
	 * Excerpt
	 */
	if( isset( $_POST['brands-excerpt'] ) && '' !== $_POST['brands-excerpt'] ) :
		$excerpt = $_POST['brands-excerpt'];
		update_term_meta ( $term_id, 'brands-excerpt', $excerpt );
	else:
		update_term_meta ( $term_id, 'brands-excerpt', '' );
	endif;

}

/**
 * Add script
 * @since 1.0.0
 * @add_action
 * @admin_footer
 * @vedanta_brands_add_script
 */
add_action( 'admin_footer', 'vedanta_brands_add_script' );
function vedanta_brands_add_script() { ?>
    <script>
        jQuery(document).ready( function($) {
            function ct_media_upload(button_class) {
                var _custom_media = true,
                    _orig_send_attachment = wp.media.editor.send.attachment;
                $('body').on('click', button_class, function(e) {
                    var button_id = '#'+$(this).attr('id');
                    var send_attachment_bkp = wp.media.editor.send.attachment;
                    var button = $(button_id);
                    _custom_media = true;
                    wp.media.editor.send.attachment = function(props, attachment){
                        if ( _custom_media ) {
                            $('#category-image-id').val(attachment.id);
                            $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                            $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
                        } else {
                            return _orig_send_attachment.apply( button_id, [props, attachment] );
                        }
                    }
                    wp.media.editor.open(button);
                    return false;
                });
            }
            ct_media_upload('.ct_tax_media_button.button');
            $('body').on('click','.ct_tax_media_remove',function(){
                $('#category-image-id').val('');
                $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
            });
            // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
            $(document).ajaxComplete(function(event, xhr, settings) {
                var queryStringArr = settings.data.split('&');
                if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
                    var xml = xhr.responseXML;
                    $response = $(xml).find('term_id').text();
                    if($response!=""){
                        // Clear the thumb image
                        $('#category-image-wrapper').html('');
                    }
                }
            });
        });
    </script>
<?php }

/**
 * Add Table Column Image
 * @manage_edit-brands_columns
 * @add_filter
 * @manage_edit-brands_columns
 * @vedanta_brands_custom_column_header
 */
add_filter( "manage_edit-brands_columns", 'vedanta_brands_custom_column_header', 10);
function vedanta_brands_custom_column_header( $columns ){
    $columns['image'] = 'Logo Brand';
    return $columns;
}

/**
 * Add Table Column Image
 * @manage_brands_custom_column
 * @add_action
 * @manage_brands_custom_column
 * @vedanta_brands_custom_column_content
 */
add_action( "manage_brands_custom_column", 'vedanta_brands_custom_column_content', 10, 3);
function vedanta_brands_custom_column_content( $value, $column_name, $tax_id ){

    if($column_name == 'image') :
        $image_id = get_term_meta ( $tax_id, 'category-image-id', true );
        $value = wp_get_attachment_image ( $image_id, [60,60] );
    endif;

    return $value;
}