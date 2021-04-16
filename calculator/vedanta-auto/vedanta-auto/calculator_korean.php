<?php
    /*
    Template Name: Калькулятор для Кореи
    Template Post Type: page
    */
?>
<?php
    get_header();
?>
<div style="display:block;width:1px;height:1px;"></div>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="content">
    <div class="cont">
        <h1 itemprop = "name">
            <?php  the_title();  ?>
        </h1>
        <div id="calc">

            <form id="calculator" class="calculator" autocomplete="off">
                <div>
                    <div class="custom-select mark">
                        <select id="mark">
                            <option value="0">Марка авто</option>

                        </select>
                    </div>
                </div>
                <div>
                    <div class="custom-select">
                        <select id="model" disabled>
                            <option value="0">Модель авто</option>

                        </select>
                    </div>
                </div>
                <div>
                    <!-- Витя -->
                    <div class="custom-select">
                        <select id="body_type">
                            <option value="0">Тип кузова</option>
                            <option value="1250">Легковой</option>
                            <option value="1250">Кроссовер</option>
                            <option value="1250">Минивен</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="custom-select engine">
                        <select id="engine">
                            <option value="diesel">Дизель</option>
                            <option value="diesel">Дизель</option>
                            <option value="petrol">Бензин</option>
                            <option value="petrol">Газ</option>
                            <option value="electro">Электро</option>
                        </select>
                    </div>
                </div>
                <div><input type="number" id="volume" placeholder="Объем куб.см"></div>
                <div class="price_cont">
                    <input type="number" id="price" placeholder="Цена">
                    <br>
                    <div class="custom-select">
                        <select id="currency" disabled>
                            <option value="von">Вон</option>
                            <option value="von">Вон</option>
                            <option value="usd">USD</option>
                        </select>
                    </div>
                </div>
                <div>
                    <input type="number" id="year" placeholder="Год выпуска">
                </div>
                <div class="full-w">
                    <input type="submit" value="Рассчитать">
                </div>
            </form>
            <div id="loading">
                <img style="-webkit-user-select: none;margin: auto;" src="https://i.giphy.com/media/ne3xrYlWtQFtC/giphy.webp">
                <!-- <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" > -->
            </div>
            <div id="output" class="output"></div>
        </div>
        <div id="result_button">Скачать</div>
        <div class="text_content">
            <?php
                the_content();
            ?>
        </div>


        <section class="haveQuestionsBlock">

        <div class="cont">
        <div class="haveQuestions multi_line_textarea">
        <h3><span>Остались</span> вопросы?</h3>
        <p>Оставьте заявку и мы проконсультируем Вас</p>

        <?php echo do_shortcode('[contact-form-7 id="14217" title="Остались вопросы?"]');?>
        </div>
        </div>

        </section>




    </div>
</section>
<?php endwhile; endif; ?>
<script src="<?php bloginfo('template_url'); ?>/js/FileSaver.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="<?php bloginfo('template_url'); ?>/js/calculate_korean.js?<?=time()?>"></script>
<?php
get_footer();
