<?php
/**
 * The file is for creating the page post type meta.
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

function bean_metabox_page() {

	$prefix = '_bean_';

	$meta_box = array(
		'id'       => 'page-meta',
		'title'    => esc_html__( 'Page Meta Settings', 'grille' ),
		'page'     => 'page',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => 'Display Page Title:',
				'id'   => $prefix . 'page_title',
				'type' => 'checkbox',
				'desc' => 'Select to display the page title above the main entry content.',
				'std'  => true,
			),
			array(
				'name'    => esc_html__( 'Sidebar Layout:', 'grille' ),
				'desc'    => esc_html__( 'Select to display a fullwidth or right sidebar page.', 'grille' ),
				'id'      => $prefix . 'page_layout',
				'type'    => 'radio',
				'std'     => 'right',
				'options' => array(
					'none'  => esc_html__( 'Fullwidth', 'grille' ),
					'right' => esc_html__( 'Right Sidebar', 'grille' ),
				),
			),
		),
	);
	bean_add_meta_box( $meta_box );
}
add_action( 'add_meta_boxes', 'bean_metabox_page' );
