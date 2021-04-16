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
			<?= _e( 'Обратный звонок', 'vedanta' ) ?>
		</h3>
        <!-- End Header > Title -->

	</div>
	<!-- End Header -->

	<!-- Content -->
	<div class="popup__content">
		<?= do_shortcode('[contact-form-7 id="2309" title="Обратный звонок" html_class="lead-form"]') ?>
	</div>
	<!-- End Content -->

</div>