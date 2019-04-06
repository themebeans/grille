<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

// POST META
$quote        = get_post_meta( $post->ID, '_bean_quote', true );
$quote_source = get_post_meta( $post->ID, '_bean_quote_source', true );
?>

<?php if ( is_singular() ) { ?>

<div class="entry-quote entry-content-media">
	<h2 class="entry-title"><?php echo stripslashes( esc_html( $quote ) ); ?></h2>
	<span class="subtext"><?php echo stripslashes( esc_html( $quote_source ) ); ?></span>
</div><!-- END .entry-quote.entry-content-media -->

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

</div><!-- END .post-content.left -->

<?php } else { ?>
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'grille' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		<div class="entry-quote">
			<h2 class="entry-title"><?php echo stripslashes( esc_html( $quote ) ); ?></h2>
			<span class="subtext"><?php echo stripslashes( esc_html( $quote_source ) ); ?></span>
		</div><!-- END .entry-quote -->
	</a>
<?php } ?>
