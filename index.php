<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

get_header(); ?>

<div id="primary-container" class="wrapper">

	<?php if ( is_archive() && get_theme_mod( 'show_archive_text' ) == true ) { ?>

		<div class="block portfolio-archive">

			<?php
			if ( is_category() ) {
				$page_title = sprintf( esc_html__( '%s', 'grille' ), single_cat_title( '', false ) );
			} elseif ( is_tag() ) {
				$page_title = sprintf( esc_html__( '%s', 'grille' ), single_tag_title( '', false ) );
			} elseif ( is_date() ) {
				if ( is_month() ) {
					$page_title = sprintf( esc_html__( 'Archive for: %s', 'grille' ), get_the_time( 'F, Y' ) );
				} elseif ( is_year() ) {
					$page_title = sprintf( esc_html__( 'Archive for: %s', 'grille' ), get_the_time( 'Y' ) );
				} elseif ( is_day() ) {
					$page_title = sprintf( esc_html__( 'Archive for: %s', 'grille' ), get_the_time( get_option( 'date_format' ) ) );
				} else {
					$page_title = esc_html__( 'Archives', 'grille' );
				}
			} elseif ( is_author() ) {
				if ( get_query_var( 'author_name' ) ) {
					$curauth = get_user_by( 'login', get_query_var( 'author_name' ) );
				} else {
					$curauth = get_userdata( get_query_var( 'author' ) );
				}
				$author_name = $curauth->display_name;
				$title       = sprintf( esc_html__( 'Articles by %s', 'grille' ), $author_name );
				$page_title  = $author_avatar . $title;
			} else {
				$page_title = single_term_title( '', false );
			}
				?>

			<h1 class="entry-title"><?php echo esc_html( $page_title ); ?></h1>

			<?php if ( category_description() ) { ?>
				<p><?php echo category_description(); ?></p>
			<?php } ?>
		</div>

	<?php } ?>

	<div id="isotope-container" class="fadein">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'loop-post' );
			endwhile;
		endif;
		?>
	</div>

	<div id="page_nav" class="hide">
		<?php next_posts_link(); ?>
	</div>

</div>

<?php
get_footer();
