<?php
/**
 * The template for displaying the default searchform whenever it is called in the theme.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */
	?>

<form method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>/">
	<input type="text" name="s" id="s" value="<?php esc_html_e( 'To search type & hit enter', 'grille' ); ?>" onfocus="if(this.value=='<?php esc_html_e( 'To search type & hit enter', 'grille' ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php esc_html_e( 'To search type & hit enter', 'grille' ); ?>';" />
</form><!-- END #searchform -->
