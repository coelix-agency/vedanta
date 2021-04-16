<?php
defined( 'ABSPATH' ) || exit;

/**
 * Add Field
 * @add_action
 * @product_cat_add_form_fields
 * @vedanta_taxonomy_cat_add_meta_field
 */
add_action('product_cat_add_form_fields', 'vedanta_taxonomy_cat_add_meta_field', 10, 2);
function vedanta_taxonomy_cat_add_meta_field() {
    ?>
    <div class="form-field">
        <label for="term_meta[wh_meta_title]"><?php _e('Title Formating', 'vedanta'); ?></label>
        <input type="text" name="term_meta[wh_meta_title]" id="term_meta[wh_meta_title]">
        <p class="description"><?php _e('Enter a Title Formating', 'vedanta'); ?></p>
    </div>
    <div class="form-field">
        <label for="term_meta[wh_meta_desc]"><?php _e('Title Description', 'vedanta'); ?></label>
        <textarea name="term_meta[wh_meta_desc]" id="term_meta[wh_meta_desc]"></textarea>
        <p class="description"><?php _e('Enter a Title Description', 'vedanta'); ?></p>
    </div>
    <?php
}

/**
 * Edit Field
 * @add_action
 * @product_cat_edit_form_fields
 * @vedanta_taxonomy_cat_edit_meta_field
 */
add_action('product_cat_edit_form_fields', 'vedanta_taxonomy_cat_edit_meta_field', 10, 2);
function vedanta_taxonomy_cat_edit_meta_field($term) {

    $term_id = $term->term_id;

    $term_meta = get_option("taxonomy_" . $term_id);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[wh_meta_title]"><?php _e('Title Formating', 'vedanta'); ?></label></th>
        <td>
            <input type="text" name="term_meta[wh_meta_title]" id="term_meta[wh_meta_title]" value="<?php echo esc_attr($term_meta['wh_meta_title']) ? esc_attr($term_meta['wh_meta_title']) : ''; ?>">
            <p class="description"><?php _e('Enter a Title Formating', 'vedanta'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[wh_meta_desc]"><?php _e('Title Description', 'vedanta'); ?></label></th>
        <td>
            <textarea name="term_meta[wh_meta_desc]" id="term_meta[wh_meta_desc]"><?php echo esc_attr($term_meta['wh_meta_desc']) ? esc_attr($term_meta['wh_meta_desc']) : ''; ?></textarea>
            <p class="description"><?php _e('Enter a Title Description', 'vedanta'); ?></p>
        </td>
    </tr>
    <?php
}

/**
 * Save Field
 * @add_action
 * @edited_product_cat
 * @create_product_cat
 * @vedanta_save_taxonomy_cat_meta
 */
add_action('edited_product_cat', 'vedanta_save_taxonomy_cat_meta', 10, 2);
add_action('create_product_cat', 'vedanta_save_taxonomy_cat_meta', 10, 2);
function vedanta_save_taxonomy_cat_meta($term_id) {
    if (isset($_POST['term_meta'])) {
        $term_meta = get_option("taxonomy_" . $term_id);
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        update_option("taxonomy_" . $term_id, add_magic_quotes($term_meta) );
    }
}