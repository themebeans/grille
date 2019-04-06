<?php
/**
 * The file for displaying the related portfolio loop below the portfolio single.
 * It is called via the single-portfolio.php & the related posts function is in functions.php.
 * You can set the count via the $related_items_count variable.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

$related_items_count = 15;
$related             = grille_get_related_posts( $post->ID, 'download_category', array( 'posts_per_page' => $related_items_count ) );
$i                   = 1;
?>

<div id="portfolio-related">

	<div id="isotope-container" class="fadein">

		<?php
		while ( $related->have_posts() ) :

			$related->the_post();

			get_template_part( 'loop-download' );

			$i++;

		endwhile;

		wp_reset_postdata();
		?>
	</div>
</div>
