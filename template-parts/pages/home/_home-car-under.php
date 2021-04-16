<?php 
/*
 * Home: Car Under
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;

?>

<?php if( ! get_field( 'home-car-under-hide', get_the_ID() ) ) : ?>


    <?php
    $products = get_field( 'home-car-under-list' );
    if($products) :
        ?>

        <!-- Cars Section -->
        <section class="goods-ready goods-post">

            <!-- container -->
            <div class="container">

                <!-- Col -->
                <div class="section-left-col main">

                    <!-- Header -->
                    <div class="section-left-col_header">

                        <?php if( ! empty( get_field( 'home-car-under-title' ) ) ) : ?>
                            <!-- Title -->
                            <h2 class="section-title section-left-title">
                                <?= get_field( 'home-car-under-title' ) ?>
                            </h2>
                            <!-- End Title -->
                        <?php endif; ?>

                        <?php if( ! empty( get_field( 'home-car-under-text' ) ) ) : ?>
                            <!-- Subtitle -->
                            <p class="section-left-subtitle">
                                <?= get_field( 'home-car-under-text' ) ?>
                            </p>
                            <!-- End Subtitle -->
                        <?php endif; ?>

                    </div>
                    <!-- End Header -->

                    <a href="<?= get_category_link( 26 ) ?>" class="go-catalog aside-btn">
                        <?= _e( 'Смотреть все', 'vedanta' ) ?>
                    </a>

                </div>
                <!-- End Col -->

                <!-- Col -->
                <div class="section-right-col">

                    <!-- container -->
                    <div class="swiper-container">

                        <!-- wrapper -->
                        <div class="swiper-wrapper">

                            <?php foreach ($products as $prod) : $product = wc_get_product( $prod ); ?>

                                <!-- slide -->
                                <a href="<?= the_permalink($product->get_ID()) ?>" class="swiper-slide">

                                    <!-- wrap -->
                                    <div class="goods-image-wrap">
                                        <img
                                                src="<?= kama_thumb_src('w=340 &h=400 &attach_id='.get_post_thumbnail_id($product->get_id())) ?>"
                                                alt="<?= $product->get_title() ?>"
                                                title="<?= $product->get_title() ?>"
                                        >
                                    </div>
                                    <!-- end wrap -->

                                    <!-- description -->
                                    <div class="goods-ready-slide-description">

                                        <!-- title -->
                                        <div class="goods-ready-slide-title">

                                            <!-- Name -->
                                            <div class="name">
                                                <?= $product->get_title() ?>
                                            </div>
                                            <!-- End Name -->

                                            <!-- Price -->
                                            <div class="price">
                                                <?= (number_format($product->get_regular_price(), 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?>
                                            </div>
                                            <!-- End Price -->

                                        </div>
                                        <!-- end title -->

                                        <!-- subtitle -->
                                        <div class="goods-ready-slide-subtitle">
                                            <?php
                                            $atributes = get_field('set-loop-chars', 'option');
                                            ?>
                                            <?php if($atributes) : ?>
                                                <!-- wrap -->
                                                <div class="wrap">

                                                    <?php foreach ($atributes as $atribute) : ?>
                                                        <?php
                                                        $attr = wc_get_attribute($atribute['set-loop-chars-attr']);
                                                        $attr = $product->get_attribute( $attr->slug );
                                                        if($attr) :
                                                            ?>
                                                            <!-- item -->
                                                            <div class="item">
                                                                <?php if( ! empty( $atribute['set-loop-chars-icon'] ) ) : ?>
                                                                    <!-- image -->
                                                                    <div class="image">
                                                                        <img
                                                                                src="<?= $atribute['set-loop-chars-icon'] ?>"
                                                                                alt=""
                                                                                class="svg"
                                                                        >
                                                                    </div>
                                                                    <!-- end image -->
                                                                <?php endif; ?>
                                                                <?= $attr ?>
                                                            </div>
                                                            <!-- end item -->
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>

                                                </div>
                                                <!-- end wrap -->
                                            <?php endif; ?>

                                        </div>
                                        <!-- end subtitle -->

                                    </div>
                                    <!-- end description -->

                                </a>
                                <!-- end slide -->

                            <?php endforeach; ?>

                        </div>
                        <!-- end wrapper -->

                    </div>
                    <!-- end container -->

					<!-- mobile-show-all-->
					<div class="mobile-show-all">
						<a href="<?= get_category_link( 26 ) ?>"><?= _e( 'Смотреть все', 'vedanta' ) ?></a>
					</div>
					<!-- end mobile-show-all-->

                </div>
                <!-- End Col -->

            </div>
            <!-- end container -->

        </section>
        <!-- End Cars Section -->

    <?php endif; ?>


<?php endif; ?>





