<?php
defined( 'ABSPATH' ) || exit;

/**
 * Customizer additions.
 * @require
 * customizer.php
 */
require get_template_directory() . '/includes/_customizer.php';

/**
 * Settings Theme.
 * @require
 * theme-settings.php
 */
require get_template_directory() . '/includes/_theme-settings.php';

/**
 * Widgets
 * @require
 * widget-areas.php
 */
require get_template_directory() . '/includes/_widget-areas.php';

/**
 * Js and Css.
 * @require
 * script-style.php
 */
require get_template_directory() . '/includes/_script-style.php';

/**
 * Implement the Custom Header feature.
 * @require
 * custom-header.php
 */
require get_template_directory() . '/includes/_custom-header.php';

/**
 * Navigations.
 * @require
 * navigations.php
 */
require get_template_directory() . '/includes/_navigations.php';

/**
 * Helpers functions.
 * @require
 * helpers.php
 */
require get_template_directory() . '/includes/_helpers.php';

/**
 * Shortcodes
 * @require
 * shortcodes.php
 */
require get_template_directory() . '/includes/_shortcodes.php';

/**
 * Implement the Custom Footer feature.
 * @require
 * custom-footer.php
 */
require get_template_directory() . '/includes/_custom-footer.php';

/**
 * Load WooCommerce compatibility file.
 * @require
 * woocommerce.php
 */
if ( class_exists( 'WooCommerce' ) ) :
    require get_template_directory() . '/includes/woocommerce/_woocommerce.php';
endif;

/**
 * Ajax
 * @require
 * ajax.php
 */
require get_template_directory() . '/includes/_ajax.php';

/**
 * Home Filter
 * @require
 * filter-home.php
 */
require get_template_directory() . '/includes/_filter-home.php';

/**
 * Taxonomy
 * @require
 * taxonomy.php
 */
require get_template_directory() . '/includes/_taxonomy.php';

/**
 * Calculator functions.
 * @require
 * functions.php
 */
require get_template_directory() . '/calculator/_functions.php';

/**
 * Cron
 * @require
 * cron.php
 */
require get_template_directory() . '/includes/_cron.php';

/**
 * ACF
 * @require
 * acf.php
 */
require get_template_directory() . '/includes/_acf.php';

/**
 * API
 * @require
 * api.php
 */
require get_template_directory() . '/includes/woocommerce/_api.php';