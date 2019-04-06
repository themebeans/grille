<?php
/**
 * The template for displaying Search Results pages
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header(); ?>

<div id="primary-container" class="wrapper">

	<?php if ( have_posts() ) { ?>

		<div id="isotope-container" class="fadein">
			<?php
			global $query_string;
			query_posts( $query_string . '&posts_per_page=' . get_option( 'posts_per_page' ) . '' );
?>
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'loop-post' ); // PULL LOOP-PORTFOLIO.PHP
			endwhile;
endif;
			?>
		</div><!-- END #isotope-container -->

		<div id="page_nav" class="hide">
			<?php next_posts_link(); ?>
		</div><!-- END #page_nav -->

	<?php } else { ?>

		<div class="page-content left wrapper">

			<h1 class="entry-title"><?php printf( esc_html__( 'Nothing Found.', 'grille' ), get_search_query() ); ?></h1>
			<p><?php printf( esc_html__( 'Sorry, we couldn&#39;t find anything for "%s".', 'grille' ), get_search_query() ); ?></p>

			<form method="get" id="searchform" class="searchform search" action="<?php echo home_url(); ?>/">
				<input type="text" name="s" id="s" value="<?php esc_html_e( 'To search type & hit enter', 'grille' ); ?>" onfocus="if(this.value=='<?php esc_html_e( 'To search type & hit enter', 'grille' ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php esc_html_e( 'To search type & hit enter', 'grille' ); ?>';" />
			</form><!-- END #searchform -->

		</div><!-- END .page-content.left.wrapper -->

	<?php } //END else ?>

</div><!-- END #primary-container.wrapper -->

<?php
get_footer();
