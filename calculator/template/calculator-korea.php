<?php
if ( ! defined('ABSPATH')) :
	exit();
endif;

/**
 * @args
 */
extract($args);
?>

<!-- Select Car (Автомобиль) -->
<div class="about-select">

    <!-- Col -->
    <div class="section-left-col">

        <!-- Title -->
        <div class="title">
            <?= $marka_car ?> <span class="main-color"><?= $model_car ?></span>
        </div>
        <!-- End Title -->

        <!-- Sub Title -->
        <div class="subtitle">
	        <?= _e( 'Чтобы правильно рассчитать растаможку', 'vedanta' ) ?>
        </div>
        <!-- End Sub Title -->

    </div>
    <!-- End Col -->

    <!-- Col -->
    <div class="section-right-col">

        <!-- Table -->
        <div class="info-table">

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
                    <?= _e( 'Ввозная (импортная) пошлина', 'vedanta' ) ?> 10%
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
                    <?= round($importDuty) ?> USD / <?= round($importDutyUAH) ?> UAH
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
	                <?= _e( 'Акцизный сбор', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
	                <?= round($exciseTax) ?> USD / <?= round($exciseTaxUAH) ?> UAH
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
	                <?= _e( 'Налог на добавленную стоимость (НДС)', 'vedanta' ) ?> 20%
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
	                <?= round($vat) ?> USD / <?= round($vatUAH) ?> UAH
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
	                <?= _e( 'Всего таможенных платежей', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
	                <?= round($allCalc) ?> USD / <?= round($allCalcUAH) ?> UAH
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
	                <?= _e( 'Дополнительные расходы', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">

                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
	                <?= _e( 'Пенсионный фонд', 'vedanta' ) ?> 4%
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
	                <?= round($pensionFund) ?> USD / <?= round($pensionFundUAH) ?> UAH
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

        </div>
        <!-- End Table -->

    </div>
    <!-- End Col -->

</div>
<!-- End Select Car -->

<!-- Select Expenses (Расходы в Корее) -->
<div class="about-select">

    <!-- Col -->
    <div class="section-left-col">

        <!-- Title -->
        <div class="title">
			<?= _e( 'Расходы в <span class="main-color">Корее</span>', 'vedanta' ) ?>
        </div>
        <!-- End Title -->

        <!-- Sub Title -->
        <div class="subtitle">
			<?= _e( 'Чтобы правильно рассчитать растаможку', 'vedanta' ) ?>
        </div>
        <!-- End Sub Title -->

    </div>
    <!-- End Col -->

    <!-- Col -->
    <div class="section-right-col">

        <!-- Table -->
        <div class="info-table">

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Цена авто', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($price) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Комиссия аукциона', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($koreanAuctionTax) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Доставка в порт по территории Кореи', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($toKoreanPort) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Подготовка и оформление экспортных документов', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($prepareDocuments) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Услуги трейдера', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
	                <?= round($traderService) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

        </div>
        <!-- End Table -->

    </div>
    <!-- End Col -->

</div>
<!-- Select End Expenses -->

<!-- Select Delivery (Доставка морем) -->
<div class="about-select">

    <!-- Col -->
    <div class="section-left-col">

        <!-- Title -->
        <div class="title">
	        <?= _e( 'Доставка <span class="main-color">морем</span>', 'vedanta' ) ?>
        </div>
        <!-- End Title -->

        <!-- Sub Title -->
        <div class="subtitle">
			<?= _e( 'Чтобы правильно рассчитать растаможку', 'vedanta' ) ?>
        </div>
        <!-- End Sub Title -->

    </div>
    <!-- End Col -->

    <!-- Col -->
    <div class="section-right-col">

        <!-- Table -->
        <div class="info-table">

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Доставка морем', 'vedanta' ) ?> 10%
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($seaDelivery) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Стоимость услуг', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($serviceCost) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Всего затрат', 'vedanta' ) ?> 20%
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($seaDelivery + $serviceCost) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
                    <?= _e( 'Стоимость автомобиля в порту <span class="main-color">Одесса</span>', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($price + $traderService + $seaDelivery + $serviceCost + $koreanAuctionTax + $toKoreanPort + $prepareDocuments) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

        </div>
        <!-- End Table -->

    </div>
    <!-- End Col -->

</div>
<!-- Select End Expenses -->

<!-- Select Costs (Расходы по прибытию) -->
<div class="about-select">

    <!-- Col -->
    <div class="section-left-col">

        <!-- Title -->
        <div class="title">
	        <?= _e( 'Расходы по <span class="main-color">прибытию</span>', 'vedanta' ) ?>
        </div>
        <!-- End Title -->

        <!-- Sub Title -->
        <div class="subtitle">
			<?= _e( 'Чтобы правильно рассчитать растаможку', 'vedanta' ) ?>
        </div>
        <!-- End Sub Title -->

    </div>
    <!-- End Col -->

    <!-- Col -->
    <div class="section-right-col">

        <!-- Table -->
        <div class="info-table">

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
                    <?= _e( 'Экспедирование в порту <span class="main-color">Одесса</span>', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($portForwarding) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Брокерские услуги', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($brokerageServices) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Таможенные платежи', 'vedanta' ) ?> 20%
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($allCalc) ?> USD / <?= round($allCalcUAH) ?> UAH
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Сертификация автомобиля', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($sertivicate) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Пенсионный фонд (первая регистрация)', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
	                <?= round($pensionFund) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

            <!-- row -->
            <div class="info-table-row">

                <!-- item -->
                <div class="info-item">
					<?= _e( 'Цена автомобиля <span class="main-color">под ключ</span>', 'vedanta' ) ?>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="info-item">
					<?= round($price + $traderService + $seaDelivery + $serviceCost + $portForwarding + $brokerageServices + $allCalc + $sertivicate + $pensionFund + $koreanAuctionTax + $prepareDocuments + $toKoreanPort) ?> USD
                </div>
                <!-- end item -->

            </div>
            <!-- end row -->

        </div>
        <!-- End Table -->

    </div>
    <!-- End Col -->

</div>
<!-- Select End Expenses -->

<!-- Save Pdf Btn -->
<div class="about-select">

    <!-- Col -->
    <div class="section-left-col">

    </div>
    <!-- End Col -->

    <!-- Col -->
    <div class="section-right-col">

        <a href="#save" class="btn btn-pdf" onclick="savePDF()">
		    <?= _e( 'Скачать PDF', 'vedanta' ) ?>
        </a>

    </div>
    <!-- End Col -->

</div>
<!-- End Save Pdf Btn -->