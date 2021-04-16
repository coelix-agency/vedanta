<?php 
/*
 * Page: Text
 */
if ( ! defined('ABSPATH')) :
	exit();
endif;
?>

<?= get_template_part( 'template-parts/partials/_partial', 'pagehead', [] ) ?>

<!-- About Page -->
<section class="about-section">

    <!-- container -->
    <div class="container">

        <!-- content -->
        <div class="about-content">
            <?= the_content() ?>
        </div>
        <!-- end content -->

    </div>
    <!-- end container -->

</section>
<!-- End About Page -->
