<?php
if ( ! defined('ABSPATH')) :
	exit();
endif;



if( ! wp_doing_ajax() ) :
    global $product;

	/**
	 * Год
	 */
	$car_year_value_start = wp_get_post_terms( $product->get_id(), 'pa_ru-god-vypuska', [ 'fields' => 'names' ] )[0];
	$car_year_end       = ( $car_year_value_start <> 0 ) ? $car_year_value_start : 0;

	/**
	 * Объем
	 */
	$car_obem_value_start = wp_get_post_terms( $product->get_id(), 'pa_ru-obem', [ 'fields' => 'names' ] )[0];
	$car_obem_end       = ( $car_obem_value_start <> 0 ) ? $car_obem_value_start : 0;

	/**
	 * Тип авто
	 */
	$car_type_value_start = wp_get_post_terms( $product->get_id(), 'type_cars', [ 'fields' => 'ids' ] );
	$car_type_value_start = array_flip( $car_type_value_start );
	$car_type_end = key( $car_type_value_start );

	/**
	 * Тип топлива
	 */
	$car_oil_value_start = wp_get_post_terms( $product->get_id(), 'type_oil', [ 'fields' => 'ids' ] );
	$car_oil_value_start = array_flip( $car_oil_value_start );
	$car_oil_end = key( $car_oil_value_start );


	$args['product_id']         = $product->get_id();
	$args['product_price']      = $product->get_regular_price();
	$args['product_year']       = $car_year_end;
	$args['product_obem']       = $car_obem_end;
	$args['product_type']       = $car_type_end;
	$args['product_oil']        = $car_oil_end;

endif;

/**
 * @args
 */
extract($args);

/**
 * Product
 */
//$product    = wc_get_product( $product_id );
$calc       = get_field( 'carsunder-calc', 'options' );

/**
 * Config
 */
$config = [
	'rate'     => [ //Курс валют
		'UAH' => 1,
		'USD' => get_option('exchange_rate'),
		'EUR' => 32,
	],
	'category' => [
		204 => [ //Легковые автомобили
			'fee'     => [ //Ввозная (импортная) пошлина =  стоимость * 10%
				194 => 0.1, //Бензин (10%)
				195 => 0.1, //Дизель (10%)
				221 => 0,   //Гибрид (0%)
				197 => 0,   //Электрический (0%)
			],
			'tax'     => [  //Акцизный сбор
				194 => [ //Бензин
					'0,3000'    => 0.05, //Евро
					'3001,9999' => 0.1, //Евро
				],
				195 => [ //Дизель
					'0,3499'    => 0.075, //Евро
					'3500,9999' => 0.15, //Евро
				],
			],
			'nds'     => 0.2, //Налог на добавленную стоимость ( НДС 20%)
			'pension' => [ //Пенсионный фонд
				'0,305745'        => 0.03, //3%
				'305745,537369'   => 0.04, //4%
				'537370,999999999' => 0.05, //5%
			]
		],
		220 => [ //Электрические автомобили
			'fee'     => [ //Ввозная (импортная) пошлина =  стоимость * 10%
				194 => 0,   //Бензин (0%)
				195 => 0,   //Дизель (0%)
				221 => 0,   //Гибрид (0%)
				197 => 0,   //Электрический (0%)
			],
			'tax'     => [  //Акцизный сбор
				197 => [ //Электрический
					'0,9999'    => 1, //Евро
				],
			],
			'nds'     => 0.2, //Налог на добавленную стоимость ( НДС 20%)
			'pension' => [ //Пенсионный фонд
				'0,305745'        => 0.03, //3%
				'305745,537369'   => 0.04, //4%
				'537370,999999999' => 0.05, //5%
			]
		],
	],
];

/**
 * Default Value
 */
$car_year_start = 2005;                                                     //Минимальный год
$car_year_end   = date( 'Y' );                                              //Текущий год
$car_year       = date( 'Y' );                                              //Год автомобиля
$car_type       = 204;                                                      //Категория: Тип автомобиля (по умолчанию Легковые)
$car_oil        = 194;                                                      //Категория: Тип топлива (по умолчанию Бензин)
$car_obem       = 1600;                                                     //Объем двигателя
$car_cos        = 1;                                                        //Коэфициент
$car_price      = $product_price;                                           //Стоимость автомобиля
$car_price_uah  = $car_price * $config['rate']['USD'];                      //Цена автомомбиля в UAH
$calc_val_1     = $car_price * 0.10;                                        //Ввозная (импортная ) пошлина
$calc_val_2     = $car_obem * 0.05 * $car_cos;                              //Акцизный сбор

$calc_val_3_s   = $calc_val_1 + $calc_val_2;                                //Промежуточное
$calc_val_3     = ( $calc_val_3_s * 0.2 ) + $calc_val_3_s;                    //Налог на добавленную стоимость ( НДС )

$calc_val_4_s   = $car_price_uah * 0.03;                                    //Промежуточное
$calc_val_4     = $calc_val_4_s / $config['rate']['USD'];                   //Пенсионный фонд

$calc_total     = $calc_val_1 + $calc_val_2 + $calc_val_3 + $calc_val_4;    //Сумма растаможки


/**
 * Тип авто
 * @car_type
 */
//$car_type_value = wp_get_post_terms( $product->get_id(), 'type_cars', [ 'fields' => 'ids' ] );
//$car_type_value = array_flip( $car_type_value );
//$car_type_value = key( $car_type );
$car_type       = ( $product_type <> 0 ) ? $product_type : $car_type;

/**
 * Тип топлива
 * @car_oil
 */
//$car_oil_value = wp_get_post_terms( $product->get_id(), 'type_oil', [ 'fields' => 'ids' ] );
//$car_oil_value = array_flip( $car_oil_value );
//$car_oil_value = key( $car_oil_value );
$car_oil       = ( $product_oil <> 0 ) ? $product_oil : $car_oil;

/**
 * Year
 * @car_year
 */
//$car_year_value = wp_get_post_terms( $product->get_id(), 'pa_ru-god-vypuska', [ 'fields' => 'names' ] )[0];
$car_year       = ( $product_year <> 0 ) ? $product_year : $car_year;

/**
 * Объем
 * @car_obem
 */
//$car_obem_value = wp_get_post_terms( $product->get_id(), 'pa_ru-obem', [ 'fields' => 'names' ] )[0];
$car_obem_value = preg_replace( "/[^,.0-9]/", '', $product_obem );
$car_obem_value = $car_obem_value * 1000;
$car_obem       = ( $car_obem_value <> 0 ) ? $car_obem_value : $car_obem;

/**
 * Коэфициент
 * @car_cos
 */
$year_current = date( 'Y' ) + 1;
$year_car     = $year_current - $car_year;
if ( $year_car < 3 || $year_car == 3 ) :
	$car_cos = 1; //Автомобиль до 3 лет
else:
	$car_cos = ( $year_car - 3 ) + 1;
	if ( $car_cos < 15 ) : //Автомобиль между 3 и 15 лет

	else:
		$car_cos = 15; //Автомобиль больше 15 лет
	endif;
endif;

/**
 * Calc Растаможка
 */

/**
 * Ввозная (импортная ) пошлина = стоимость * %s
 * @calc_val_1
 */
if ( array_key_exists( $car_type, $config['category'] ) ) :

	if ( array_key_exists( $car_oil, $config['category'][ $car_type ]['fee'] ) ) :

		$calc_val_1 = $car_price * $config['category'][ $car_type ]['fee'][ $car_oil ];

	endif;

endif;


/**
 * Акцизный сбор
 * @calc_val_2
 */
if ( array_key_exists( $car_type, $config['category'] ) ) :

	if ( array_key_exists( $car_oil, $config['category'][ $car_type ]['tax'] ) ) :

		foreach ( $config['category'][ $car_type ]['tax'][ $car_oil ] as $key => $val ) :

			$range = explode( ',', $key );
			if ( in_array( $car_obem, range( $range[0], $range[1] ) ) ) :
				$calc_val_2 = $val;
				$calc_val_2 = $car_obem * $calc_val_2 * $car_cos;
				break;
			endif;

		endforeach;

	endif;

endif;
/**
 * Налог на добавленную стоимость ( НДС )
 * @calc_val_3
 */
if ( array_key_exists( $car_type, $config['category'] ) ) :

	$calc_val_3_s = $calc_val_1 + $calc_val_2;
	$calc_val_3   = ( $calc_val_3_s * $config['category'][ $car_type ]['nds'] ) + $calc_val_3_s;

endif;

/**
 * Пенсионный фонд
 * @calc_val_4
 */
if ( array_key_exists( $car_type, $config['category'] ) ) :

	foreach ( $config['category'][ $car_type ]['pension'] as $key => $val ) :

		$range = explode( ',', $key );

		if ( $car_price_uah >= $range[0] && $car_price_uah <= $range[1] ) :
			$calc_val_4 = $val;
			$calc_val_4 = $car_price_uah * $val;
			$calc_val_4 = $calc_val_4 / $config['rate']['USD'];
			break;
		endif;

	endforeach;

endif;

/**
 * Сумма растаможки
 * @calc_total
 */
$calc_total = $calc_val_1 + $calc_val_2 + $calc_val_3 + $calc_val_4;


/**
 * Column
 */
$parametr_2 = $calc['carsunder-calc-expenses']['carsunder-calc-expenses-auction-comission']; //Комиссия аукциона
$parametr_3 = $calc['carsunder-calc-expenses']['carsunder-calc-expenses-delivery-port']; //Доставка в порт по территории Кореи
$parametr_4 = $calc['carsunder-calc-expenses']['carsunder-calc-expenses-documents']; //Подготовка и оформление экспортных документов
$parametr_5 = $calc['carsunder-calc-expenses']['carsunder-calc-expenses-services']; //Услуги трейдера

$parametr_6 = $calc['carsunder-calc-delivery']['carsunder-calc-delivery-delivery']; //Доставка из Южной Кореи
$parametr_7 = $calc['carsunder-calc-delivery']['carsunder-calc-delivery-prices']; //Экспедиторские услуги
$parametr_8 = ( $parametr_6 + $parametr_7 + $calc_total ); //Всего затрат

$parametr_9 = $calc['carsunder-calc-advent']['carsunder-calc-advent-certificate']; //Сертификация
$car_price0 = $calc['carsunder-calc-advent']['carsunder-calc-advent-forwarding']; //Экспедирование в порту
$car_price1 = $calc['carsunder-calc-advent']['carsunder-calc-advent-services']; //Брокерские услуги

/**
 *
 */
$sum_column_1 = ( $car_price + $parametr_2 + $parametr_3 + $parametr_4 + $parametr_5 );
$sum_column_2 = ( $car_price + $parametr_8 );
$sum_column_3 = ( $sum_column_1 + $parametr_9 + $car_price0 + $car_price1 + $parametr_8 );

?>


<?php if( wp_doing_ajax() ) : ?>

<!-- Row -->
<div class="cart-prises-row">

    <!-- Column -->
    <div class="cart-prises-column">

        <!-- Elem -->
        <div class="cart-prises-elem">

            <!-- Title -->
            <div class="title">
				<?= _e( 'Стоимость авто в Корее', 'vedanta' ) ?>
            </div>
            <!-- End Title -->

            <!-- SubTitle -->
            <div class="subtitle">
				<?= _e( 'Стоимость авто с учётом расходов в Корее', 'vedanta' ) ?>
            </div>
            <!-- End SubTitle -->

            <!-- List -->
            <ul class="cart-prices-column-list">
                <li>
                    <span><?= _e( 'Цена автомобиля', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($car_price, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Комиссия аукциона', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_2, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Доставка в порт по территории Кореи', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_3, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Подготовка и оформление экспортных документов', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_4, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Услуги трейдера', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_5, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Стоимость автомобиля в Корее', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($sum_column_1, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
            </ul>
            <!-- End List -->

        </div>
        <!-- End Elem -->

    </div>
    <!-- End Column -->

    <!-- Column -->
    <div class="cart-prises-column">

        <!-- Elem -->
        <div class="cart-prises-elem">

            <!-- Title -->
            <div class="title">
				<?= _e( 'Доставка и растаможка', 'vedanta' ) ?>
            </div>
            <!-- End Title -->

            <!-- SubTitle -->
            <div class="subtitle">
				<?= _e( 'Стоимость услуг в Украине', 'vedanta' ) ?>
            </div>
            <!-- End  SubTitle -->

            <!-- List -->
            <ul class="cart-prices-column-list">
                <li>
					<?= _e( 'Год выпуска автомобиля', 'vedanta' ) ?>
                </li>
                <li>
					<?php

					?>
                    <select id="calculatorSingleYear">
						<?php
						$i = 0;
						foreach (range($car_year_start, $car_year_end) as $number) {
							$year = ($i == 0) ? $number . ' и ранее' : $number;
							$select = ($car_year == $number) ? 'selected="selected"' : '';
							echo '<option ' . $select .' value="' . $number . '">' . $year . '</option>';
							$i++;
						};
						?>
                    </select>
                </li>
                <li>
                    <span><?= _e( 'Доставка из Южной Кореи', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_6, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Стоимость растаможки', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($calc_total, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Услуги', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_7, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Всего затрат', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_8, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Стоимость автомобиля в порту Одесса', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($sum_column_2, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
            </ul>
            <!-- End List -->

        </div>
        <!-- End Elem -->

    </div>
    <!-- End Column -->

    <!-- Column -->
    <div class="cart-prises-column">

        <!-- Elem -->
        <div class="cart-prises-elem">

            <!-- Title -->
            <div class="title">
				<?= _e( 'Стоимость авто', 'vedanta' ) ?>
            </div>
            <!-- End Title -->

            <!-- SubTitle -->
            <div class="subtitle">
				<?= _e( 'С учетом всех расходов', 'vedanta' ) ?>
            </div>
            <!-- End SubTitle -->

            <!-- List -->
            <ul class="cart-prices-column-list">
                <li>
                    <span><?= _e( 'Стоимость авто в Корее', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($sum_column_1, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Доставка и растаможка', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_8, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Экспедирование в порту', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($car_price0, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Брокерские услуги', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($car_price1, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Сертификация автомобиля', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($parametr_9, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
                <li>
                    <span><?= _e( 'Цена под ключ', 'vedanta' ) ?>:</span>
                    <span><?= (number_format($sum_column_3, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?></span>
                </li>
            </ul>
            <!-- End List -->

            <!-- Footer -->
            <div class="cart-prises-bottom">
                <button
                        class="cart-prices-submit modalForm"
                        data-type="order"
                        data-product="<?= $product_id ?>"

                >Купить авто</button>
            </div>
            <!-- End Footer -->

        </div>
        <!-- End Elem -->

    </div>
    <!-- End Column -->

</div>
<!-- End Row -->

<?php else: ?>

    <!-- Cost -->
    <div class="cart-cost">

        <!-- title -->
        <div class="cart-aside-title">
			<?= _e( 'Стоимость', 'vedanta' ) ?>:
        </div>
        <!-- end title -->

        <!-- row -->
        <div class="cart-cost-row">

        <span class="cart-cost-column">
            <?= _e( 'Авто под ключ в Украине', 'vedanta' ) ?>
        </span>

            <span class="cart-cost-column">
            <?= (number_format($sum_column_3, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?>
        </span>

        </div>
        <!-- end row -->


            <!-- row -->
            <div class="cart-cost-row">

        <span class="cart-cost-column">
            <?= _e( 'Авто в Корее', 'vedanta' ) ?>
        </span>

                <span class="cart-cost-column">
            <?= (number_format($sum_column_1, 0, '.', ' ') . ' ') . get_woocommerce_currency_symbol() ?>
        </span>

            </div>
            <!-- end row -->


        <!-- row -->
        <div class="cart-cost-row cart-cost-text">

        <span class="cart-cost-column">
            * <?= _e( 'Стоимость авто с учётом расходов в Корее', 'vedanta' ) ?>
        </span>

            <span class="cart-cost-column"></span>
        </div>
        <!-- end row -->

        <!-- row -->
        <div
                class="cart-cost-btn cart-cost-consultation modalForm"
                data-type="order"
                data-product="<?= $product->get_id() ?>"
        >
			<?= _e( 'Купить авто', 'vedanta' ) ?>
        </div>
        <!-- end row -->

    </div>
    <!-- End Cost -->

<?php endif; ?>
