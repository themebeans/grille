<?php
/**
 * Related Products
 *
 * @author  WooThemes
 * @package     WooCommerce/Templates
 * @version    3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<div id="portfolio-related">

	<div class="border wrapper"></div>

		<div id="isotope-container" class="fadein">

			<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' );
					?>

			<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>


		</div>

	</div>

<?php
endif;

wp_reset_postdata();
