<?php
/**
 * The file for displaying the portfolio template's primary content.
 * It is pulled by the portfolio template files and is setup to reflect both templates.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

$paged = 1;
if ( get_query_var( 'paged' ) ) {
	$paged = get_query_var( 'paged' );
}

if ( get_query_var( 'page' ) ) {
	$paged = get_query_var( 'page' );
}

$portfolio_posts_count = get_theme_mod( 'portfolio_posts_count' );

if ( is_page_template( 'template-mixed-posts.php' ) ) {
	$post_type = array( 'post', 'portfolio' );
} elseif ( is_page_template( 'template-team.php' ) ) {
	$post_type = 'team';
} else {
	$post_type = 'portfolio';
}
?>

<div id="primary-container" class="wrapper">

	<div id="isotope-container" class="fadein">

		<?php
		do_action( 'grille_before_portfolio' );

		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => $portfolio_posts_count,
		);

		$wp_query = new WP_Query( apply_filters( 'grille_portfolio_args', $args ) );

		if ( $wp_query->have_posts() ) :

			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();

				if ( get_post_type() == 'portfolio' ) {
					get_template_part( 'loop-portfolio' );
				} elseif ( get_post_type() == 'team' ) {
					get_template_part( 'loop-team' );
				} elseif ( get_post_type() == 'download' ) {
					get_template_part( 'loop-download' );
				} else {
					get_template_part( 'loop-post' );
				}

			endwhile;

		endif;

		wp_reset_postdata();

		do_action( 'charmed_after_portfolio' );
		?>

	</div>

	<div id="page_nav" class="hide">
		<?php next_posts_link(); ?>
	</div>

</div>
