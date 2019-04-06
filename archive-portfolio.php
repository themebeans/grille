<?php
/**
 * The template for displaying portfolio category & tag pages
 *
 * Used to display archive-type pages for portfolio posts.
 * If you'd like to further customize these taxonomy views, you may create a
 * new template file for each specific one. This file has taxonomy-portfolio_category.php
 * and taxonomy-portfolio_tag.php pointing to it.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header();

global $query_string;

query_posts( "{$query_string}&posts_per_page=-1" ); ?>

<div id="primary-container" class="wrapper">

	<?php if ( is_post_type_archive( 'portfolio' ) || is_tax() ) { ?>

		<div class="block portfolio-archive">
			<h1 class="entry-title">
				<?php
				if ( is_post_type_archive( 'portfolio' ) ) {
					post_type_archive_title();
				} elseif ( get_the_terms( $post->ID, 'portfolio_tag' ) ) {
					printf( esc_html__( '%s', 'grille' ), single_tag_title( '', false ) . '' );
				} elseif ( get_the_terms( $post->ID, 'portfolio_category' ) ) {
					single_cat_title();
				} else {
					printf( esc_html__( 'Archives', 'grille' ) );
				}
				?>
			</h1>

			<?php if ( category_description() ) { ?>
				<p><?php echo category_description(); ?></p>
			<?php } ?>
		</div><!-- END.block -->

	<?php } ?>

	<div id="isotope-container" class="fadein">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'loop-portfolio' );
			endwhile;
		endif;
		wp_reset_postdata();
		?>

	</div>

</div>

<?php
get_footer();
