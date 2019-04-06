<?php
/**
 * The template for displaying all single posts.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header(); ?>

<div id="primary-container" class="wrapper">

	<div class="page-content left">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :

				the_post();

				$format = get_post_format();

				if ( false === $format ) {
					$format = 'standard';
				}

				get_template_part( 'inc/post-formats/content', $format );

			endwhile;

			wp_link_pages(
				array(
					'before'         => '<p><strong>' . esc_html__( 'Pages:', 'grille' ) . '</strong> ',
					'after'          => '</p>',
					'next_or_number' => 'number',
				)
			);

			/*
			 * If comments are open or we have at least one comment, load up the comment template.
			 *
			 * @link https://codex.wordpress.org/Function_Reference/comments_open/
			 * @link https://codex.wordpress.org/Template_Tags/get_comments_number/
			 * @link https://developer.wordpress.org/reference/functions/comments_template/
			 */
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endif;
		?>
	</div>

	<div class="sidebar right sidebar-right block hide-for-second">
		<?php dynamic_sidebar( 'internal-sidebar' ); ?>
	</div>

	<?php
	if ( true === get_theme_mod( 'show_related_posts' ) ) {
		$terms = get_the_terms( $post->ID, 'category' );
		if ( $terms && ! is_wp_error( $terms ) ) :
			get_template_part( 'content', 'post-related' );
		endif;
	}
	?>

</div>

<script type="text/javascript">
	jQuery(window).load(function(){
		if(jQuery().validate) { jQuery("#commentform").validate(); }
		});
</script>

<?php
get_footer();
