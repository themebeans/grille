<?php
/**
 * Template Name: Woo Template
 * The template for displaying the under construction page template.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header( 'min' );
?>

<div id="primary-container" class="wrapper row">

	<div class="six columns centered mobile-four">

		<div class="entry-content">

			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'grille' ) . '</span>',
					'after'  => '</div>',
				)
			);
			?>

		</div>

	</div>

</div>

<?php
get_footer( 'min' );
