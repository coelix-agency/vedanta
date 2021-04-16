<?php
defined( 'ABSPATH' ) || exit;
/**
 * vedanta Theme Customizer
 *
 * @package vedanta
 */

/**
 * Customizer
 * Logo
 * @customize_register action
 */
add_action('customize_register', function($wp_customize){

    $wp_customize->add_section(
        'my_parameters',
        array(
            'title' => 'Логотипы',
            'description' => 'Загрузить логотип',
            'priority' => 11,
        )
    );

    $wp_customize->add_setting('logo');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
                'label' => 'Логотип',
                'section' => 'my_parameters',
                'settings' => 'logo'
            )
        )
    );

});
