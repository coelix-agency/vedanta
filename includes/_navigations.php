<?php
defined( 'ABSPATH' ) || exit;
/**
* Navigations
 * @register_nav_menus
*/

/**
 * Register our menu.
 */
register_nav_menus( array(
	'header-menu-top'       => esc_html__( 'Header: Верхнее меню', 'vedanta' ),
    'header-menu-bottom'    => esc_html__( 'Header: Нижнее меню', 'vedanta' ),
    'footer-menu-one'       => esc_html__( 'Footer: Меню компании', 'vedanta' ),
    'footer-menu-two'       => esc_html__( 'Footer: Меню карта сайта', 'vedanta' ),
));