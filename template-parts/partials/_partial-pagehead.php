<?php
/*
 * Partial: Page Head
 */
if ( ! defined('ABSPATH')) :
    exit();
endif;
?>
<!-- Page Head -->
<section class="top-banner">

    <!-- Background -->
    <div class="top-banner-bg">
		<?php
		/**
		 * Default Image
		 */
		$bannerSrc = get_template_directory_uri() . "/assets/images/banners/banner01.png";

		if ( is_product_category() ) :

			/**
			 * Category Banner
			 */
			global $wp_query;
			$cat            = $wp_query->get_queried_object();
			$thumbnail_id   = get_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image_url      = wp_get_attachment_url( $thumbnail_id );

			/**
			 * @true
			 */
			if( $image_url ) :
				$bannerSrc = $image_url;
			endif;

		else:

            if( is_archive() ) :

            else:

	            /**
	             * Pages Banner
	             */
	            if( has_post_thumbnail() ) :
		            $bannerSrc = get_the_post_thumbnail_url(get_the_ID(), 'full');
	            endif;

            endif;

        endif;
		?>
        <img
                src="<?= $bannerSrc ?>"
                alt="<?= get_the_title() ?>"
                title="<?= get_the_title() ?>"
        >
    </div>
    <!-- End Background -->

    <?= get_template_part( 'template-parts/partials/_partial', 'breadcrumbs' ) ?>

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="top-banner-title">
            <?php if($args['page_title']) : ?>

                <?= str_replace('\\', '', $args['page_title'] ) ?>

            <?php else: ?>

                <?php
                    $title = ( ! empty( get_field( 'page_title', get_the_ID() ) ) ) ? get_field( 'page_title', get_the_ID() ) : get_the_title();
                ?>
                <?= $title ?>

            <?php endif; ?>
        </div>
        <!-- End Title -->

        <?php if( has_excerpt() ) : ?>
        <!-- Except -->
        <div class="top-banner-subtitle">
            <?= the_excerpt() ?>
        </div>
        <!-- End Except -->
        <?php endif; ?>

        <?php if($args['page_excerpt']) : ?>
            <!-- Except -->
            <div class="top-banner-subtitle">
                <?= $args['page_excerpt'] ?>
            </div>
            <!-- End Except -->
        <?php endif; ?>

    </div>
    <!-- End Container -->

</section>
<!-- End Page Head -->
