<?php
/**
 * The template for displaying the download singular page.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header();

grille_set_post_views( get_the_ID() );

$portfolio_type   = get_post_meta( $post->ID, '_bean_portfolio_type', true );
$portfolio_date   = get_post_meta( $post->ID, '_bean_portfolio_date', true );
$portfolio_url    = get_post_meta( $post->ID, '_bean_portfolio_url', true );
$portfolio_views  = get_post_meta( $post->ID, '_bean_portfolio_views', true );
$portfolio_client = get_post_meta( $post->ID, '_bean_portfolio_client', true );
$portfolio_cats   = get_post_meta( $post->ID, '_bean_portfolio_cats', true );
$portfolio_tags   = get_post_meta( $post->ID, '_bean_portfolio_tags', true );
$gallery_layout   = get_post_meta( $post->ID, '_bean_gallery_layout', true );
$feat_image       = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
$twitter_profile  = get_theme_mod( 'twitter_profile' )
?>

<div id="primary-container" class="wrapper">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
?>

				<div class="page-content left">
			<div class="entry-content">
				<h2 class="entry-title"><?php the_title(); ?>.</h2>
				<?php the_content(); ?>

				<?php if ( get_theme_mod( 'show_portfolio_sharing' ) == true ) { ?>

					<ul class="portfolio-share subtext">
						<li><a href="http://twitter.com/share?text=<?php the_title_attribute(); ?> <?php
						if ( $twitter_profile != '' ) {
							echo 'via @' . $twitter_profile . ''; }
?>
" target="_blank" class="twitter"><?php esc_html_e( 'Tweet this', 'grille' ); ?></a></li>
						<li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo attr( $feat_image ); ?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title_attribute(); ?>" class="pinterest"><?php esc_html_e( 'Pin it', 'grille' ); ?></a></li>
						<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="facebook"><?php esc_html_e( 'Facebook it', 'grille' ); ?></a></li>
					</ul><!-- END .portfolio-share.subtext -->
				<?php } ?>

			</div><!-- END .entry-content-->
				</div><!-- END .page-content left -->

				<?php if ( ! post_password_required() ) { // START PASSWORD PROTECTED ?>
			<div class="block right entry-meta subtext">
				<ul>
					<?php if ( $portfolio_date == 'on' ) { ?>
						<li><?php the_time( get_option( 'date_format' ) ); ?></li>
					<?php } ?>

					<li>
						<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php esc_html_e( 'By:', 'grille' ); ?> <?php echo esc_html( get_the_author() ); ?>
						</a>
					</li>

					<?php if ( $portfolio_client ) { // DISPLAY CLIENT ?>
						<li>
							<?php esc_html_e( 'Src:', 'grille' ); ?>
							<?php if ( $portfolio_url ) { // DISPLAY PORTFOLIO URL ?>
								<a href="<?php echo $portfolio_url; ?>" target="blank"><?php echo $portfolio_client; ?></a>
							<?php
} else {
	echo $portfolio_client; } // IF NO URL
?>
						</li>
					<?php } ?>

					<?php if ( $portfolio_cats == 'on' ) { ?>
						<li><?php the_terms( $post->ID, 'download_category', '', ', ', '' ); ?></li>
					<?php } ?>

					<?php if ( $portfolio_views == 'on' ) { ?>
						<li><?php echo grille_get_post_views( get_the_ID() ); ?><?php esc_html_e( ' Views', 'grille' ); ?></li>
					<?php } ?>

					<li class="likes"><?php echo grille_get_post_like_link( get_the_ID() ); ?></li>

					<?php if ( $portfolio_tags == 'on' ) { ?>
						<li><?php the_terms( $post->ID, 'download_tag', '', ', ', '' ); ?></li>
					<?php } ?>
				</ul>
			</div><!-- END .entry-meta-->
	<?php } //END PASSWORD PROTECTED ?>

			<?php
	endwhile;
endif;
	wp_reset_postdata();
?>

	<?php if ( ! post_password_required() ) { ?>
		<div id="media-container">
			<div class="entry-content-media portfolio-gallery">
				<?php get_template_part( 'content', 'portfolio-media' ); ?>
			</div>
		</div>
	<?php } ?>

	<?php
	if ( get_theme_mod( 'show_portfolio_loop_single' ) == true ) {
		$terms = get_the_terms( $post->ID, 'download_category' );
		if ( $terms && ! is_wp_error( $terms ) ) :
				get_template_part( 'content', 'download-related' );
		endif;
	}
	?>

</div>

<?php
get_footer();
