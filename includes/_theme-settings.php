<?php
defined( 'ABSPATH' ) || exit;
/**
* Theme Settings
*/
if ( ! function_exists( 'vedanta_setup' ) ) :

    function vedanta_setup() {

	    /**
	     * @add_theme_support
	     */
        add_theme_support( 'post-thumbnails' );

        /**
         * Remove Thumbnails
         */
        remove_image_size( 'thumbnail-100x100' );
        remove_image_size( 'thumbnail-150x150' );
        remove_image_size( 'thumbnail-300x300' );

        /**
         * REMOVE EMOJI ICONS
         */
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        /**
         * Enable shortcodes in text widgets
         */
        add_filter('widget_text','do_shortcode');

        /**
         * Enable Except Text All Page
         */
        add_post_type_support( 'page', array('excerpt') );

    }
    vedanta_setup();

endif;

/**
 * Loads the child theme textdomain.
 */
function vedanta_child_theme_setup() {
	load_child_theme_textdomain( 'vedanta', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'vedanta_child_theme_setup' );

/**
 * SVG Upload
 * @add_filter
 * @upload_mimes
 * @vedanta_myme_types
 */
add_filter('upload_mimes', 'vedanta_myme_types', 1, 1);
function vedanta_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; // поддержка SVG
    return $mime_types;
}
/**
 * ACF Google API KEY
 * @add_action
 * @acf/init
 * @vedanta_acf_init
 */
add_action('acf/init', 'vedanta_acf_init');
function vedanta_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCSqQeiH6f0iSnHMZ0-WMAcZKkS3dKjEqQ');
}

/**
 * Page 404
 * @add_action
 * @template_redirect
 * @vedanta_404_template_redirect
 *
*/
//add_action( 'template_redirect', 'vedanta_404_template_redirect' );
//function vedanta_404_template_redirect(){
//    if( is_404() && $_SERVER["REQUEST_URI"] != '/404/' || 'draft' == get_post_status() ) {
//        wp_redirect( home_url( '/404/' ) );
//        exit();
//    }
//}

/**
 * Filter to change breadcrumb args.
 *
 * @param  array $args Breadcrumb args.
 * @return array $args.
 */
add_filter( 'rank_math/frontend/breadcrumb/args', function( $args ) {

    $args = array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcrumb-list">',
        'wrap_after'  => '',
        'before'      => '',
        'after'       => ''
    );
    return $args;
});
/**
 * Filter to change breadcrumb html.
 *
 * @param  html  $html Breadcrumb html.
 * @param  array $crumbs Breadcrumb items
 * @param  class $class Breadcrumb class
 * @return html  $html.
 */
add_filter( 'rank_math/frontend/breadcrumb/html', function( $html, $crumbs, $class ) {
    $html = str_replace('<span class="separator"> - </span>', ' > ', $html);
    return $html;
}, 10, 3);

/**
 * Change the Home URL in breadcrumbs according to the current language in Polylang
 *
 * @param array       $crumbs The crumbs array.
 * @param Breadcrumbs $this   Current breadcrumb object.
 */
add_filter( 'rank_math/frontend/breadcrumb/items', function( $crumbs, $class ) {

    $currentLang = wpm_get_language();
    $home_link = esc_url(wpm_translate_url(home_url(), $currentLang));
    $crumbs[0][1] = $home_link;

    if($currentLang == 'ru') $crumbs[0][0] = 'Главная';
    if($currentLang == 'ua') $crumbs[0][0] = 'Головна';
    if($currentLang == 'en') $crumbs[0][0] = 'Home';

    return $crumbs;
}, 10, 2);


/**
 * Template Directory
 * @archive_template
 * @add_filter
 * @vedanta_archive_template
 */
add_filter( 'archive_template', 'vedanta_archive_template' ) ;
function vedanta_archive_template( $template ) {
    $template = TEMPLATEPATH . '/template-parts/archive.php';
    return $template;
}

/**
 * Template Directory
 * @single_template
 * @add_filter
 * @vedanta_single_template
 */
add_filter('single_template', 'vedanta_single_template' );
function vedanta_single_template($template){
    $template = TEMPLATEPATH . '/template-parts/single.php';
    return $template;

}

/**
 * Template Directory
 * @404_template
 * @add_filter
 * @vedanta_single_template
 */
add_filter('404_template', 'vedanta_404_template' );
function vedanta_404_template($template){
	$template = TEMPLATEPATH . '/template-parts/404.php';
	return $template;

}
/**
 * ADMIN PANEL: Hide Menu
 * @add_action
 * @admin_menu
 * @vedanta_remove_admin_menu_links
 */
add_action('admin_menu', 'vedanta_remove_admin_menu_links', 999);
function vedanta_remove_admin_menu_links() {
    $user = wp_get_current_user();

    if (
    	'remstroy-od@yandex.ru' <> $user->user_email &&
	    'zoduaks@gmail.com' <> $user->user_email &&
	    'vedantacustoms@gmail.com' <> $user->user_email ) {
        remove_menu_page('edit.php?post_type=acf-options-page');
        remove_menu_page('edit.php?post_type=acf-field-group');
        remove_menu_page('edit.php?post_type=shop_order');
        remove_menu_page('admin.php?page=wc-settings&tab=checkout&section=liqpay-webplus');
        remove_menu_page('wc-admin&path=/analytics/revenue');
        remove_menu_page('wpcf7');
        remove_menu_page('options-general.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('rank-math');
        remove_menu_page('smush');
        remove_menu_page('plugins.php');
        remove_menu_page('wpfront-user-role-editor-all-roles');
        remove_submenu_page('woocommerce', 'checkout_form_designer');
        remove_submenu_page('woocommerce', 'wt-woocommerce-related-products');
        remove_submenu_page('users.php', 'wpfront-user-role-editor-assign-roles');
        remove_submenu_page('edit.php?post_type=product', 'wt-woocommerce-related-products');

    }
}

/**
 * Disable Auto Update Plugins
 * @is_admin
 */
if( is_admin() ){

    remove_action( 'admin_init', '_maybe_update_core' );
    remove_action( 'admin_init', '_maybe_update_plugins' );
    remove_action( 'admin_init', '_maybe_update_themes' );
    remove_action( 'load-plugins.php', 'wp_update_plugins' );
    remove_action( 'load-themes.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_browser_'. md5( $_SERVER['HTTP_USER_AGENT'] ), '__return_true' );

}