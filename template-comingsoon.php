<?php
/**
 * Template Name: Coming Soon
 * The template for displaying the coming soon template.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header();

// PAGE TITLE
$page_title = get_post_meta( $post->ID, '_bean_page_title', true );

// VARIABLES FROM THEME CUSTOMIZER
$years  = get_theme_mod( 'comingsoon_year' );
$months = get_theme_mod( 'comingsoon_month' );
$days   = get_theme_mod( 'comingsoon_day' );

// VARIABLE DEFAULTS
if ( ! $years ) {
	$years = '2014'; }
if ( ! $months ) {
	$months = '01';  }
if ( ! $days ) {
	$days = '01';    }

?>

<div id="primary-container" class="wrapper">

	<div class="page-content left wrapper">

		<?php
		// IF PAGE TITLE OPTION IN META IS CHECKED
		if ( $page_title == 'on' ) {

		?>
		<h1 class="entry-title"><?php the_title( '' ); ?></h1>
		<?php } ?>

		<div class="entry-content">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
endwhile; // THE LOOP
?>
		</div><!-- END .entry-content -->

		<div class="bean-coming-soon" data-years="<?php echo $years; ?>" data-months="<?php echo $months; ?>" data-days="<?php echo $days; ?>" data-hours="00" data-minutes="00" data-seconds="00">

			<div class="block mobile-two fadein days">
				<div class="count-inner">
					<div class="fadein">
						<div class="count"></div>
						<h6><div class="text"><?php esc_html_e( 'Days', 'grille' ); ?></div></h6>
					</div><!-- END .fadein -->
				</div><!-- END .count-inner -->
			</div><!-- END .days -->

			<div class="block mobile-two fadein hours">
				<div class="count-inner">
					<div class="fadein">
						<div class="count"></div>
						<h6><div class="text"><?php esc_html_e( 'Hours', 'grille' ); ?></div></h6>
					</div><!-- END .fadein -->
				</div><!-- END .count-inner -->
			</div><!-- END .hours -->

			<div class="block mobile-two fadein minutes">
				<div class="count-inner">
					<div class="fadein">
						<div class="count"></div>
						<h6><div class="text"><?php esc_html_e( 'Minutes', 'grille' ); ?></div></h6>
					</div><!-- END .fadein -->
				</div><!-- END .count-inner -->
			</div><!-- END .minutes -->

			<div class="block mobile-two fadein seconds">
				<div class="count-inner">
					<div class="fadein">
						<div class="count"></div>
						<h6><div class="text"><?php esc_html_e( 'Seconds', 'grille' ); ?></div></h6>
					</div><!-- END .fadein -->
				</div><!-- END .count-inner -->
			</div><!-- END .seconds -->

		</div><!-- END bean-coming-soon -->

	</div><!-- END .page-content.left.wrapper -->

</div><!-- END #primary-container.wrapper -->

<?php
get_footer();
