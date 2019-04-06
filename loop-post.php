<?php
/**
 * The template for displaying the post template/grid loop.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

// GENERATE TERMS FOR FILTER
$terms     = get_the_terms( $post->ID, 'category' );
$term_list = null;
if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$term_list .= $term->slug;
		$term_list .= ' '; }
}

$format = get_post_format();

// GRID SPECIFIC FEATURED IMAGE
$grid_feat_img = get_post_meta( $post->ID, '_bean_grid_feat_img', true );
$embed         = get_post_meta( $post->ID, '_bean_video_embed', true );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( "$term_list isotope-item" ); ?>>

	<?php
	// GENERATE CONTENT FOR THE FOLLOWING POST FORMATS
	if ( $format == '' || $format == 'audio' || $format == 'gallery' || $format == 'video' ) {
		// IF A GRID IMAGE IS UPLOADED, USE IT
		if ( $grid_feat_img ) {
		?>
			<div class="entry-content-media">
				<div class="post-thumb">
					<?php
					if ( is_sticky() ) {
						echo '<span></span>'; }
?>
					<a title="<?php printf( esc_html__( 'Permanent Link to %s', 'grille' ), get_the_title() ); ?>" href="<?php the_permalink(); ?>">
						<img src="<?php echo esc_url( $grid_feat_img ); ?>"/>
					</a>
					<?php
					if ( $format == 'audio' ) {
						bean_audio( $post->ID );  }
?>
				</div><!-- END .post-thumb -->
			</div><!-- END .entry-content-media -->
		<?php
		} //END if( $grid_feat_img )

		// ELSE, IF THERE IS NO GRID IMAGE UPLOADED, FALLBACK TO THE POST FEATURED IMAGE
		else {
			if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) {
			?>
			<div class="entry-content-media">
				<div class="post-thumb">
					<?php
					if ( is_sticky() ) {
						echo '<span></span>'; }
?>
					<a title="<?php printf( esc_html__( 'Permanent Link to %s', 'grille' ), get_the_title() ); ?>" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'grid-feat' ); ?>
					</a>
					<?php
					if ( $format == 'audio' ) {
						bean_audio( $post->ID );  }
?>
				</div><!-- END .post-thumb -->
			</div><!-- END .entry-content-media -->
			<?php
			} //END if ( (function_exists('has_post_thumbnail'))

			// IF VIDEO POST FORMAT, SHOW THE VIDEO EMBED, UNLESS THERES A GRID IMAGE UPLOADED
			if ( $format == 'video' ) {
				if ( ! empty( $embed ) ) {
					echo "<div class='entry-content-media'>";
						echo "<div class='video-frame fadein'>";
							echo stripslashes( htmlspecialchars_decode( $embed ) );
						echo '</div>';
					echo '</div>';
				} else { // END if( !empty($embed) )
					bean_video( $post->ID );
				}
			}//END if( $format == 'video' )
		} //END else
		?>

		<h2 class="entry-title">
			<?php
			if ( is_singular() ) {
				the_title(); } else { // IF SINGLE
							?>
								<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'grille' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			<?php } ?>
		</h2><!-- END .entry-title -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- END .entry-content -->

		<div class="entry-meta">
			<span class="subtext"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<span class="subtext likes"><?php echo grille_get_post_like_link( get_the_ID() ); ?></span>
			<?php edit_post_link( esc_html__( 'Edit', 'grille' ), '<span class="subtext">', '</span>' ); ?>
		</div><!-- END .entry-meta -->

	<?php
	} //END if( $format == '' || $format == 'audio' || $format == 'gallery' || $format == 'video' )

	// PULL CONTENT FOR THE FOLLOWING POST FORMATS
	else {
		get_template_part( 'inc/post-formats/content', $format );
	}
	?>

</div><!-- END .isotope-item -->
