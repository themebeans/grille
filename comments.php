<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<?php if ( have_comments() ) : ?>

		<div class="comments__wrapper">
			<div class="post-side comments-side comments-side--first block left hide-for-first">
				<h6 class="comments-title"><?php comments_number( esc_html__( '0 Comments ', 'grille' ), esc_html__( '1 Comment ', 'grille' ), esc_html__( '% Comments ', 'grille' ) ); ?></h6>
				<p><?php echo esc_html( get_theme_mod( 'comments_text' ) ); ?></p>
			</div>

			<ol class="post-content left comment-list commentlist list-reset">
				<?php
				wp_list_comments(
					array(
						'avatar_size' => 35,
						'style'       => 'ol',
						'short_ping'  => true,
					)
				);
				?>
			</ol>

			<?php the_comments_pagination(); ?>
		</div>

	<?php endif; ?>

	<div class="post-side block left post-respond comments-side hide-for-first">
		<h6 class="comments-title"><?php esc_html_e( 'Leave a Comment', 'grille' ); ?></h6>
		<p><?php echo esc_html( get_theme_mod( 'comments_form_text' ) ); ?></p>
	</div>

	<div class="post-content left">
		<?php comment_form(); ?>
	</div>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'grille' ); ?></p>
	<?php
	endif;
	?>

</div>
