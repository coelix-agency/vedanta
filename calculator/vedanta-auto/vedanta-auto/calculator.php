<?php
    /*
    Template Name: Калькулятор
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
                <div>Стоимость автомобиля <input type="number" id="price" placeholder="Стоимость автомобиля"></div>
                <div>
                    <span>Валюта</span>
                    <div class="custom-select">
                        <select id="currency">
                            <option value="eur">EURO</option>
                            <option value="eur">EURO</option>
                            <option value="usd">USD</option>
                        </select>
                    </div>
                </div>
                <div id="volumeCont">Объем двигателя.куб.см <input type="number" id="volume" placeholder="Объем куб.см"></div>
                <div>
                    Тип двигателя
                    <div class="custom-select">
                        <select id="engine">
                            <option value="diesel">Дизель</option>
                            <option value="diesel">Дизель</option>
                            <option value="petrol">Бензин</option>
                            <option value="electro">Электро</option>
                        </select>
                    </div>
                </div>
                <div>Год автомобиля <input type="number" id="year" placeholder="Год автомобиля"></div>
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
        <div id="result_button">Сохранить</div>
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
<script src="<?php bloginfo('template_url'); ?>/js/calculate.js?<?=time()?>"></script>
<?php
get_footer();
