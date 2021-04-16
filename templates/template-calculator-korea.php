<?php
/*
Template Name: Расчет авто из Кореи
Template Post Type: page
*/

get_header();
?>

<?= get_template_part( 'template-parts/partials/_partial', 'pagehead', [] ) ?>

    <!-- Section -->
    <section class="car-calc customs-calc about-section">

        <!-- Container -->
        <div class="container">

            <!-- Content -->
            <div class="about-content">

                <!-- Col -->
                <div class="section-left-col">

                    <!-- Title -->
                    <div class="title">
                        <?= _e( 'Особенности работы <span class="main-color">калькулятора</span>', 'vedanta' ) ?>
                    </div>
                    <!-- End Title -->

                    <!-- Sub Title -->
                    <div class="subtitle">
	                    <?= _e( 'Чтобы правильно рассчитать растаможку', 'vedanta' ) ?>
                    </div>
                    <!-- End Sub Title -->

                </div>
                <!-- End Col -->

                <!-- Col -->
                <div class="section-right-col">

                    <!-- Content -->
                    <div class="content">

                        <!-- wrapper -->
                        <div class="form-wrapper" id="calc">

                            <!-- form -->
                            <form
                                    action=""
                                    class="form"
                                    id="calculator"
                            >

                                <!-- form > row -->
                                <div class="form-row">

                                    <!-- item -->
                                    <div class="form-item ">
                                        <div class="select">
                                            <select id="mark">
                                                <option value="0" hidden><?= _e( 'Марка авто', 'vedanta' ) ?></option>
                                                <option value="Kia">Kia</option>
                                                <option value="Hyundai">Hyundai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end item -->

                                    <!-- item -->
                                    <div class="form-item ">
                                        <div class="select">
                                            <select id="model">
                                                <option hidden value="0"><?= _e( 'Модель', 'vedanta' ) ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end item -->

                                    <!-- item -->
                                    <div class="form-item ">
                                        <div class="select">
                                            <select id="body_type">
                                                <option hidden value="0"><?= _e( 'Тип кузова', 'vedanta' ) ?></option>
                                                <option value="1250"><?= _e( 'Легковой', 'vedanta' ) ?></option>
                                                <option value="1250"><?= _e( 'Кроссовер', 'vedanta' ) ?></option>
                                                <option value="1250"><?= _e( 'Минивен', 'vedanta' ) ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end item -->

                                    <!-- item -->
                                    <div class="form-item">
                                        <div class="select">
                                            <select id="engine">
                                                <option hidden value="0"><?= _e( 'Вид топлива', 'vedanta' ) ?></option>
                                                <option value="petrol"><?= _e( 'Бензиновый', 'vedanta' ) ?></option>
                                                <option value="diesel"><?= _e( 'Дизельный', 'vedanta' ) ?></option>
                                                <option value="gibrid"><?= _e( 'Гибрид', 'vedanta' ) ?></option>
                                                <option value="electro"><?= _e( 'Електро', 'vedanta' ) ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end item -->

                                    <!-- item -->
                                    <div class="form-item">
                                        <input
                                                type="number"
                                                name="volume"
                                                placeholder="<?= _e( 'Объём куб. см', 'vedanta' ) ?>"
                                                id="volume"
                                                value=""
                                        >
                                    </div>
                                    <!-- end item -->

                                    <!-- item -->
                                    <div class="form-item">
                                        <input
                                                type="number"
                                                name="year"
                                                placeholder="<?= _e( 'Год выпуска', 'vedanta' ) ?>"
                                                id="year"
                                                value=""
                                        >
                                    </div>
                                    <!-- end item -->

                                    <!-- item -->
                                    <div class="form-item form-item-inners">
                                        <input
                                                type="number"
                                                name="price"
                                                placeholder="<?= _e( 'Цена', 'vedanta' ) ?>"
                                                id="price"
                                                value=""
                                        >
                                        <div class="select">
                                            <select id="currency">
                                                <option value="0"><?= _e( 'Валюта', 'vedanta' ) ?></option>
                                                <option value="von">Вон</option>
                                                <option value="usd">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end item -->

                                    <!-- item -->
                                    <div class="form-item">
                                        <input
                                                type="submit"
                                                value="<?= _e( 'Рассчитать стоимость', 'vedanta' ) ?>"
                                        >
                                    </div>
                                    <!-- end item -->

                                </div>
                                <!-- end form > row -->

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
                    <!-- End Content -->

                </div>
                <!-- End Col -->

            </div>
            <!-- End Content -->

            <!-- Result -->
            <div id="output">

            </div>
            <!-- End Result -->

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