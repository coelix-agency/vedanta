<?php
defined( 'ABSPATH' ) || exit;
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @add_action
 * @widgets_init
 * @vedanta_widgets_init
 */
add_action( 'widgets_init', 'vedanta_widgets_init' );
function vedanta_widgets_init() {

    /**
     * Footer: Меню о компании
     * @register_sidebar
     * @footer-menu-one
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Footer: Меню о компании', 'vedanta' ),
        'id'            => 'footer-menu-one',
        'class'         => '',
        'description'   => esc_html__( 'Add widgets here.', 'vedanta' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div class="footer-column-title">',
        'after_title'   => '</div>',
        'before_sidebar' => '<div class="footer-column footer-nav footer-nav-bottom">',
        'after_sidebar'  => '</div>',
    ) );

    /**
     * Footer: Меню карта сайта
     * @register_sidebar
     * @footer-menu-two
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Footer: Меню карта сайта', 'vedanta' ),
        'id'            => 'footer-menu-two',
        'class'         => '',
        'description'   => esc_html__( 'Add widgets here.', 'vedanta' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div class="footer-column-title">',
        'after_title'   => '</div>',
        'before_sidebar' => '<div class="footer-column footer-map-links footer-nav-bottom">',
        'after_sidebar'  => '</div>',
    ) );

    /**
     * Footer: Контактные данные
     * @register_sidebar
     * @footer-contacts
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Footer: Контактные данные', 'vedanta' ),
        'id'            => 'footer-contacts',
        'class'         => '',
        'description'   => esc_html__( 'Add widgets here.', 'vedanta' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div class="footer-column-title">',
        'after_title'   => '</div>',
        'before_sidebar' => '<div class="footer-column footer-contacts">',
        'after_sidebar'  => '</div>',
    ) );

    /**
     * Footer: О компании
     * @register_sidebar
     * @footer-about
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Footer: О компании', 'vedanta' ),
        'id'            => 'footer-about',
        'class'         => '',
        'description'   => esc_html__( 'Add widgets here.', 'vedanta' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div class="footer-column-title">',
        'after_title'   => '</div>',
        'before_sidebar' => '<div class="footer-column footer-about">',
        'after_sidebar'  => '</div>',
    ) );

    /**
     * Footer: Copyright
     * @register_sidebar
     * @footer-copyright
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Footer: Copyright', 'vedanta' ),
        'id'            => 'footer-copyright',
        'class'         => '',
        'description'   => esc_html__( 'Add widgets here.', 'vedanta' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
        'before_sidebar' => '<div class="footer-bottom">',
        'after_sidebar'  => '</div>',
    ) );

}

