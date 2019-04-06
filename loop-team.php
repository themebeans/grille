<?php
/**
 * The template for displaying the portfolio template/grid loop.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

$role  = get_post_meta( $post->ID, '_bean_team_role', true );
$quote = get_post_meta( $post->ID, '_bean_team_quote', true );
$url   = get_post_meta( $post->ID, '_bean_team_url', true );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'isotope-item' ); ?>>

	<?php if ( has_post_thumbnail() ) { ?>

		<div class="entry-content-media">
			<div class="post-thumb">
				<?php the_post_thumbnail( 'grid-feat' ); ?>
			</div>
		</div>

	<?php } ?>

	<?php if ( $url ) { ?>
		<h2 class="entry-title"><a href="<?php esc_url( $url ); ?>" target="_blank"><?php the_title(); ?></a></h2>
	<?php } else { ?>
		<h2 class="entry-title"><?php the_title(); ?></h2>
	<?php } ?>

	<?php if ( $role ) { ?>
		<div class="entry-meta">
			<span class="subtext"><?php echo esc_html( $role ); ?></span>
		</div>
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<?php edit_post_link( esc_html__( 'Edit', 'grille' ), '<span class="subtext">', '</span>' ); ?>

</div>
