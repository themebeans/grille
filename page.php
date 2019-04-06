<?php
/**
 *  The template for displaying all pages
 *
 *  This is the template that displays all pages by default.
 *  Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header();
grille_sidebar_loader();

$page_title = get_post_meta( $post->ID, '_bean_page_title', true );

$extraclass = '';
if ( $page_title == 'off' ) {
	$extraclass = ' no-title';
}
?>

<div id="primary-container" class="wrapper">

	<div class="page-content left <?php echo esc_attr( $bean_content_class ); ?>">

		<?php
		if ( $page_title == 'on' ) {

		?>
		<h1 class="entry-title"><?php the_title( '' ); ?></h1>
		<?php } ?>

		<div class="entry-content">

			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'grille' ) . '</span>',
					'after'  => '</div>',
				)
			);
			?>

			<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template( '', true );
			endif;
			?>

		</div>

	</div>

	<?php if ( 'right' === $bean_sidebar_location ) { ?>
		<div class="
		<?php
		echo esc_attr( $bean_sidebar_class );
		echo esc_attr( $extraclass );
?>
 block hide-for-second">
			<?php dynamic_sidebar( 'internal-sidebar' ); ?>
		</div>
	<?php } ?>

</div>

<?php
get_footer();
