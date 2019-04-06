<?php
/**
 * The template for displaying the portfolio template/grid loop.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

// GENERATE TERMS FOR FILTER
$terms     = get_the_terms( $post->ID, 'download_category' );
$term_list = null;
if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$term_list .= $term->slug;
		$term_list .= ' '; }
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( "$term_list isotope-item" ); ?>>

	<?php
	if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) {
	?>
	<div class="entry-content-media">
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'grid-feat' ); ?>
			</a>
		</div><!-- END .post-thumb -->
	</div><!-- END .entry-content-media -->
	<?php
	} //END if ( (function_exists('has_post_thumbnail'))
	?>

	<h4 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'grille' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h4><!-- END .entry-title -->

	<div class="entry-meta">
		<span class="subtext"><?php the_terms( $post->ID, 'download_category', '', ', ', '' ); ?></span>
	</div><!-- END .entry-meta -->

</div><!-- END .isotope-item -->
