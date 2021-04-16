<?php
defined( 'ABSPATH' ) || exit;
/**
 * @vedanta_header_TagHeaderOpen
*/
add_action( 'header_parts', 'vedanta_header_TagHeaderOpen', 10 );
function vedanta_header_TagHeaderOpen() {
	?>
  	<!-- HEADER -->
    <header class="header">
	<?php
};
/**
 * @vedanta_header_TagHeaderInner
*/
add_action( 'header_parts', 'vedanta_header_TagHeaderInner', 20 );
function vedanta_header_TagHeaderInner() {
	?>

    <!-- header-top -->
    <div class="header-top">

        <!-- container -->
        <div class="container">

            <!-- lang -->
            <div class="lang">
                <?php
                $translations   = wpm_get_languages();
                $currentLang    = wpm_get_language();
                ?>
                <!-- lang > title -->
                <p class="lang__title">
                    <?= _e( 'Язык', 'vedanta' ) ?>
                </p>
                <!-- end lang > title -->

                <!-- lang > active -->
<!--                <a href="#" class="lang__item_active">-->
<!--                    --><?//= $translations[$currentLang]['name'] ?>
<!--                </a>-->
                <!-- end lang > active -->

				<div class="select">
					<select class="header-language-select">
<!--						<option selected>Русский</option>-->
<!--						<option>Украинский</option>-->
						<?php foreach ($translations as $code => $translation) : ?>
							<option><?= $translation['name'] ?></option>
<!--							<li class="lang__item">-->
<!--								<a href="--><?//= esc_url(wpm_translate_current_url($code)) ?><!--" title="">-->
<!--									--><?//= $translation['name'] ?>
<!--								</a>-->
<!--							</li>-->
						<?php endforeach; ?>
					</select>
					<img src="<?= get_template_directory_uri() ?>/assets/images/icons/lang-arrow.svg" alt="" class="svg">
				</div>
                <!-- lang > list -->
<!--                <ul class="lang__list">-->
<!--                    --><?php //foreach ($translations as $code => $translation) : ?>
<!--                        <li class="lang__item">-->
<!--                            <a href="--><?//= esc_url(wpm_translate_current_url($code)) ?><!--" title="">-->
<!--                                --><?//= $translation['name'] ?>
<!--                            </a>-->
<!--                        </li>-->
<!--                    --><?php //endforeach; ?>
<!--                </ul>-->
                <!-- end lang > list -->

<!--                <img-->
<!--                        src="--><?//= get_template_directory_uri() ?><!--/assets/images/icons/lang-arrow.svg"-->
<!--                        alt=""-->
<!--                        title=""-->
<!--                        class="lang__arrow"-->
<!--                >-->

            </div>
            <!-- end lang -->

            <!-- nav -->
            <?php
            /*
             * Args Nav Menu
             */
            $args = array(
                'theme_location'    => 'header-menu-top',
                'container'         => 'nav',
                'container_class'   => 'nav nav-top',
                'menu_class'        => 'nav__list',
                'items_wrap'        => '<ul class="%2$s">%3$s</ul>'
            );
            wp_nav_menu($args);
            ?>
            <!-- end nav -->

            <!-- social -->
            <div class="social">
                <?= do_shortcode( '[socials visible=header]' ) ?>
            </div>
            <!-- end social -->

			<!-- Phone -->
			<a href="tel:<?= do_shortcode( '[contacts type=phone]' ) ?>" class="header-single-phone header-top-single-phone">
				<?= do_shortcode( '[contacts type=phone]' ) ?>
			</a>
			<!-- End Phone -->

            <!-- work -->
            <div class="work-mode">
                <p class="work-mode__title">
                    <?= _e( 'Режим работы салона', 'vedanta' ) ?>:
                </p>
                <p class="work-mode__time">
                    <?= do_shortcode( '[contacts type=worktime]' ) ?>
                </p>
            </div>
            <!-- end work -->

        </div>
        <!-- end container -->

    </div>
    <!-- end header-top -->

    <!-- header-bottom -->
    <div class="header-bottom">

        <!-- container -->
        <div class="container">

            <!-- Logo -->
            <?php
            $logo_url = get_theme_mod( 'logo' );
            ?>
            <a href="<?= get_home_url() ?>" class="logo">
                <img
                        src="<?= $logo_url ?>"
                        alt="<?= get_bloginfo('name') ?>"
                        title="<?= get_bloginfo('name') ?>"
                        class="svg"
                >
            </a>
            <!-- End Logo -->

            <!-- Nav -->
            <?php
            /*
             * Args Nav Menu
             */
            $args = array(
                'theme_location'    => 'header-menu-bottom',
                'container'         => 'nav',
                'container_class'   => 'nav sub-nav',
                'menu_class'        => 'nav__list',
                'items_wrap'        => '<ul class="%2$s">%3$s</ul>'
            );
            wp_nav_menu($args);
            ?>
            <!-- End Nav -->

            <!-- Phone -->
            <a href="tel:<?= do_shortcode( '[contacts type=phone]' ) ?>" class="header-single-phone">
                <?= do_shortcode( '[contacts type=phone]' ) ?>
            </a>
            <!-- End Phone -->

            <!-- Button -->
            <a title="" class="button authorization">
                <?= _e( 'Войти в ЛК', 'vedanta' ) ?>
            </a>
            <!-- End Button -->

            <!-- burger -->
            <div class="burger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <!-- end burger -->

        </div>
        <!-- end container -->

    </div>
    <!-- end header-bottom -->

	<?php
};
/**
 * @vedanta_header_TagHeaderClose
*/
add_action( 'header_parts', 'vedanta_header_TagHeaderClose', 30 );
function vedanta_header_TagHeaderClose() {
	?>
  	</header>
  	<!-- END HEADER -->
	<?php
};