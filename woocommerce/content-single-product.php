<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author  WooThemes
 * @package     WooCommerce/Templates
 * @version    3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div id="primary-container" class="wrapper">

	<div class="page-content left">

		<div class="entry-content-media">
			<?php woocommerce_show_product_sale_flash(); ?>
			<?php woocommerce_show_product_images(); ?>
		</div><!-- END .entry-content-media -->

		<?php
		if ( post_password_required() ) {
				 echo get_the_password_form();
				 return;
		}
		?>

		<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

			<div class="post-side block left hide-for-first">

				<?php woocommerce_template_single_add_to_cart(); ?>

				<?php
				/**
				 * woocommerce_before_single_product hook
				 *
				 * @hooked wc_print_notices - 10
				 */
				 do_action( 'woocommerce_before_single_product' );
					?>

			</div><!-- END .post-side -->

			<div class="post-content left">

				<?php woocommerce_template_single_title(); ?>
				<?php woocommerce_template_single_price(); ?>
				<?php woocommerce_template_single_excerpt(); ?>
				<?php woocommerce_template_single_meta(); ?>
				<?php woocommerce_output_product_data_tabs(); ?>

				<div class="mobile-cart">
					<?php woocommerce_template_single_add_to_cart(); ?>
				</div><!-- END .mobile.cart -->

			</div><!-- END .post-content.left -->


			<?php
				/**
				 * woocommerce_before_single_product_summary hook
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				// do_action( 'woocommerce_before_single_product_summary' );
			?>


			<?php
				/**
				 * woocommerce_after_single_product_summary hook
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_output_related_products - 20
				 */
				// do_action( 'woocommerce_after_single_product_summary' );
			?>



			<meta itemprop="url" content="<?php the_permalink(); ?>" />

		</div><!-- #product-<?php the_ID(); ?> -->

		<?php do_action( 'woocommerce_after_single_product' ); ?>

	</div><!-- END .page-content.left -->

	<div class="sidebar right sidebar-right block hide-for-second">

		<?php dynamic_sidebar( 'shop-sidebar' ); ?>

	</div><!-- END .sidebar -->

<?php woocommerce_related_products(); ?>

</div><!-- END #primary-container.wrapper -->

