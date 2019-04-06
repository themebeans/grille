<?php
/**
 * Template Name: Under Construction
 * The template for displaying the under construction page template.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header(); ?>

<div id="primary-container" class="wrapper">

	<div class="page-content left wrapper">

		<h1 class="entry-title"><?php the_title( '' ); ?></h1>

		<div class="entry-content">

			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>

		</div>

	</div>

</div>

<?php
get_footer();
