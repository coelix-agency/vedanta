<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vedanta-auto
 */

?>
    <div id="overlay"></div>
    <div id="popups">
        <div class="popup_request" id="popup_request">
            <div class="close_button">
                <span></span>
            </div>
            <h4>Спасибо!</h4>
            <div class="text">Наш менеджер свяжется с Вами в ближайшее время</div>
        </div>
        <div class="popup_leave_request" id="popup_leave_request">
            <div class="close_button">
                <span></span>
            </div>
            <h4>Оставьте заявку</h4>
            <h5>И мы обязательно Вам перезвоним</h5>
            <!-- <form action="" method="post" id="form_leave_request">
                <label class="label_cont"><input type="text" name="name" id="name_request" placeholder="Ваше имя*" required="required" autocomplete="off"></label>
                <label class="label_cont"><input type="text" name="phone" id="phone_request" placeholder="Ваш телефон*" required="required" autocomplete="off"></label>
                <input type="submit" value="отправить" class="btn" id="submit_request">
            </form> -->


            <!-- <div class="hidForms"> -->
              <?php
               echo do_shortcode('[contact-form-7 id="14214" title="Оставить заявку"]');
              ?>
            <!-- </div> -->
        </div>
        <div class="popup_leave_request_car" id="popup_leave_request_car">
            <div class="close_button">
                <span></span>
            </div>
            <h4>Оставьте заявку</h4>
            <h5>И мы обязательно Вам перезвоним</h5>
            <!-- <form action="" method="post" id="form_leave_request_car">
                <label class="label_cont"><input type="text" name="name" id="name_request_car" placeholder="Ваше имя*" required="required" autocomplete="off"></label>
                <label class="label_cont"><input type="text" name="phone" id="phone_request_car" placeholder="Ваш телефон*" required="required" autocomplete="off"></label>
                <label><input type="hidden" name="link" id="link_request_car"  value="<?php echo get_permalink( $post->ID ); ?>"></label>
                <input type="submit" value="отправить" class="btn" id="submit_request_car">
            </form> -->


<!-- <div class="hidForms"> -->
  <?php
   echo do_shortcode('[contact-form-7 id="14212" title="Получить консультацию"]');
  ?>
<!-- </div> -->

        </div>

        <div class="popup_leave_request_drive" id="popup_leave_request_drive">
            <div class="close_button">
                <span></span>
            </div>
            <h4>Бесплатный Тест-драйв </h4>
            <h5>Мы обязательно Вам перезвоним</h5>
            <!-- <form action="" method="post" id="form_leave_request_drive">
                <label class="label_cont"><input type="text" name="name" id="name_request_drive" placeholder="Ваше имя*" required="required" autocomplete="off"></label>
                <label class="label_cont"><input type="text" name="phone" id="phone_request_drive" placeholder="Ваш телефон*" required="required" autocomplete="off"></label>
                <label><input type="hidden" name="link" id="link_request_drive"  value="<?php echo get_permalink( $post->ID ); ?>"></label>
                <input type="submit" value="отправить" class="btn" id="submit_request_drive">
            </form> -->


              <?php
               echo do_shortcode('[contact-form-7 id="14202" title="Бесплатный Тест-драйв"]');
              ?>


            <!-- <script>var amo_forms_params = {"id":634183,"hash":"806f9262fa53fe8506e1cd1a55f343ee","locale":"ru"};</script>
            <script id="amoforms_script"  charset="utf-8" src="https://forms.amocrm.ru/forms/assets/js/amoforms.js"></script> -->
        </div>

        <div class="popup_freeDriveAuto" id="popup_freeDriveAuto">
            <div class="close_button">
                <span></span>
            </div>
            <h4>Бесплатный Тест-драйв </h4>
            <h5>Мы обязательно Вам перезвоним</h5>
            <!-- <form action="" method="post" id="form_freeDriveAuto">
                <label class="label_cont"><input type="text" name="name" id="name_freeDriveAuto" placeholder="Ваше имя*" required="required" autocomplete="off"></label>
                <label class="label_cont"><input type="text" name="phone" id="phone_freeDriveAuto" placeholder="Ваш телефон*" required="required" autocomplete="off"></label>
                <label><input type="hidden" name="link" id="link_freeDriveAuto"  value="<?php echo get_permalink( $post->ID ); ?>"></label>
                <input type="submit" value="отправить" class="btn" id="submit_freeDriveAuto">
            </form> -->

            <!-- <div class="hidForms"> -->
              <?php
               echo do_shortcode('[contact-form-7 id="14202" title="Бесплатный Тест-драйв"]');
              ?>
            <!-- </div> -->
        </div>

        <div class="popup_getAdviceAuto" id="popup_getAdviceAuto">
            <div class="close_button">
                <span></span>
            </div>
            <h4>Получить консультацию</h4>
            <h5>Мы обязательно Вам перезвоним</h5>
            <!-- <form action="" method="post" id="form_getAdviceAuto">
                <label class="label_cont"><input type="text" name="name" id="name_getAdviceAuto" placeholder="Ваше имя*" required="required" autocomplete="off"></label>
                <label class="label_cont"><input type="text" name="phone" id="phone_getAdviceAuto" placeholder="Ваш телефон*" required="required" autocomplete="off"></label>
                <label><input type="hidden" name="link" id="link_getAdviceAuto"  value="<?php echo get_permalink( $post->ID ); ?>"></label>
                <input type="submit" value="отправить" class="btn" id="submit_getAdviceAuto">
            </form> -->


            <!-- <div class="hidForms"> -->
              <?php
               echo do_shortcode('[contact-form-7 id="14212" title="Получить консультацию"]');
              ?>
            <!-- </div> -->


        </div>






    </div>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/slick.css?<?=time()?>">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/jquery-ui.css?<?=time()?>">
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.mask.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/app.js?<?=time()?>"></script>
<script type="text/javascript">








</script>

<?php wp_footer(); ?>

</body>
</html>
