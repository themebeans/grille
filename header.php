<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>

	<?php if ( ! is_page_template( 'template-comingsoon.php' ) && ! is_page_template( 'template-underconstruction.php' ) ) { ?>
		<nav id="mobile-nav" class="show-for-small">
			<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) ); ?>
		</nav>
	<?php } ?>

	<header id="header-container" class="wrapper">
		<div class="inner">

			<?php if ( ! is_page_template( 'template-comingsoon.php' ) && ! is_page_template( 'template-underconstruction.php' ) ) { ?>

				<div class="header-logo block left">

					<?php grille_site_logo(); ?>

					<div class="site-description">

						<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>

					</div>

				</div>

				<?php
				if ( is_page_template( 'template-portfolio-filter.php' ) || true === get_theme_mod( 'show_blog_filter' ) && is_home() ) {
					get_template_part( 'content', 'filter' );
				}
				?>

				<div class="header-menu block right hide-for-small">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'container'      => '',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'subtext left',
						)
					);
					?>
				</div>
			<?php } ?>

		</div>
	</header>
