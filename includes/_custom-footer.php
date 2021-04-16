<?php
defined( 'ABSPATH' ) || exit;
/**
 * @vedanta_footer_TagFooterOpen
*/
add_action( 'footer_parts', 'vedanta_footer_TagFooterOpen', 20 );
function vedanta_footer_TagFooterOpen() {
	?>
  	<!-- FOOTER -->
  	<footer class="footer silver-bg">
	<?php
};
/**
 * @vedanta_footer_TagFooterInner
*/
add_action( 'footer_parts', 'vedanta_footer_TagFooterInner', 30 );
function vedanta_footer_TagFooterInner() {
	?>

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="footer-row">

            <!-- column -->
            <?php
            if ( is_active_sidebar( 'footer-menu-one' ) ) :
                dynamic_sidebar( 'footer-menu-one' );
            endif;
            ?>
            <!-- end column -->

            <!-- column -->
            <?php
            if ( is_active_sidebar( 'footer-menu-two' ) ) :
                dynamic_sidebar( 'footer-menu-two' );
            endif;
            ?>
            <!-- end column -->

            <!-- column -->
            <?php
            if ( is_active_sidebar( 'footer-contacts' ) ) :
                dynamic_sidebar( 'footer-contacts' );
            endif;
            ?>
            <!-- end column -->

            <!-- column -->
            <?php
            if ( is_active_sidebar( 'footer-about' ) ) :
                dynamic_sidebar( 'footer-about' );
            endif;
            ?>
            <!-- end column -->

        </div>
        <!-- end row -->

        <!-- bottom -->
        <?php
        if ( is_active_sidebar( 'footer-copyright' ) ) :
            dynamic_sidebar( 'footer-copyright' );
        endif;
        ?>
        <!-- end bottom -->

    </div>
    <!-- end container -->

	<?php
};
/**
 * @vedanta_footer_TagFooterClose
*/
add_action( 'footer_parts', 'vedanta_footer_TagFooterClose', 100 );
function vedanta_footer_TagFooterClose() {
	?>
  	</footer>
  	<!-- END FOOTER -->
	<?php
};