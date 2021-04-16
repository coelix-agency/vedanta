<?php 
/*
 * Home: Contacts
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;

$id_page = ($args && array_key_exists('page_id', $args) && !empty( $args['page_id'] )) ? $args['page_id'] : get_the_ID();

?>

<?php if( ! get_field( 'home-contacts-hide', $id_page ) ) : ?>
    <!-- Contacts Section -->
    <section class="map">

        <!-- wrapper -->
        <div class="map-wrapper">
            <?= get_template_part('template-parts/partials/_partial', 'google-map'); ?>
        </div>
        <!-- end wrapper -->

        <!-- info -->
        <div class="map-info">

            <!-- info > title -->
            <div class="map-info-header">
                <?= _e( 'Контакты', 'vedanta' ) ?>
            </div>
            <!-- end info > title -->

            <!-- wrap -->
            <div class="map-info-wrap">

                <!-- City -->
                <div class="map-info-item city">

                    <!-- Title -->
                    <div class="title">
                        <?= _e( 'Город', 'vedanta' ) ?>:
                    </div>
                    <!-- Title -->

                    <!-- Text -->
                    <div class="name">
                        <?= do_shortcode( '[contacts type=city]' ) ?>
                    </div>
                    <!-- End Text -->

                </div>
                <!-- End City -->

                <!-- Address -->
                <div class="map-info-item street">

                    <!-- Title -->
                    <div class="title">
                        <?= _e( 'Адрес', 'vedanta' ) ?>:
                    </div>
                    <!-- Title -->

                    <!-- Text -->
                    <div class="name">
<!--                        --><?//= do_shortcode( '[contacts type=address]' ) ?>

                        <?php
                        $contacts_general_city = get_field( 'contacts-city', 'options' );
                        $contacts_general_address = get_field( 'contacts-address', 'options' );
                        $contacts_general_latlng = get_field( 'contacts-map', 'options' );
                        ?>

						<select name="" id="google-map-value">
							<option
                                    value="<?= $contacts_general_latlng['lat'] ?>|<?= $contacts_general_latlng['lng'] ?>"
                                    data
                            >
                                <?= $contacts_general_address ?>
                            </option>

                            <?php if( have_rows('contacts-list', 'options') ) : while ( have_rows('contacts-list', 'options') ) : the_row(); ?>
                                <option
                                        value="<?= get_sub_field('contacts-list-map')['lat'] ?>|<?= get_sub_field('contacts-list-map')['lng'] ?>"
                                        data
                                >
		                            <?= get_sub_field('contacts-list-address') ?>
                                </option>
                            <?php endwhile; endif; ?>

						</select>
                    </div>
                    <!-- End Text -->

                </div>
                <!-- End Address -->

                <!-- Telephone -->
                <div class="map-info-item phone">

                    <!-- Title -->
                    <div class="title">
                        <?= _e( 'Телефон', 'vedanta' ) ?>:
                    </div>
                    <!-- Title -->

                    <!-- Text -->
                    <a href="tel:<?= do_shortcode( '[contacts type=phone]' ) ?>" class="name">
                        <?= do_shortcode( '[contacts type=phone]' ) ?>
                    </a>
                    <!-- End Text -->

                </div>
                <!-- End Telephone -->

                <!-- Email -->
                <div class="map-info-item mail">

                    <!-- Title -->
                    <div class="title">
                        <?= _e( 'E-mail', 'vedanta' ) ?>:
                    </div>
                    <!-- Title -->

                    <!-- Text -->
                    <a href="mailto:<?= do_shortcode( '[contacts type=email]' ) ?>" class="name">
                        <?= do_shortcode( '[contacts type=email]' ) ?>
                    </a>
                    <!-- End Text -->

                </div>
                <!-- End Email -->

                <!-- Socials -->
                <div class="map-info-item map-social">

                    <!-- Title -->
                    <div class="title">
                        <?= _e( 'Соц. сети', 'vedanta' ) ?>:
                    </div>
                    <!-- Title -->

                    <!-- Text -->
                    <div class="name map-info-socials">
                        <?= do_shortcode( '[socials]' ) ?>
                    </div>
                    <!-- End Text -->

                </div>
                <!-- End Socials -->

            </div>
            <!-- end wrap -->

        </div>
        <!-- end info -->

    </section>
    <!-- End Contacts Section -->
<?php endif; ?>





