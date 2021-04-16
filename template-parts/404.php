<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vedanta
 */

get_header();
?>
<!-- 404 -->
<section id="page-404">
    <!-- container -->
    <div class="container">
        <!-- title -->
        <div class="page-404-title">
            <span>4</span>
            <div class="img-wrapper">
                <img
                    src="<?= get_template_directory_uri() ?>/assets/images/icons/plate.png"
                    alt="страница 404"
                    title=""
                >
            </div>
            <span>4</span></div>
        <!-- end title -->
        <!-- subtitle -->
        <div class="page-404-subtitle">
            Извините страница не найдена перейдите по следующим ссылкам!
        </div>
        <!-- end subtitle -->
        <!-- wrapper -->
        <div class="page-404-wrapper">
            <a class="page-404-link" href="<?= get_permalink(wc_get_page_id('shop')) ?>">Перейти в каталог</a>
            <a class="page-404-link" href="<?= home_url() ?>">Вернуться на главную</a>
        </div>
        <!-- end wrapper -->
    </div>
    <!-- end container -->
</section>
<!-- end 404 -->
<?php
get_footer();
