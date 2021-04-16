<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vedanta
 */

get_header();

while ( have_posts() ) :
    the_post();

    the_title();

endwhile;

get_footer();
