<?php
defined( 'ABSPATH' ) || exit;

/**
 * Shortcode
 * Socials Links
 * @add_shortcode
 * @vedanta_shortcodes_socials
 */
add_shortcode('socials', 'vedanta_shortcodes_socials');
function vedanta_shortcodes_socials( $arr ){
    $result = '';

    $default = [
        'visible' => 'all'
    ];
    $arr = wp_parse_args( $arr, $default );

    if( have_rows( 'contacts-socials', 'options' ) ):
        $result .= '<ul class="socials">';
        while ( have_rows( 'contacts-socials', 'options' ) ) : the_row();

            if($arr['visible'] == 'all') :

                $result .= '<li>';
                $result .= '<a href="' . get_sub_field('contacts-socials-link') . '" target="_blank">';
                $result .= '<img src="' . get_sub_field('contacts-socials-icon') . '" alt="" title="" class="svg">';
                $result .= '</a>';
                $result .= '</li>';

            elseif ($arr['visible'] == 'header') :

                if( get_sub_field('contacts-socials-header') ) :
                    $result .= '<li>';
                    $result .= '<a href="' . get_sub_field('contacts-socials-link') . '" target="_blank">';
                    $result .= '<img src="' . get_sub_field('contacts-socials-icon') . '" alt="" title="" class="svg">';
                    $result .= '</a>';
                    $result .= '</li>';
                endif;

            endif;

        endwhile;
        $result .= '</ul>';
        return $result;
    endif;
}


/**
 * Shortcodes Contacts
 * @add_shortcode
 * @vedanta_shortcodes_contacts
 */
add_shortcode('contacts', 'vedanta_shortcodes_contacts');
function vedanta_shortcodes_contacts( $arr ){

	$out = null;
	$defaults = [
		'view'   => false,
	];
	$arr = wp_parse_args( $arr, $defaults );

	if($arr['view'] == 'list') :

		$out .= '<ul>';
		$out .= '<li>' . get_field( 'contacts-'.$arr['type'], 'options' ) . '</li>';
		if( have_rows('contacts-list', 'options') ) : while ( have_rows('contacts-list', 'options') ) : the_row();
			$out .= '<li>' . get_sub_field( 'contacts-list-'.$arr['type'] ) . '</li>';
		endwhile; endif;
		$out .= '</ul>';

		return $out;

	endif;

    return get_field('contacts-'.$arr['type'], 'options');

}

/**
 * Shortcodes This Year
 * @add_shortcode
 * @vedanta_shortcodes_year
 */
add_shortcode('year', 'vedanta_shortcodes_year');
function vedanta_shortcodes_year( $arr ){
    return date('Y');
}

/**
 * Shortcodes Directory
 * @add_shortcode
 * @vedanta_shortcodes_directory
 */
add_shortcode('theme', 'vedanta_shortcodes_directory');
function vedanta_shortcodes_directory( $arr ){
    return get_template_directory_uri();
}
