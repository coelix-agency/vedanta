<?php
/*
 * Partial: Breadcrumbs
 */
if ( ! defined('ABSPATH')) :
    exit();
endif;
?>

<!-- Breadcrumb -->
<div class="breadcrumb">

    <!-- container -->
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
    <!-- end container -->

</div>
<!-- End Breadcrumb -->
