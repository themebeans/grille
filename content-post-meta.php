<?php
/**
 * The file is for displaying the blog post meta.
 * This has it's own content file because we call it among various post formats.
 * If you edit this file, its output will be edited on all post formats.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

$mycontent    = $post->post_content;
$words        = str_word_count( strip_tags( $mycontent ) );
$reading_time = floor( $words / 100 );

if ( 0 === $reading_time ) {
	$reading_time = '1';
}
?>

<div class="entry-meta subtext">

	<ul>
		<li><span><?php esc_html_e( 'By ', 'grille' ); ?></span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></li>
		<li><span><?php esc_html_e( 'Date ', 'grille' ); ?></span> <?php esc_html( the_time( get_option( 'date_format' ) ) ); ?></li>
		<li><span><?php esc_html_e( 'Comments ', 'grille' ); ?></span> <?php comments_popup_link( esc_html__( '0', 'grille' ), esc_html__( '1', 'grille' ), esc_html__( '%', 'grille' ) ); ?></li>
		<li><span><?php esc_html_e( 'Category ', 'grille' ); ?></span> <?php the_category( ', ' ); ?></li>
		<li>
			<span><?php esc_html_e( 'Time ', 'grille' ); ?></span>
			<?php
			echo esc_html( $reading_time );
			esc_html_e( ' Minute Read', 'grille' );
			?>
		</li>
		<?php if ( true === get_theme_mod( 'show_tags' ) && has_tag() && is_singular() ) { ?>
			<li><span><?php esc_html_e( 'Tags ', 'grille' ); ?></span> <?php echo the_tags( '', ', ', '' ) . ''; ?></li>
		<?php } ?>
		<li><?php edit_post_link( esc_html__( '[Edit]', 'grille' ), '<span class="subtext">', '</span>' ); ?></li>
	</ul>

</div>
