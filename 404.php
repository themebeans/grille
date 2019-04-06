<?php
/**
 * The template for displaying the 404 error page
 * This page is set automatically, not through the use of a template
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header(); ?>

<div id="primary-container" class="wrapper">

	<div class="page-content">

		<div class="entry-content">

			<h1 class="entry-title">
				<?php echo esc_html( get_theme_mod( 'error_title' ) ); ?>
			</h1>

			<p><?php echo esc_html( get_theme_mod( 'error_text' ) ); ?></p>

			<p>&larr; <b><a href="javascript:javascript:history.go(-1)"><?php esc_html_e( 'Go Back', 'grille' ); ?></a></b><?php esc_html_e( ' or ', 'grille' ); ?><b><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go Home', 'grille' ); ?></a></b> &rarr;</p>

		</div>

	</div>

</div>

<?php
get_footer();
