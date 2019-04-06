<?php
/**
 * The file is for creating the blog post type meta.
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

function bean_metabox_post() {

	$prefix = '_bean_';

	$meta_box = array(
		'id'       => 'bean-meta-box-grid-featured',
		'title'    => esc_html__( 'Grid Featured Image', 'grille' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => esc_html__( 'Upload Image:', 'grille' ),
				'id'   => $prefix . 'grid_feat_img',
				'type' => 'file',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );

	$meta_box = array(
		'id'       => 'bean-meta-box-audio',
		'title'    => esc_html__( 'Audio Post Format', 'grille' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => esc_html__( 'MP3 File URL:', 'grille' ),
				'desc' => esc_html__( 'Upload or link to an MP3 file.', 'grille' ),
				'id'   => $prefix . 'audio_mp3',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Poster Image:', 'grille' ),
				'desc' => esc_html__( 'Upload or link a poster image.', 'grille' ),
				'id'   => $prefix . 'audio_poster_url',
				'type' => 'file',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );

	$meta_box = array(
		'id'       => 'bean-meta-box-gallery',
		'title'    => esc_html__( 'Gallery Post Format', 'grille' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => 'Gallery Images:',
				'desc' => 'Upload images here for your gallery post. Once uploaded, drag & drop to reorder.',
				'id'   => $prefix . 'post_upload_images',
				'type' => 'images',
				'std'  => esc_html__( 'Browse & Upload', 'grille' ),
			),
			array(
				'name' => esc_html__( 'Randomize Gallery:', 'grille' ),
				'id'   => $prefix . 'post_randomize',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Randomize the gallery on page load.', 'grille' ),
				'std'  => false,
			),
		),
	);
	bean_add_meta_box( $meta_box );

	$meta_box = array(
		'id'       => 'bean-meta-box-link',
		'title'    => esc_html__( 'Link Post Format', 'grille' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => esc_html__( 'Link URL:', 'grille' ),
				'desc' => esc_html__( 'ex: http://themebeans.com', 'grille' ),
				'id'   => $prefix . 'link_url',
				'type' => 'text',
				'std'  => 'http://',
			),
		),

	);
	bean_add_meta_box( $meta_box );

	$meta_box = array(
		'id'       => 'bean-meta-box-quote',
		'title'    => esc_html__( 'Quote Post Format', 'grille' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => esc_html__( 'Quote Text:', 'grille' ),
				'desc' => esc_html__( 'Insert your quote into this textarea.', 'grille' ),
				'id'   => $prefix . 'quote',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Quote Source:', 'grille' ),
				'desc' => esc_html__( 'Who said the quote above?', 'grille' ),
				'id'   => $prefix . 'quote_source',
				'type' => 'text',
				'std'  => '',
			),
		),

	);
	bean_add_meta_box( $meta_box );

	$meta_box = array(
		'id'       => 'bean-meta-box-video',
		'title'    => esc_html__( 'Video Post Format', 'grille' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => esc_html__( 'M4V File URL:', 'grille' ),
				'id'   => $prefix . 'video_m4v',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Poster Image:', 'grille' ),
				'id'   => $prefix . 'video_poster',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Embeded Code:', 'grille' ),
				'desc' => esc_html__( 'If you\'re not using self hosted video then you can include embeded code here.', 'grille' ),
				'id'   => $prefix . 'video_embed',
				'type' => 'textarea',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );
}
add_action( 'add_meta_boxes', 'bean_metabox_post' );
