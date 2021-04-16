<?php
/*
  Plugin Name: ITM - WooCommerce Attribute Image
  Plugin URI: https://itm-net.ru/
  Description: Create Image form attribute
  Requires at least: WP 4.9
  Tested up to: WP 5.4
  Author: cherniy
  Author URI: https://www.instagram.com/cherniy_itm/
  Version: 1.0.0
  Requires PHP: 7.1
  Tags: woocommerce,woocommerce itm attribute edit,woocommerce attribute image
  Text Domain: itm-net.ru
  Domain Path: /languages
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/**
 * Plugin Init Is Admin
 */
//if(is_admin()) :
	final class ITM_Attribute_Image {

		/**
		 * ITM_Attribute_Image constructor.
		 */
		public function __construct() {
			$this->define( 'ITM_ASSETS_URI', trailingslashit( plugin_dir_url( __FILE__ ) . 'assets' ) );
			add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
			
		}

		/**
		 * Define Function
		 * @param $name
		 * @param $value
		 * @param bool $case_insensitive
		 */
		public function define( $name, $value, $case_insensitive = false ) {
			if ( ! defined( $name ) ) {
				define( $name, $value, $case_insensitive );
			}
		}

		/**
		 * Assets uri
		 * @param $file
		 *
		 * @return string
		 */
		public function assets_uri( $file ) {
			$file = ltrim( $file, '/' );

			return ITM_ASSETS_URI . $file;
		}

		/**
		 * Init
		 */
		public function init() {

			add_shortcode('itm_image_attribute', array($this, 'itm_image_attribute_func'));

			if ( ! is_admin() ) {
				return;
			}
			if ( ! class_exists( 'WooCommerce' ) ) {
				return;
			}

			/**
			 * Action
			 */
			add_action( 'woocommerce_after_add_attribute_fields', array($this, 'itm_render_section_add_image_uploader') );
			add_action( 'woocommerce_after_edit_attribute_fields', array($this, 'itm_render_section_edit_image_uploader') );


			add_action('woocommerce_attribute_updated', array($this, 'itm_update_image_uploader'), 10, 3);
			add_action('woocommerce_attribute_added', array($this, 'itm_save_image_uploader'), 10, 2);



		}

		/**
		 * Get Default Image
		 * @return string
		 *
		 */
		public function itm_get_default_image() {
			$id = isset( $_GET['edit'] ) ? absint( $_GET['edit'] ) : 0;
			$default = wc_placeholder_img_src(array(60, 60));
			$value = get_post_meta($id, 'itm_uploader_attribute_section',true);
			if( $value ) {
				$image_attributes = wp_get_attachment_image_src( $value, array(60, 60) );
				$src = $image_attributes[0];
			} else {
				$src = $default;
			}
			return $src;
		}

		/**
		 * Add Page Section Uploader
		 */
		public function itm_render_section_add_image_uploader() {
			$image = $this->itm_get_default_image();
			?>
			<div class="form-field">
				<h2><?= __('Image', 'woocommerce') ?></h2>
				<?= $this->itm_render_section_html_image($image) ?>
			</div>
			<?php
		}

		/**
		 * Edit Page Section Uploader
		 */
		public function itm_render_section_edit_image_uploader() {
			$image = $this->itm_get_default_image();
			?>
			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="attribute_label"><?= __('Image', 'woocommerce') ?></label>
				</th>
				<td>
					<?= $this->itm_render_section_html_image($image) ?>
				</td>
			</tr>
			<?php
		}

		/**
		 * Html Section Uploader
		 * @param $image
		 */
		public function itm_render_section_html_image($image) {
			?>
			<div style="float: left; margin-right: 10px;" id="attribute_thumbnail">
				<img data-src="<?= wc_placeholder_img_src(array(60, 60)) ?>" src="<?= $image ?>" width="60" height="60" />
			</div>

			<div style="float: left; margin-right: 10px;">
				<input type="hidden" name="itm_uploader_attribute_section" id="itm_uploader_attribute_section" value="<?= $image ?>" />
				<button type="submit" class="itm_attribute_upload_image_button button"><?= __('Upload/Add image', 'woocommerce') ?></button>
				<button type="submit" class="itm_remove_attribute_section button">×</button>
			</div>
			<div class="clear"></div>
			<?php
		}


		/**
		 * Add New
		 * @param $id
		 * @param $data
		 */
		public function itm_save_image_uploader( $id, $data ) {
			update_post_meta( $id, 'itm_uploader_attribute_section', $_POST['itm_uploader_attribute_section']);
		}

		/**
		 * Update
		 * @param $id
		 * @param $data
		 * @param $old_slug
		 */
		public function itm_update_image_uploader( $id, $data, $old_slug ) {
			update_post_meta( $id, 'itm_uploader_attribute_section', $_POST['itm_uploader_attribute_section']);
		}


		/**
		 * Include Scripts
		 */
		public function admin_enqueue_scripts() {
			if ( ! did_action( 'wp_enqueue_media' ) ) {
				wp_enqueue_media();
			}
			wp_enqueue_script( 'itmattributescript', $this->assets_uri( "/js/script.js" ), array('jquery'), null, false );
		}

		function itm_image_attribute_func( $atts ){
			/**
			 * @output  [output="array"]
             * @id      [id="9999"]
             * @class   [class="my-class"]
			 */
			$image = '';
			$class = '';
			$atts = shortcode_atts( [
				'id'        => '',
                'output'    => '',
                'class'     => ''
			], $atts );


			$value = get_post_meta($atts['id'], 'itm_uploader_attribute_section',true);

			if( ! $value ) return;
			$image = wp_get_attachment_image_src( $value );

			if($atts['class']) :
                $class = 'class="' . $atts['class'] . '"';
            endif;

			switch ($atts['output']) :

				case 'array':
					$image = $image;
					break;

				case 'url':
					$image = $image[0];
					break;

				default:
				    $image = '<img src="' . $image[0] . '" ' . $class . ' />';

			endswitch;

			return $image;
		}

	}
	$ITM = new ITM_Attribute_Image();
	add_action('init', array($ITM, 'init'), 9999);
//endif;



