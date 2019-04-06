<?php
/**
 * Template Name: Post Archives
 * The template for displaying the post archives template.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header();
grille_sidebar_loader();

// PAGE TITLE
$page_title = get_post_meta( $post->ID, '_bean_page_title', true );

// CLASS IF THERE IS NO TITLE
$extraclass = '';
if ( $page_title == 'off' ) {
	$extraclass = ' no-title';
}
?>

<div id="primary-container" class="wrapper">

	<div class="page-content left <?php echo esc_attr( $bean_content_class ); ?>">

		<?php if ( $page_title == 'on' ) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php } ?>

		<div class="entry-content">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div>

		<div class="archives-list">
			<h6><?php esc_html_e( 'Last 30 Posts', 'grille' ); ?></h6>

			<ul>
				<?php
				$archive_30 = get_posts( 'numberposts=30' );
				foreach ( $archive_30 as $post ) :
					?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; ?>
			</ul>

			<h6><?php esc_html_e( 'Monthly Archive', 'grille' ); ?></h6>

			<ul><?php wp_get_archives( 'type=monthly' ); ?></ul>

			<h6><?php esc_html_e( 'Category Archive', 'grille' ); ?></h6>

			<ul><?php wp_list_categories( 'title_li=' ); ?></ul>

		</div><!-- END .archives-list -->

	</div><!-- END .page-content.left -->

	<?php if ( $bean_sidebar_location === 'right' ) { ?>
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
