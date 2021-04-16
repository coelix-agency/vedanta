<?php
/*
 * Form: Callback
 */
if ( ! defined('ABSPATH')) :
    exit();
endif;
?>

<div class="popup" style="max-width: 600px">

	<!-- Header -->
	<div class="popup__header">

        <!-- Header > Title -->
		<h3 class="popup__header-title">
			<?= _e( 'Получить консультацию', 'vedanta' ) ?>
		</h3>
        <!-- End Header > Title -->

	</div>
	<!-- End Header -->

	<!-- Content -->
	<div class="popup__content">
		<?= do_shortcode('[contact-form-7 id="2311" title="Получить консультацию" html_class="lead-form"]') ?>
	</div>
	<!-- End Content -->

</div>