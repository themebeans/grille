<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package     WooCommerce/Templates
 * @version    3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>
<li <?php wc_product_class( 'isotope-item' ); ?> >

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<div class="entry-content-media">
		<div class="post-thumb">
			<a title="<?php printf( esc_html__( 'Permanent Link to %s', 'grille' ), get_the_title() ); ?>" href="<?php the_permalink(); ?>">
				<?php
				wc_get_template( 'loop/sale-flash.php' );

				// GRID IMAGE
				$product_grid_image = get_post_meta( $post->ID, '_bean_product_grid_image', true );
				?>

				<?php if ( $product_grid_image ) { ?>
					<img src="<?php echo $product_grid_image; ?>" />
				<?php } else { ?>
					<?php the_post_thumbnail( 'grid-feat' ); ?>
				<?php } ?>

			</a>
		</div><!-- END .post-thumb -->
	</div><!-- END .entry-content-media -->

	<h4 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'grille' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h4><!-- END .entry-title -->

	<div class="product-content">
		<?php
		$product_excerpt = get_post_meta( $post->ID, '_bean_product_excerpt', true );

		if ( $product_excerpt ) {
			echo '<p> ' . $product_excerpt . '</p>'; }
		?>

		<?php
		/**
		 * woocommerce_after_shop_loop_item_title hook
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		<div class="product-btn">
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div><!-- END .product-btn -->

	</div><!-- END .product-content -->

</li><!-- END .isotope-item -->
