<?php 
/*
 * Home: Team
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;
?>

<?php if( ! get_field( 'home-team-hide', get_the_ID() ) ) : ?>
    <!-- Promo Section -->
    <section class="team silver-bg">

        <!-- container -->
        <div class="container">

            <?php if( ! empty( get_field( 'home-team-title' ) ) ) : ?>
                <!-- title -->
                <div class="h2 section-title team-title">
                    <?= get_field( 'home-team-title' ) ?>
                </div>
                <!-- end title -->
            <?php endif; ?>

            <?php
            $teams = get_field( 'home-team-list' );
            if( $teams ) :
            ?>
            <!-- Slider -->
            <div class="team-slider">

                <!-- container -->
                <div class="swiper-container">

                    <!-- wrapper -->
                    <div class="swiper-wrapper">

                        <?php foreach ($teams as $post) : setup_postdata($post); ?>
                            <!-- Slide -->
                            <div class="swiper-slide">

                                <?php if( has_post_thumbnail() ) : ?>
                                    <!-- Image -->
                                    <div class="team-slide-img">
                                        <?= kama_thumb_img( 'w=361 &h=361' ) ?>
                                    </div>
                                    <!-- End Image -->
                                <?php endif; ?>

                                <!-- subtitle -->
                                <div class="team-slide-subtitle">
                                    <?= get_the_title() ?>
                                </div>
                                <!-- end subtitle -->

                                <!-- title -->
                                <div class="team-slide-title">
                                    <?= get_the_content() ?>
                                </div>
                                <!-- end title -->

                            </div>
                            <!-- End Slide -->
                        <?php endforeach; wp_reset_postdata(); ?>

                    </div>
                    <!-- end wrapper -->

                </div>
                <!-- end container -->

            </div>
            <!-- End Slider -->
            <?php endif; ?>

        </div>
        <!-- end container -->

    </section>
    <!-- End Promo Section -->
<?php endif; ?>





