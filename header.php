<?php
defined( 'ABSPATH' ) || exit;
/**
 * The header for our theme
 * @package vedanta
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?= body_class() ?> >
<div>
    <?php
    /**
     * header_parts hook
     *
     * @hooked vedanta_header_TagHeaderOpen - 10
     * @hooked vedanta_header_TagHeaderInner - 20
     * @hooked vedanta_header_TagHeaderClose - 30
     *
     */
    do_action('header_parts');
    ?>
    <!-- CONTENT -->
    <main>
        <div id="page-main" class="hide-block"></div>