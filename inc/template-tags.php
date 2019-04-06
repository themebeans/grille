<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

if ( ! function_exists( 'grille_site_logo' ) ) :
	/**
	 * Output an <img> tag of the site logo.
	 */
	function grille_site_logo() {

		$visibility = ( has_custom_logo() ) ? ' hidden' : null;

		do_action( 'grille_before_site_logo' );

		the_custom_logo();

		if ( ! has_custom_logo() || is_customize_preview() ) {
			printf( '<h1 class="h3 site-title site-logo %1$s" itemscope itemtype="http://schema.org/Organization"><a href="%2$s" rel="home" itemprop="url" class="black">%3$s</a></h1>', esc_attr( $visibility ), esc_url( home_url( '/' ) ), esc_html( get_bloginfo( 'name' ) ) );

		}

		do_action( 'grille_after_site_logo' );
	}

endif;

if ( ! function_exists( 'bean_gallery' ) ) {
	/**
	 * Render gallery post format media.
	 *
	 * @param array   $postid Post ID.
	 * @param string  $imagesize Image size to generate.
	 * @param string  $layout Layout option.
	 * @param string  $orderby Order for which the images to load.
	 * @param boolean $single Is this a singular post view or not.
	 */
	function bean_gallery( $postid, $imagesize = '', $layout = '', $orderby = '', $single = false ) {
		$thumb_id      = get_post_thumbnail_id( $postid );
		$image_ids_raw = get_post_meta( $postid, '_bean_image_ids', true );

		if ( '' !== $image_ids_raw ) {
			$image_ids   = explode( ',', $image_ids_raw );
			$post_parent = null;
		} else {
			$image_ids   = '';
			$post_parent = $postid;
		}

		$args        = array(
			'exclude'        => $thumb_id,
			'include'        => $image_ids,
			'numberposts'    => -1,
			'orderby'        => $orderby,
			'order'          => 'ASC',
			'post_type'      => 'attachment',
			'post_parent'    => $post_parent,
			'post_mime_type' => 'image',
			'post_status'    => null,
		);
		$attachments = get_posts( $args );

		if ( 'slider' === $layout ) {

			if ( 'rand' === $orderby ) {
				$orderby_slides = 'true';
			} else {
				$orderby_slides = 'false';
			}
			?>

			<script type="text/javascript">
				jQuery(document).ready(function($){
					jQuery('#slider-<?php echo esc_js( $postid ); ?>').flexslider({
						namespace: "bean-",
						animation: "slide",
						slideshowSpeed: 5000,
						slideshow: true,
						animationLoop: true,
						animationSpeed: 500,
						randomize: <?php echo esc_js( $orderby_slides ); ?>,
						directionNav: true,
						smoothHeight: true,
						controlNav: false,
						touch: true,
						pauseOnHover: false,
					});
				});
			</script>

			<div class="slider-wrapper">
				<div class="post-slider">
					<div id="slider-<?php echo $postid; ?>">
						<ul class="slides">
							<?php
							if ( ! empty( $attachments ) ) {
								$i = 0;
								foreach ( $attachments as $attachment ) {
									$src     = wp_get_attachment_image_src( $attachment->ID, $imagesize );
									$caption = $attachment->post_excerpt;
									$caption = ( $caption ) ? "<div class='bean-slide-caption'>$caption</div>" : '';
									$alt     = ( ! empty( $attachment->post_content ) ) ? $attachment->post_content : $attachment->post_title;
									echo "<li>$caption<img height='$src[2]' src='$src[0]' alt='$alt'/></li>";
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>

		<?php
		}
		if ( 'stacked' === $layout ) {
			if ( ! empty( $attachments ) ) {
				foreach ( $attachments as $attachment ) {
					$src     = wp_get_attachment_image_src( $attachment->ID, $imagesize );
					$caption = $attachment->post_excerpt;
					$caption = ( $caption ) ? "<div class='bean-image-caption'>$caption</div>" : '';
					$alt     = ( ! empty( $attachment->post_content ) ) ? $attachment->post_content : $attachment->post_title;
					echo "<li class='stacked-image'>$caption<img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' /></li>";
				}
			}
		}

	}
}

if ( ! function_exists( 'bean_audio' ) ) {
	/**
	 * Render audio post format media.
	 *
	 * @param array $postid Post ID.
	 */
	function bean_audio( $postid ) {
		$mp3 = get_post_meta( $postid, '_bean_audio_mp3', true );
		?>
		<div id="jp_container_<?php echo esc_attr( $postid ); ?>" class="jp-audio fullwidth" data-file="<?php echo esc_url( $mp3 ); ?>">
			<div id="jquery_jplayer_<?php echo esc_attr( $postid ); ?>" class="jp-jplayer">
			</div>
			<div class="jp-interface" style="display: none;">
				<ul class="jp-controls">
					<li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span><?php esc_html_e( 'Play', 'grille' ); ?></span></a></li>
					<li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span><?php esc_html_e( 'Pause', 'grille' ); ?></span></a></li>
				</ul>
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div>
				</div>
			</div>
		</div>

	<?php
	}
}

if ( ! function_exists( 'bean_video' ) ) {
	/**
	 * Render video post format media.
	 *
	 * @param array $postid Post ID.
	 */
	function bean_video( $postid ) {
		$m4v    = get_post_meta( $postid, '_bean_video_m4v', true );
		$poster = get_post_meta( $postid, '_bean_video_poster', true );
		?>

		<div id="jp_container_<?php echo esc_attr( $postid ); ?>" class="jp-video fullwidth" data-file="<?php echo esc_url( $m4v ); ?>" data-poster="<?php echo esc_url( $poster ); ?>">
			<div class="jp-type-single">
				<div id="jquery_jplayer_<?php echo esc_attr( $postid ); ?>" class="jp-jplayer">
				</div>
				<div class="jp-interface" style="display: none;">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span><?php esc_html_e( 'Play', 'grille' ); ?></span></a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span><?php esc_html_e( 'Pause', 'grille' ); ?></span></a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php
	}
}
