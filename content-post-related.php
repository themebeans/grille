<?php
/**
 * The file for displaying the related posts loop below the blog single.
 * It is called via the single.php file & the related posts function is in functions.php.
 * You can set the count via the $related_items_count variable.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

$related_items_count = 8;
$related             = grille_get_related_posts( $post->ID, 'category', array( 'posts_per_page' => $related_items_count ) );
$i                   = 1;
?>

<div id="portfolio-related">

	<div class="border wrapper"></div>

	<div id="isotope-container" class="fadein">
		<?php
		while ( $related->have_posts() ) :
			$related->the_post();
			get_template_part( 'loop-post-related' );
			$i++;
		endwhile;
		wp_reset_postdata();
		?>
	</div>

</div>
