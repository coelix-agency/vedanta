<?php
defined( 'ABSPATH' ) || exit;
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vedanta
 */
get_header();

while ( have_posts() ) : // Start of the loop.

    the_post();

    /**
     * Home: Intro
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'intro');

    /**
     * Home: Advantages
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'advantages');

    /**
     * Home: Filter
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'filter');

    /**
     * Home: Car In Stock
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'car-instock');

    /**
     * Home: Sheme
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'sheme');

    /**
     * Home: Car Under
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'car-under');

    /**
     * Home: Team
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'team');

    /**
     * Home: Faq
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'faq');

    /**
     * Home: Feedback
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'feedback');

    /**
     * Home: Contacts
     * @get_template_part
     */
    get_template_part('template-parts/pages/home/_home', 'contacts');


endwhile; // End of the loop.

get_footer();
