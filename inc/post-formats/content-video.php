<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

// META
$embed = get_post_meta( $post->ID, '_bean_video_embed', true );
?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content-media">
		<?php
		if ( ! empty( $embed ) ) {
			echo "<div class='video-frame fadein'>";
			echo stripslashes( htmlspecialchars_decode( $embed ) );
			echo '</div>';
		} else {
			bean_video( $post->ID );
		}
		?>
	</div><!-- END .entry-content-media -->

	<div class="post-side block left hide-for-first">
		<?php get_template_part( 'content', 'post-meta' ); ?>
	</div><!-- END .post-side.block.left.hide-for-first -->

	<div class="post-content left">

		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1><!-- END .entry-title -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- END .entry-content -->

		<div class="foot-meta">
			<?php get_template_part( 'content', 'post-meta' ); ?>
		</div><!-- END .foot-meta -->

		<?php if ( get_theme_mod( 'show_pagination' ) == true ) { ?>
			<div class="pagination subtext">
				<span class="page-previous">
					<?php previous_post_link( '%link', esc_html__( 'Next', 'grille' ) ); ?>
				</span><!-- END .page-previous -->
				<span class="page-next">
					<?php next_post_link( '%link', esc_html__( ' / Prev', 'grille' ) ); ?>
				</span><!-- END .page-next -->
			</div><!-- END .pagination -->
		<?php } //END if ( get_theme_mod( 'show_pagination' ) ?>

	</div><!-- END .post-content.nine.columns -->

</section><!-- END #post-<?php the_ID(); ?> -->
