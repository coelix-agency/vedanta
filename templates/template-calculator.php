<?php
/*
Template Name: Таможенный калькулятор
Template Post Type: page
*/

get_header();
?>

<?= get_template_part( 'template-parts/partials/_partial', 'pagehead', [] ) ?>

    <!-- Section -->
    <section class="customs-calc about-section">

        <!-- Container -->
        <div class="container">

            <!-- Content -->
            <div class="about-content">

                <!-- Col -->
                <div class="section-left-col">

                    <!-- Title -->
                    <div class="title">
                        <?= _e( 'Таможенный <span class="main-color">калькулятор&nbsp;—</span>', 'vedanta' ) ?>
                    </div>
                    <!-- End Title -->

                    <!-- Sub Title -->
                    <div class="subtitle">
	                    <?= _e( 'это специальное приложение', 'vedanta' ) ?>
                    </div>
                    <!-- End Sub Title -->

                </div>
                <!-- End Col -->

                <!-- Col -->
                <div class="section-right-col">

                    <!-- content -->
                    <div class="content">

                        <!-- wrapper -->
                        <div class="form-wrapper" id="calc">

                            <!-- form -->
                            <form
                                    action=""
                                    class="form"
                                    id="calculator"
                            >

                                <!-- row -->
                                <div class="form-row">

                                    <!-- row > item -->
                                    <div class="form-item form-item-inners">
                                        <input
                                                type="number"
                                                name="price"
                                                placeholder="<?= _e( 'Цена', 'vedanta' ) ?>"
                                                id="price"
                                        >
                                        <div class="select">
                                            <select id="currency">
                                                <option value="usd">USD</option>
                                                <option value="eur">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end row > item -->

                                    <!-- row > item -->
                                    <div class="form-item">
                                        <input
                                                type="number"
                                                name="volume"
                                                placeholder="<?= _e( 'Объём двигателя куб. см', 'vedanta' ) ?>"
                                                id="volume"
                                        >
                                    </div>
                                    <!-- end row > item -->

                                    <!-- row > item -->
                                    <div class="form-item">
                                        <div class="select">
                                            <select id="engine">
                                                <option hidden><?= _e( 'Тип двигателя', 'vedanta' ) ?></option>
                                                <option><?= _e( 'Бензиновый', 'vedanta' ) ?></option>
                                                <option><?= _e( 'Дизельный', 'vedanta' ) ?></option>
                                                <option><?= _e( 'Гибрид', 'vedanta' ) ?></option>
                                                <option><?= _e( 'Електро', 'vedanta' ) ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end row > item -->

                                    <!-- row > item -->
                                    <div class="form-item">
                                        <input
                                                type="number"
                                                name="year"
                                                placeholder="<?= _e( 'Год выпуска', 'vedanta' ) ?>"
                                                id="year"
                                        >
                                    </div>
                                    <!-- end row > item -->

                                    <!-- row > item -->
                                    <div class="form-item">
                                        <input
                                                type="submit"
                                                value="<?= _e( 'Рассчитать стоимость', 'vedanta' ) ?>"
                                        >
                                    </div>
                                    <!-- end row > item -->

                                </div>
                                <!-- end row -->

                            </form>
                            <!-- end form -->

                            <!-- loading -->
                            <div id="loading"></div>
                            <!-- end loading -->

                            <!-- button -->
                            <button
                                    type="button"
                                    id="result_button"
                            ></button>
                            <!-- end button -->

                        </div>
                        <!-- end wrapper -->

                    </div>
                    <!-- end content -->

                </div>
                <!-- End Col -->

            </div>
            <!-- End Content -->

            <!-- Output -->
            <div class="about-select" id="output">

            </div>
            <!-- End Output -->

            <!-- Save Pdf Btn -->


            <a href="#save" class="btn btn-pdf savePng" onclick="savePNG();return false;" style="display: none">
		        <?= _e( 'Скачать PDF', 'vedanta' ) ?>
            </a>

            <!-- End Save Pdf Btn -->

        </div>
        <!-- End Container -->

    </section>
    <!-- End Section -->

<?php
/**
 * Home: Contacts
 * @get_template_part
 */
get_template_part( 'template-parts/pages/home/_home', 'contacts', [ 'page_id' => 2 ] );
?>

<?php
get_footer();