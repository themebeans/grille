<?php
/**
 * The template for displaying the related post template/grid loop.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

$terms     = get_the_terms( $post->ID, 'category' );
$term_list = null;
if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$term_list .= $term->slug;
		$term_list .= ' '; }
}

$format = get_post_format();

$grid_feat_img = get_post_meta( $post->ID, '_bean_grid_feat_img', true );
$embed         = get_post_meta( $post->ID, '_bean_video_embed', true );
$quote         = get_post_meta( $post->ID, '_bean_quote', true );
$quote_source  = get_post_meta( $post->ID, '_bean_quote_source', true );
$link          = get_post_meta( $post->ID, '_bean_link_url', true );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( "$term_list isotope-item" ); ?>>

	<?php
	if ( $format == '' || $format == 'audio' || $format == 'gallery' || $format == 'video' ) {
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
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'grille' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2><!-- END .entry-title -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- END .entry-content -->

		<div class="entry-meta">
			<span class="subtext"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<span class="subtext likes"><?php echo grille_get_post_like_link( get_the_ID() ); ?></li>
			<?php edit_post_link( esc_html__( 'Edit', 'grille' ), '<span class="subtext">', '</span>' ); ?>
		</div><!-- END .entry-meta -->

	<?php
	} //END if( $format == '' || $format == 'audio' || $format == 'gallery' || $format == 'video' )

	// PULL CONTENT FOR THE QUOTE FORMAT
	elseif ( $format == 'quote' ) {
	?>

		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'grille' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<div class="entry-quote">
				<h2 class="entry-title"><?php echo stripslashes( esc_html( $quote ) ); ?></h2>
				<span class="subtext"><?php echo stripslashes( esc_html( $quote_source ) ); ?></span>
			</div><!-- END .entry-quote -->
		</a>

	<?php
	} //END } //END elseif( $format == 'quote' )

	// PULL CONTENT FOR THE LINK FORMAT
	elseif ( $format == 'link' ) {
	?>

		<a target="blank" href="<?php echo esc_url( $link ); ?>">
			<div class="entry-link">
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<span class="subtext"><?php echo stripslashes( esc_html( $link ) ); ?></span>
			</div><!-- END .entry-link -->
		</a>

	<?php
	} //END } //END elseif( $format == 'link' )

	// PULL CONTENT FOR THE ASIDE FORMAT
	elseif ( $format == 'aside' ) {
	?>

		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'grille' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<div class="entry-aside">
				<?php the_content(); ?>
			</div><!-- END .entry-quote -->
		</a>

	<?php
	} //END } //END elseif( $format == 'quote' )

	// PULL CONTENT FOR THE FOLLOWING POST FORMATS
	else {
		get_template_part( 'inc/post-formats/content', $format );
	}
	?>

</div><!-- END .isotope-item -->
