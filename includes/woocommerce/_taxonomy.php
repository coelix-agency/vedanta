<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register Woo Taxonomies
 * @add_action
 * @init
 * @vedanta_woo_register_taxonomies
 */
add_action( 'init', 'vedanta_woo_register_taxonomies' );
function vedanta_woo_register_taxonomies() {

    /**
     * Taxonomy: Производители.
     * @register_taxonomy
     */
    $labels_brands = [
        "name"                  => __( "Производители", "vedanta" ),
        "singular_name"         => __( "Производители", "vedanta" ),
        "menu_name"             => __( "Производители", "vedanta" ),
        "all_items"             => __( "Все производители", "vedanta" ),
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
    $args_brands = [
        "label"                 => __( "Производители", "vedanta" ),
        "labels"                => $labels_brands,
        "public"                => true,
        "publicly_queryable"    => true,
        "hierarchical"          => true,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "query_var"             => true,
        "rewrite"               => [ 'slug' => 'brands', 'with_front' => true, ],
        "show_admin_column"     => false,
        "show_in_rest"          => true,
        "rest_base"             => "brands",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit"    => false,
    ];
    register_taxonomy(
    	"brands",
	    [ "product" ],
	    $args_brands
    );

    /**
     * Taxonomy: Наша команда.
     * @register_taxonomy
     */
    $labels_team = [
        "name"                  => __( "Наша команда", "vedanta" ),
        "singular_name"         => __( "Наша команда", "vedanta" ),
        "menu_name"             => __( "Наша команда", "vedanta" ),
        "all_items"             => __( "Все", "vedanta" ),
        "add_new"               => __( "Добавить", "vedanta" ),
        "add_new_item"          => __( "Добавить новую", "vedanta" ),
        "edit_item"             => __( "Редактировать", "vedanta" ),
        "new_item"              => __( "Новая", "vedanta" ),
        "view_item"             => __( "Смотреть", "vedanta" ),
        "view_items"            => __( "Смотреть", "vedanta" ),
        "search_items"          => __( "Поиск", "vedanta" ),
        "not_found"             => __( "Не найдено", "vedanta" ),
        "parent"                => __( "Предыдущая", "vedanta" ),
        "featured_image"        => __( "Изображение", "vedanta" ),
        "set_featured_image"    => __( "Установить изображение", "vedanta" ),
        "remove_featured_image" => __( "Удалить изображение", "vedanta" ),
        "use_featured_image"    => __( "Использовать изображение", "vedanta" ),
        "parent_item_colon"     => __( "Предыдущая", "vedanta" ),
    ];
    $args_team = [
        "label"                 => __( "Наша команда", "vedanta" ),
        "labels"                => $labels_team,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => true,
        "rewrite"               => [ "slug" => "team", "with_front" => true ],
        "query_var"             => true,
        "supports"              => [ "title", "editor", "thumbnail", "excerpt", "author", "page-attributes" ],
    ];
    register_post_type(
    	"team",
	    $args_team
    );

    /**
     * Taxonomy: Вопросы и ответы.
     * @register_taxonomy
     */
    $labels_faq = [
        "name"                  => __( "FAQ", "vedanta" ),
        "singular_name"         => __( "FAQ", "vedanta" ),
        "menu_name"             => __( "FAQ", "vedanta" ),
        "all_items"             => __( "Все", "vedanta" ),
        "add_new"               => __( "Добавить", "vedanta" ),
        "add_new_item"          => __( "Добавить новую", "vedanta" ),
        "edit_item"             => __( "Редактировать", "vedanta" ),
        "new_item"              => __( "Новая", "vedanta" ),
        "view_item"             => __( "Смотреть", "vedanta" ),
        "view_items"            => __( "Смотреть", "vedanta" ),
        "search_items"          => __( "Поиск", "vedanta" ),
        "not_found"             => __( "Не найдено", "vedanta" ),
        "parent"                => __( "Предыдущая", "vedanta" ),
        "featured_image"        => __( "Изображение", "vedanta" ),
        "set_featured_image"    => __( "Установить изображение", "vedanta" ),
        "remove_featured_image" => __( "Удалить изображение", "vedanta" ),
        "use_featured_image"    => __( "Использовать изображение", "vedanta" ),
        "parent_item_colon"     => __( "Предыдущая", "vedanta" ),
    ];
    $args_faq = [
        "label"                 => __( "FAQ", "vedanta" ),
        "labels"                => $labels_faq,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => true,
        "rewrite"               => [ "slug" => "faq", "with_front" => true ],
        "query_var"             => true,
        "supports"              => [ "title", "editor", "page-attributes" ],
    ];
    register_post_type(
    	"faq",
	    $args_faq
    );

	/**
	 * Taxonomy: Тип топлива.
	 * @register_taxonomy
	 */
	$labels_type_oil = [
		"name"                  => __( "Вид топлива", "vedanta" ),
		"singular_name"         => __( "Вид топлива", "vedanta" ),
		"menu_name"             => __( "Вид топлива", "vedanta" ),
		"all_items"             => __( "Все типы", "vedanta" ),
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
	$args_type_oil = [
		"label"                 => __( "Тип топлива", "vedanta" ),
		"labels"                => $labels_type_oil,
		"public"                => true,
		"publicly_queryable"    => true,
		"hierarchical"          => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"query_var"             => true,
		"rewrite"               => [ 'slug' => 'type_oil', 'with_front' => true, ],
		"show_admin_column"     => false,
		"show_in_rest"          => true,
		"rest_base"             => "type_oil",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit"    => false,
	];
	register_taxonomy(
		"type_oil",
		[ "product" ],
		$args_type_oil
	);

	/**
	 * Taxonomy: Тип авто.
	 * @register_taxonomy
	 */
	$labels_type_cars = [
		"name"                  => __( "Вид авто", "vedanta" ),
		"singular_name"         => __( "Вид авто", "vedanta" ),
		"menu_name"             => __( "Вид авто", "vedanta" ),
		"all_items"             => __( "Все виды", "vedanta" ),
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
	$args_type_cars = [
		"label"                 => __( "Вид авто", "vedanta" ),
		"labels"                => $labels_type_cars,
		"public"                => true,
		"publicly_queryable"    => true,
		"hierarchical"          => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"query_var"             => true,
		"rewrite"               => [ 'slug' => 'type_cars', 'with_front' => true, ],
		"show_admin_column"     => false,
		"show_in_rest"          => true,
		"rest_base"             => "type_cars",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit"    => false,
	];
	register_taxonomy(
		"type_cars",
		[ "product" ],
		$args_type_cars
	);

}