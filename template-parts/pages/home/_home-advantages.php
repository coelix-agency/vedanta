<?php 
/*
 * Home: Advantages
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;
?>

<?php if( ! get_field( 'home-advantages-hide', get_the_ID() ) ) : ?>
    <!-- Advantages Section -->
    <section class="advantages silver-bg">

        <!-- container -->
        <div class="container">

            <?php if( ! empty( get_field( 'home-advantages-title' ) ) ) : ?>
            <!-- Title -->
            <h2 class="section-title advantages-title">
                <?= get_field( 'home-advantages-title' ) ?>
            </h2>
            <!-- End Title -->
            <?php endif; ?>

            <?php if( have_rows('home-advantages-list') ) : ?>
            <!-- List -->
            <div class="advantages-list">

                <?php while ( have_rows('home-advantages-list') ) : the_row(); ?>
                    <!-- Item -->
                    <div class="advantages-item">

                        <!-- Icon -->
                        <?= get_sub_field('home-advantages-list-icon') ?>
                        <!-- End Icon -->

                        <!-- Title -->
                        <h3 class="description__title">
                            <?= get_sub_field('home-advantages-list-title') ?>
                        </h3>
                        <!-- End Title -->

                        <!-- Text -->
                        <p class="description__text">
                            <?= get_sub_field('home-advantages-list-text') ?>
                        </p>
                        <!-- End Text -->

                    </div>
                    <!-- End Item -->
                <?php endwhile; ?>

            </div>
            <!-- End List -->
            <?php endif; ?>

            <!-- Wrap -->
            <div class="hero__brands-wrap"></div>
            <!-- End Wrap -->

        </div>
        <!-- end container -->

    </section>
    <!-- End Advantages Section -->
<?php endif; ?>





