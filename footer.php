<?php
/**
 * The template for displaying the footer
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

?>

<?php if ( ! is_page_template( 'template-comingsoon.php' ) && ! is_page_template( 'template-underconstruction.php' ) ) { ?>
	<?php if ( is_active_sidebar( 'footer-col-1' ) || is_active_sidebar( 'footer-col-2' ) || is_active_sidebar( 'footer-col-3' ) || is_active_sidebar( 'footer-col-4' ) ) { ?>
		<footer id="footer-container" class="wrapper">
			<div class="inner">
				<div class="border wrapper"></div>
				<div class="footer-widgets">
					<?php if ( is_active_sidebar( 'footer-col-1' ) ) { ?>
						<div class="area-1 block left">
							<?php dynamic_sidebar( 'footer-col-1' ); ?>
						</div>
					<?php } ?>
					<?php if ( is_active_sidebar( 'footer-col-2' ) ) { ?>
						<div class="area-2 block left">
							<?php dynamic_sidebar( 'footer-col-2' ); ?>
						</div>
					<?php } ?>
					<?php if ( is_active_sidebar( 'footer-col-3' ) ) { ?>
						<div class="area-3 block left">
							<?php dynamic_sidebar( 'footer-col-3' ); ?>
						</div>
					<?php } ?>
					<?php if ( is_active_sidebar( 'footer-col-4' ) ) { ?>
						<div class="area-4 block left hide-for-first">
							<?php dynamic_sidebar( 'footer-col-4' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</footer>
	<?php } ?>
<?php } ?>

<div id="colophon">
	<div class="inner">
		<div class="wrapper">
			<div class="copyright block left">
				<p class="subtext alt-text">
				<?php
				if ( get_theme_mod( 'footer_copyright' ) ) {
					echo get_theme_mod( 'footer_copyright' );
				} else {
					echo '&copy; ' . date( 'Y' ) . ' <a href="http://themebeans.com/theme/grille/?ref=grilledemo">Grille</a> WordPress by <a href="http://themebeans.com/?ref=grilledemo">ThemeBeans</a>';
				}
					?>
				</p>
			</div>

			<?php if ( get_theme_mod( 'footer_alt_text' ) ) { ?>
				<div class="alt-text block right hide-for-second">
					<p class="subtext"><?php echo get_theme_mod( 'footer_alt_text' ); ?></p>
				</div>
			<?php } ?>

		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
