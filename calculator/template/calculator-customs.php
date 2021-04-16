<?php
if ( ! defined('ABSPATH')) :
	exit();
endif;

/**
 * @args
 */

extract($args);
?>

<!-- Col -->
<div class="section-left-col">

	<!-- Title -->
	<div class="title">
		<?= _e( 'Расчет <span class="main-color">стоимости</span>', 'vedanta' ) ?>
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

		<!-- Table > Row -->
		<div class="info-table-row">

			<!-- Item -->
			<div class="info-item">
				<?= _e( 'Ввозная (импортная) пошлина', 'vedanta' ) ?> 10%
			</div>
			<!-- End Item -->

			<!-- Item -->
			<div class="info-item">
				<?= round($importDuty) ?> <?= $currentCurrensy ?> / <?= round($importDutyUAH) ?> UAH
			</div>
			<!-- End Item -->

		</div>
		<!-- End Table > Row -->

		<!-- Table > Row -->
		<div class="info-table-row">

			<!-- Item -->
			<div class="info-item">
				<?= _e( 'Акцизный сбор', 'vedanta' ) ?>
			</div>
			<!-- End Item -->

			<!-- Item -->
			<div class="info-item">
				<?= round($exciseTax) ?> <?= $currentCurrensy ?> / <?= round($exciseTaxUAH) ?> UAH
			</div>
			<!-- End Item -->

		</div>
		<!-- End Table > Row -->

		<!-- Table > Row -->
		<div class="info-table-row">

			<!-- Item -->
			<div class="info-item">
				<?= _e( 'Налог на добавленную стоимость (НДС)', 'vedanta' ) ?> 20%
			</div>
			<!-- End Item -->

			<!-- Item -->
			<div class="info-item">
				<?= round($vat) ?> <?= $currentCurrensy ?> / <?= round($vatUAH) ?> UAH
			</div>
			<!-- End Item -->

		</div>
		<!-- End Table > Row -->

		<!-- Table > Row -->
		<div class="info-table-row">

			<!-- Item -->
			<div class="info-item">
				<?= _e( 'Всего таможенных платежей', 'vedanta' ) ?>
			</div>
			<!-- End Item -->

			<!-- Item -->
			<div class="info-item">
				<?= round($allCalc) ?> <?= $currentCurrensy ?> / <?= round($allCalcUAH) ?> UAH
			</div>
			<!-- End Item -->

		</div>
		<!-- End Table > Row -->

		<!-- Table > Row -->
		<div class="info-table-row">

			<!-- Item -->
			<div class="info-item">
				<?= _e( 'Дополнительные расходы', 'vedanta' ) ?>
			</div>
			<!-- End Item -->

			<!-- Item -->
			<div class="info-item">

			</div>
			<!-- End Item -->

		</div>
		<!-- End Table > Row -->

		<!-- Table > Row -->
		<div class="info-table-row">

            <!-- Item -->
			<div class="info-item">
				<?= _e( 'Пенсионный фонд', 'vedanta' ) ?> 4%
            </div>
            <!-- End Item -->

            <!-- Item -->
			<div class="info-item">
				<?= round($pensionFund) ?> <?= $currentCurrensy ?> / <?= round($pensionFundUAH) ?> UAH
            </div>
            <!-- End Item -->

		</div>
		<!-- End Table > Row -->

	</div>
	<!-- End Table -->

</div>
<!-- End Col -->