<?php 
/*
 * Home: Feedback
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;

$id_page = ($args && array_key_exists('page_id', $args) && !empty( $args['page_id'] )) ? $args['page_id'] : get_the_ID();

?>

<?php if( ! get_field( 'home-feedback-hide', $id_page ) ) : ?>

    <!-- Feedback Section -->
    <section class="lead-section silver-bg">

        <!-- container -->
        <div class="container">

            <!-- col -->
            <div class="section-left-col main">

                <!-- header -->
                <div class="section-left-col_header">

                    <?php if( ! empty( get_field( 'home-feedback-title', $id_page ) ) ) : ?>
                    <!-- title -->
                    <h2 class="section-title section-left-title">
                        <?= get_field( 'home-feedback-title', $id_page ) ?>
                    </h2>
                    <!-- end title -->
                    <?php endif; ?>

                    <?php if( ! empty( get_field( 'home-feedback-text', $id_page ) ) ) : ?>
                    <!-- subtitle -->
                    <p class="section-left-subtitle">
                        <?= get_field( 'home-feedback-text', $id_page ) ?>
                    </p>
                    <!-- end subtitle -->
                    <?php endif; ?>

                </div>
                <!-- end header -->

            </div>
            <!-- end col -->

            <!-- col -->
            <div class="section-right-col">

                <?= get_template_part('template-parts/forms/_form', 'faq'); ?>

            </div>
            <!-- end col -->

        </div>
        <!-- end container -->

    </section>
    <!-- End Feedback Section -->

<?php endif; ?>





