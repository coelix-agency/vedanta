<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register Taxonomies
 * @add_action
 * @init
 * @vedanta_register_taxonomies
 */
add_action( 'init', 'vedanta_register_taxonomies' );
function vedanta_register_taxonomies() {

	$labels_banks = [
		"name"                  => __( "Банки", "vedanta" ),
		"singular_name"         => __( "Банки", "vedanta" ),
		"menu_name"             => __( "Банки", "vedanta" ),
		"all_items"             => __( "Все банки", "vedanta" ),
		"edit_item"             => __( "Редактировать", "vedanta" ),
		"view_item"             => __( "Смотреть", "vedanta" ),
		"update_item"           => __( "Обновить", "vedanta" ),
		"add_new_item"          => __( "Добавить", "vedanta" ),
		"new_item_name"         => __( "Новая запись", "vedanta" ),
		"parent_item"           => __( "Предыдущая", "vedanta" ),
		"search_items"          => __( "Поиск", "vedanta" ),
		"popular_items"         => __( "Популярные", "vedanta" ),
		"not_found"             => __( "Не найдено", "vedanta" ),
		"no_terms"              => __( "Нет записей", "vedanta" ),
		"items_list"            => __( "Список", "vedanta" ),
	];

	$args = [
		"label"                 => __("Банки", "nec"),
		"labels"                => $labels_banks,
		"description"           => "",
		"public"                => true,
		"publicly_queryable"    => true,
		"show_ui"               => true,
		"show_in_rest"          => true,
		"rest_base"             => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive"           => false,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"delete_with_user"      => false,
		"exclude_from_search"   => false,
		"capability_type"       => "post",
		"map_meta_cap"          => true,
		"hierarchical"          => true,
		"rewrite"               => ["slug" => "banks", "with_front" => true],
		"query_var"             => true,
		"menu_icon"             => "dashicons-clipboard",
		"supports"              => ["title", "editor", "thumbnail", "excerpt"],
		"taxonomies"            => ["category"],
	];

	register_post_type("banks", $args);


}