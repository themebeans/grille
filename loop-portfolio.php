<?php
/**
 * The template for displaying the portfolio template/grid loop.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

$terms = get_the_terms( $post->ID, 'portfolio_category' );

$term_list = null;

if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$term_list .= $term->slug;
		$term_list .= ' ';
	}
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( "$term_list isotope-item" ); ?>>

	<?php if ( has_post_thumbnail() ) { ?>

		<div class="entry-content-media">

			<div class="post-thumb">

				<a href="<?php esc_url( the_permalink() ); ?>">
					<?php the_post_thumbnail( 'grid-feat' ); ?>
				</a>

			</div>

		</div>

	<?php } ?>

	<h4 class="entry-title">
		<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h4>

	<div class="entry-meta">
		<span class="subtext"><?php the_terms( $post->ID, 'portfolio_category', '', ', ', '' ); ?></span>
	</div>

</div>
