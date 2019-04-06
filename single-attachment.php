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

				<div class="page-content left wrapper">
			<div class="entry-content">
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<div class=" subtext">
					<?php esc_html_e( 'Uploaded ', 'grille' ); ?><?php the_time( get_option( 'date_format' ) ); ?>
				</div><!-- END .entry-meta-->

			<div class="entry-content-media">
				<?php $image_info = getimagesize( $post->guid ); ?>
				<img src="<?php echo esc_url( $post->guid ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" <?php echo esc_html( $image_info[3] ); ?> />

			</div><!-- END .entry-content-media-->

			</div><!-- END .entry-content-->
				</div><!-- END .page-content left -->

			<?php
	endwhile;
endif;
	wp_reset_postdata();
?>

</div><!-- END #primary-container.wrapper -->

<?php
get_footer();
