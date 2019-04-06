<?php
/**
 * The file is for displaying the portfolio filter.
 * This file is called via header.php and in use on the template-portfolio-filter.php.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

if ( is_page_template( 'template-portfolio-filter.php' ) ) {
	$terms = get_terms( 'portfolio_category' );
} else {
	$terms = get_terms( 'category' );
}

if ( ! empty( $terms ) ) { ?>
	<div class="post-filter block left">
		<ul id="filter" class="subtext hide-for-second">
			<li><a href="#all" class="active" data-filter="*"><?php echo esc_html__( 'All', 'bean' ); ?></a></li>
			<?php
			foreach ( $terms as $term ) {
				echo '<li><a href="javascript:void(0);" data-filter=".' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</a></li>';
			}
			?>
		</ul>
	</div>
<?php
}
