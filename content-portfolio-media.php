<?php
/**
 * The file is for displaying the single portfolio media
 * It is called via single-portfolio.php
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

$gallery_layout = get_post_meta( $post->ID, '_bean_gallery_layout', true );
$portfolio_type = get_post_meta( $post->ID, '_bean_portfolio_type', true );
$orderby        = get_post_meta( $post->ID, '_bean_portfolio_randomize', true );
$orderby        = ( 'off' === $orderby ) ? 'post__in' : 'rand';
$embed          = get_post_meta( $post->ID, '_bean_portfolio_embed_code', true );
$audio_poster   = get_post_meta( $post->ID, '_bean_audio_poster_url', true );

if ( ! $audio_poster ) {
	$audio_poster_class = 'audio-no-feat';
}

if ( 'gallery' === $portfolio_type || is_singular( 'download' ) ) {
	bean_gallery( $post->ID, 'port-full', $gallery_layout, $orderby, true );
}

if ( 'audio' === $portfolio_type ) {
	if ( $audio_poster ) { ?>

		<li class="stacked-image">
			<img src="<?php echo esc_url( $audio_poster ); ?>" class="wp-post-image"/>
				<?php bean_audio( $post->ID ); ?>
		</li>

	<?php
	} else {
	?>

		<div class="audio-no-feat">
			<div class="row">
				<div class="twelve columns">
					<?php bean_audio( $post->ID ); ?>
				</div>
			</div>
		</div>

	<?php
	}
}

if ( 'video' === $portfolio_type ) {
	$video_class = '';

	if ( ! $embed ) {
		$video_class = 'self-hosted-video'; }
	?>

	<div class="video-frame <?php echo esc_attr( $video_class ); ?> fadein">

		<?php
		if ( ! empty( $embed ) ) {
			echo stripslashes( htmlspecialchars_decode( $embed ) );
		} else {
			bean_video( $post->ID );
		}
		?>
	</div>

<?php
}
