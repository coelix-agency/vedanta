<?php 
/*
 * Home: Filter
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;


//echo do_shortcode( '[br_filters_group group_id=580]' );


/**
 * Get Terms Brands
 * @get_terms()
 */
$brands = get_terms(
	[
		'taxonomy' => 'brands'
	]
);

/**
 * Min and Max Price
 * @woocommerce_get_price()
 */
$min_max_price = woocommerce_get_price();

/**
 * Min and Max Year
 * @woocommerce_get_year()
 */
$min_max_year = woocommerce_get_year();

/**
 * Models
 * @get_terms()
 */
$models = get_terms(
	[
		'taxonomy' => 'pa_ru-model'
	]
);
?>

<?php if( ! get_field( 'home-filter-hide', get_the_ID() ) ) : ?>
    <!-- Section -->
    <section class="filter-section silver-bg">

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <h2 class="section-title filter-title">
                <?= _e( 'Подберите автомобиль', 'vedanta' ) ?>
            </h2>
            <!-- End Title -->

            <!-- form -->
            <form action="<?= get_category_link( 25 ) ?>" data-action="<?= get_category_link( 25 ) ?>" method="post" class="filterHome">

                <input type="hidden" name="action" value="filter_home">

                <!-- Filter -->
                <div class="filter">

		            <?php if($brands) : ?>
                        <!-- Row -->
                        <div class="filter-elem">

                            <!-- wrapper -->
                            <div class="filter-item-wrapper">

                                <!-- item -->
                                <div class="filter-item">
						            <?= _e( 'Марка автомобиля', 'vedanta' ) ?>
                                    <div class="filter-arrow">
                                        <img
                                                src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg"
                                                alt=""
                                                title=""
                                                class="svg"
                                        >
                                    </div>
                                </div>
                                <!-- end item -->

                                <!-- dropdown -->
                                <div class="filter-dropdown">

                                    <!-- wraper -->
                                    <div class="filter-dropdown-wraper">

                                        <!-- list -->
                                        <ul class="filter-dropdown_list filterItem" id="filterItemBrands">

                                            <input
                                                    type="checkbox"
                                                    class="option-input checkbox allFilterChecked"
                                                    id="brand-0"
                                                    data-type="brand"
                                            />
                                            <label for="brand-0">
                                                <span></span>
									            <?= _e( 'Все', 'vedanta' ) ?>
                                            </label>

								            <?php foreach ($brands as $brand) : ?>
                                                <input
                                                        type="checkbox"
                                                        class="option-input checkbox allFilterUnChecked"
                                                        data-id="<?= $brand->term_id ?>"
                                                        data-type="brand"
                                                        id="brand-<?= $brand->term_id ?>"
                                                        name="brands[]"
                                                        value="<?= $brand->term_id ?>"
                                                />
                                                <label for="brand-<?= $brand->term_id ?>">
                                                    <span></span>
										            <?= $brand->name ?>
                                                </label>
								            <?php endforeach; ?>

                                        </ul>
                                        <!-- end list -->

                                    </div>
                                    <!-- end wraper -->

                                </div>
                                <!-- end dropdown -->

                            </div>
                            <!-- end wrapper -->

                        </div>
                        <!-- End Row -->
		            <?php endif; ?>

	                <?php if($models) : ?>
                    <!-- Row -->
                    <div class="filter-elem">

                        <!-- wrapper -->
                        <div class="filter-item-wrapper">

                            <!-- item -->
                            <div class="filter-item">
					            <?= _e( 'Модель', 'vedanta' ) ?>
                                <div class="filter-arrow">
                                    <img src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg" alt="" title="" class="svg">
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- dropdown -->
                            <div class="filter-dropdown">

                                <!-- wraper -->
                                <div class="filter-dropdown-wraper">

                                    <!-- list -->
                                    <ul class="filter-dropdown_list filterItem" id="filterItemModels">

                                        <input
                                                type="checkbox"
                                                class="option-input checkbox allFilterChecked"
                                                id="model-0"
                                                data-type="model"
                                        />
                                        <label for="model-0">
                                            <span></span>
		                                    <?= _e( 'Все', 'vedanta' ) ?>
                                        </label>

	                                    <?php foreach ($models as $model) : ?>
                                            <?php
		                                    $name = $model->name;
		                                    if(strripos($model->name, wpm_get_language())) {
			                                    if (preg_match('!\[:' . wpm_get_language() . ']([^\)]+)\[!', $name, $match)) {
				                                    $name = $match[1];
				                                    $name = strtok($name, '[');
			                                    }
		                                    }
                                            ?>
                                            <input
                                                    type="checkbox"
                                                    class="option-input checkbox allFilterUnChecked"
                                                    data-id="<?= $model->term_id ?>"
                                                    data-type="model"
                                                    id="model-<?= $model->term_id ?>"
                                                    name="models[]"
                                                    value="<?= $model->term_id ?>"
                                            />
                                            <label for="model-<?= $model->term_id ?>">
                                                <span></span>
			                                    <?= $name ?>
                                            </label>
	                                    <?php endforeach; ?>

                                    </ul>
                                    <!-- end list -->

                                </div>
                                <!-- end wraper -->

                            </div>
                            <!-- end dropdown -->

                        </div>
                        <!-- end wrapper -->

                    </div>
                    <!-- End Row -->
	                <?php endif; ?>

                    <!-- Row -->
                    <div class="filter-elem">

                        <!-- wrapper -->
                        <div class="filter-item-wrapper">

                            <!-- item -->
                            <div class="filter-item">
					            <?= _e( 'Год', 'vedanta' ) ?>
                                <div class="filter-arrow">
                                    <img src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg" alt="" title="" class="svg">
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- dropdown -->
                            <div class="filter-dropdown">

                                <!-- wraper -->
                                <div class="filter-dropdown-wraper">

                                    <!-- list -->
                                    <ul class="filter-dropdown_list filterRange" id="filterRangeYear">
                                        <li class="filter-dropdown-range">
                                            <div class="inputs">
                                                <input name="min" type="text" value="<?= $min_max_year['min'] ?>">
                                                <input name="max" type="text" value="<?= $min_max_year['max'] ?>">
                                            </div>
                                            <div class="range">
                                                <div class="range-body">
                                                    <div class="range-line"></div>
                                                    <span class="range-handler range-min"></span>
                                                    <span class="range-handler range-max"></span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end list -->

                                </div>
                                <!-- end wraper -->

                            </div>
                            <!-- end dropdown -->

                        </div>
                        <!-- end wrapper -->

                    </div>
                    <!-- End Row -->

                    <!-- Row -->
                    <div class="filter-elem">

                        <!-- wrapper -->
                        <div class="filter-item-wrapper">

                            <!-- item -->
                            <div class="filter-item">
					            <?= _e( 'Статус', 'vedanta' ) ?>
                                <div class="filter-arrow">
                                    <img src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg" alt="" title="" class="svg">
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- dropdown -->
                            <div class="filter-dropdown">

                                <!-- wraper -->
                                <div class="filter-dropdown-wraper">

                                    <!-- list -->
                                    <ul class="filter-dropdown_list filterItem" id="filterItemStock">

                                        <input
                                                type="checkbox"
                                                class="option-input checkbox filterItemStockChange"
                                                id="stock-instock"
                                                value="<?= get_category_link( 25 ) ?>"
                                        />
                                        <label for="stock-instock">
                                            <span></span>
		                                    <?= _e( 'В наличии', 'vedanta' ) ?>
                                        </label>

                                        <input
                                                type="checkbox"
                                                class="option-input checkbox filterItemStockChange"
                                                id="stock-outofstock"
                                                value="<?= get_category_link( 26 ) ?>"
                                        />
                                        <label for="stock-outofstock">
                                            <span></span>
		                                    <?= _e( 'В пути', 'vedanta' ) ?>
                                        </label>

                                        <input
                                                type="checkbox"
                                                class="option-input checkbox filterItemStockChange"
                                                id="stock-onbackorder"
                                                value="<?= get_category_link( 25 ) ?>"
                                        />
                                        <label for="stock-onbackorder">
                                            <span></span>
		                                    <?= _e( 'Под заказ', 'vedanta' ) ?>
                                        </label>

                                    </ul>
                                    <!-- end list -->

                                </div>
                                <!-- end wraper -->

                            </div>
                            <!-- end dropdown -->

                        </div>
                        <!-- end wrapper -->

                    </div>
                    <!-- End Row -->

                    <!-- Row -->
                    <div class="filter-elem">

                        <!-- wrapper -->
                        <div class="filter-item-wrapper">

                            <!-- item -->
                            <div class="filter-item">
					            <?= _e( 'Цена', 'vedanta' ) ?> ($)
                                <div class="filter-arrow">
                                    <img src="<?= get_template_directory_uri() ?>/assets/images/icons/promo-right-arrow.svg" alt="" title="" class="svg">
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- dropdown -->
                            <div class="filter-dropdown">

                                <!-- wraper -->
                                <div class="filter-dropdown-wraper">

                                    <!-- list -->
                                    <ul class="filter-dropdown_list filterRange" id="filterRangePrice">
                                        <li class="filter-dropdown-range">
                                            <div class="inputs">
                                                <input name="min" type="text" value="<?= $min_max_price['min'] ?>">
                                                <input name="max" type="text" value="<?= $min_max_price['max'] ?>">
                                            </div>
                                            <div class="range">
                                                <div class="range-body">
                                                    <div class="range-line"></div>
                                                    <span class="range-handler range-min"></span>
                                                    <span class="range-handler range-max"></span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end list -->

                                </div>
                                <!-- end wraper -->

                            </div>
                            <!-- end dropdown -->

                        </div>
                        <!-- end wrapper -->

                    </div>
                    <!-- End Row -->

                    <!-- Row -->
                    <div class="filter-elem">
                        <button
                                class="filter-submit"
                                disabled="disabled"
                                type="submit"
                        >
				            <?= _e( 'Подобрать автомобиль', 'vedanta' ) ?>
                        </button>
                    </div>
                    <!-- End Row -->

                </div>
                <!-- End Filter -->

            </form>
            <!-- end form -->

        </div>
        <!-- End Container -->

    </section>
    <!-- End Section -->
<?php endif; ?>





