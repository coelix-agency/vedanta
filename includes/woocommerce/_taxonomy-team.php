<?php
defined( 'ABSPATH' ) || exit;

/**
 * Add Table Column Image
 * @manage_{$post_type}_posts_columns
 * @add_filter
 * @manage_team_posts_columns
 * @vedanta_team_custom_column_header
 */
add_filter( "manage_team_posts_columns", 'vedanta_team_custom_column_header');
function vedanta_team_custom_column_header( $columns ){
    $columns['image'] = __( 'Image', 'vedanta' );
    return $columns;
}

/**
 * Add Table Column Image
 * @manage_{$post_type}_posts_custom_column
 * @add_action
 * @manage_team_posts_custom_column
 * @vedanta_team_custom_column_content
 */
add_action( "manage_team_posts_custom_column", 'vedanta_team_custom_column_content', 10, 2);
function vedanta_team_custom_column_content( $column, $post_id ){

    switch ( $column ) :
        case 'image' :
            echo get_the_post_thumbnail( $post_id, [60, 60] );
            break;
    endswitch;
}