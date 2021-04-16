<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vedanta
 */

if(is_page('about')) :
    /*
     * Page: Map
     */
    get_template_part( 'template-parts/pages/_page', 'about' );
elseif(is_page('contacts')) :
    /*
     * Page: Contacts
     */
    get_template_part( 'template-parts/pages/_page', 'contacts' );
elseif(is_page('delivery')) :
	/*
	 * Page: Delivery
	 */
	get_template_part( 'template-parts/pages/_page', 'delivery' );
elseif(is_page('crediting')) :
	/*
	 * Page: Crediting
	 */
	get_template_part( 'template-parts/pages/_page', 'crediting' );
else:
    /*
     * Page: Text
     */
    get_template_part( 'template-parts/pages/_page', 'text' );
endif;
?>
