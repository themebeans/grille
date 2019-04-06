<?php
/**
 * The template for displaying posts in the Link post format.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

// POST META
$link = get_post_meta( $post->ID, '_bean_link_url', true );
?>

<?php if ( is_singular() ) { ?>

<div class="entry-link entry-content-media">
	<a target="blank" href="<?php echo esc_url( $link ); ?>">
		<div class="entry-link">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<span class="subtext"><?php echo stripslashes( esc_html( $link ) ); ?></span>
		</div><!-- END .entry-link -->
	</a>
</div><!-- END .entry-link.entry-content-media -->

<div class="post-side block left hide-for-first">
	<?php get_template_part( 'content', 'post-meta' ); ?>
</div><!-- END .post-side.block.left.hide-for-first -->

<div class="post-content left nine columns">
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

<?php } else { ?>

	<a target="blank" href="<?php echo esc_url( $link ); ?>">
		<div class="entry-link">
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<span class="subtext"><?php echo stripslashes( esc_html( $link ) ); ?></span>
		</div><!-- END .entry-link -->
	</a>

<?php } ?>
