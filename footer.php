<?php
defined( 'ABSPATH' ) || exit;
/**
 * The footer for our theme
 * @package vedanta
 */
?>
        </main>
</div>
        <!-- END CONTENT-->

        <?php
        /**
         * footer_parts hook
         *
         * @hooked vedanta_footer_TagFooterForm - 10
         * @hooked vedanta_footer_TagFooterOpen - 20
         * @hooked vedanta_footer_TagFooterInner - 30
         * @hooked vedanta_footer_TagFooterClose - 100
         *
         */
        do_action('footer_parts');
        ?>

        <?= get_template_part('template-parts/partials/_partial', 'google-map-script'); ?>
        <?= get_template_part('template-parts/modal/_modal', 'modal'); ?>

        <?php wp_footer(); ?>

    </div>
    <!-- end container -->
</body>
</html>