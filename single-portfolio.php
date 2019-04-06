<?php
/**
 * The template for displaying the portfolio singular page.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header();

// VIEW COUNTER
grille_set_post_views( get_the_ID() );

// SETTING UP META
$portfolio_type   = get_post_meta( $post->ID, '_bean_portfolio_type', true );
$portfolio_date   = get_post_meta( $post->ID, '_bean_portfolio_date', true );
$portfolio_url    = get_post_meta( $post->ID, '_bean_portfolio_url', true );
$portfolio_views  = get_post_meta( $post->ID, '_bean_portfolio_views', true );
$portfolio_client = get_post_meta( $post->ID, '_bean_portfolio_client', true );
$portfolio_cats   = get_post_meta( $post->ID, '_bean_portfolio_cats', true );
$portfolio_tags   = get_post_meta( $post->ID, '_bean_portfolio_tags', true );
$gallery_layout   = get_post_meta( $post->ID, '_bean_gallery_layout', true );
$download_id      = get_post_meta( $post->ID, '_bean_download_id', true );

// PORTFOLIO SHARING
$feat_image      = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
$twitter_profile = get_theme_mod( 'twitter_profile' )
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
						<li><a href="http://twitter.com/share?text=<?php the_title(); ?> <?php
						if ( $twitter_profile != '' ) {
							echo 'via @' . $twitter_profile . ''; }
?>
" target="_blank" class="twitter"><?php esc_html_e( 'Tweet this', 'grille' ); ?></a></li>
						<li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $feat_image; ?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" class="pinterest"><?php esc_html_e( 'Pin it', 'grille' ); ?></a></li>
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

					<?php if ( $portfolio_client ) { // DISPLAY CLIENT ?>
						<li>
							<?php esc_html_e( 'For', 'grille' ); ?>
							<?php if ( $portfolio_url ) { // DISPLAY PORTFOLIO URL ?>
								<a href="<?php echo $portfolio_url; ?>" target="blank"><?php echo $portfolio_client; ?></a>
							<?php
} else {
	echo $portfolio_client; } // IF NO URL
?>
						</li>
					<?php } ?>

					<?php if ( $portfolio_cats == 'on' ) { // DISPLAY CATEGORY ?>
						<li><?php the_terms( $post->ID, 'portfolio_category', '', ', ', '' ); ?></li>
					<?php } ?>

					<?php if ( $portfolio_views == 'on' ) { // DISPLAY VIEWS ?>
						<li><?php echo grille_get_post_views( get_the_ID() ); ?><?php esc_html_e( ' Views', 'grille' ); ?></li>
					<?php } ?>

					<li class="likes"><?php echo grille_get_post_like_link( get_the_ID() ); ?></li>

					<?php if ( $portfolio_tags == 'on' ) { // DISPLAY CATEGORY ?>
						<li><?php the_terms( $post->ID, 'portfolio_tag', '', ', ', '' ); ?></li>
					<?php } ?>
				</ul>
			</div><!-- END .entry-meta-->
	<?php } //END PASSWORD PROTECTED ?>

			<?php
	endwhile;
endif;
	wp_reset_postdata();
?>

	<?php if ( ! post_password_required() ) { // START PASSWORD PROTECTED ?>
		<div id="media-container">
			<div class="entry-content-media portfolio-<?php echo $portfolio_type; ?>">
				<?php get_template_part( 'content', 'portfolio-media' ); // PULL CONTENT-PORTFOLIO-MEDIA.PHP ?>
			</div><!-- END .entry-content-media -->
		</div><!-- END #media-container -->
	<?php } //END PASSWORD PROTECTED ?>

	<?php if ( $download_id ) { ?>
		<div class="download-purchase-container">
			<?php echo do_shortcode( $download_id ); ?>
		</div>
	<?php } ?>

	<?php
	// RELATED POSTS
	if ( get_theme_mod( 'show_portfolio_loop_single' ) == true ) {
		$terms = get_the_terms( $post->ID, 'portfolio_category' );
		if ( $terms && ! is_wp_error( $terms ) ) :
				get_template_part( 'content', 'portfolio-related' );
		endif;
	}
	?>

</div><!-- END #primary-container.wrapper -->

<?php
get_footer();
