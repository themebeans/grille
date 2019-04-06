<?php
/**
 * The file is for creating the download post type meta.
 * Meta output is defined on the download single editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

add_action( 'add_meta_boxes', 'bean_metabox_download' );
function bean_metabox_download() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  PORTFOLIO META SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'          => 'download-meta',
		'title'       => esc_html__( 'Download Meta Settings', 'grille' ),
		'description' => esc_html__( '', 'grille' ),
		'page'        => 'download',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name'    => esc_html__( 'Gallery Layout:', 'grille' ),
				'desc'    => esc_html__( 'Choose which layout to display.', 'grille' ),
				'id'      => $prefix . 'gallery_layout',
				'type'    => 'select',
				'std'     => 'stacked',
				'options' => array(
					'stacked' => 'Stacked Images',
					'slider'  => 'Slideshow',
				),
			),
			array(
				'name' => 'Gallery Images:',
				'desc' => 'Upload images here for the gallery.',
				'id'   => $prefix . 'portfolio_upload_images',
				'type' => 'images',
				'std'  => esc_html__( 'Browse & Upload', 'grille' ),
			),
			array(
				'name' => esc_html__( 'Download Source:', 'grille' ),
				'desc' => esc_html__( 'Display the client meta.', 'grille' ),
				'id'   => $prefix . 'portfolio_client',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Download Source URL:', 'grille' ),
				'desc' => esc_html__( 'Insert a URL to link your post to.', 'grille' ),
				'id'   => $prefix . 'portfolio_url',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Display Date:', 'grille' ),
				'id'   => $prefix . 'portfolio_date',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Can be modified in your Dashboard General Settings.', 'grille' ),
				'std'  => true,
			),
			array(
				'name' => esc_html__( 'Display Categories:', 'grille' ),
				'id'   => $prefix . 'portfolio_cats',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Select to display categories.', 'grille' ),
				'std'  => true,
			),
			array(
				'name' => esc_html__( 'Display Tags:', 'grille' ),
				'id'   => $prefix . 'portfolio_tags',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Select to display tags.', 'grille' ),
				'std'  => false,
			),
			array(
				'name' => esc_html__( 'Display Views:', 'grille' ),
				'id'   => $prefix . 'portfolio_views',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Select to display the view counter.', 'grille' ),
				'std'  => true,
			),
		),
	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  GALLERY POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-portfolio-images',
		'title'    => esc_html__( 'Gallery Post Format Settings', 'grille' ),
		'page'     => 'portfolio',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name'    => esc_html__( 'Gallery Layout:', 'grille' ),
				'desc'    => esc_html__( 'Choose which layout to display for this portfolio post.', 'grille' ),
				'id'      => $prefix . 'gallery_layout',
				'type'    => 'select',
				'std'     => 'stacked',
				'options' => array(
					'stacked' => 'Stacked Images',
					'slider'  => 'Slideshow',
				),
			),
			array(
				'name' => 'Gallery Images:',
				'desc' => 'Upload images here for your gallery post. Once uploaded, drag & drop to reorder.',
				'id'   => $prefix . 'portfolio_upload_images',
				'type' => 'images',
				'std'  => esc_html__( 'Browse & Upload', 'grille' ),
			),
			array(
				'name' => esc_html__( 'Randomize Gallery:', 'grille' ),
				'id'   => $prefix . 'portfolio_randomize',
				'type' => 'checkbox',
				'desc' => esc_html__( 'Randomize the gallery on page load.', 'grille' ),
				'std'  => false,
			),
		),
	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  AUDIO POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-portfolio-audio',
		'title'    => esc_html__( 'Audio Post Format Settings', 'grille' ),
		'page'     => 'portfolio',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => esc_html__( 'MP3 File URL:', 'grille' ),
				'desc' => esc_html__( '', 'grille' ),
				'id'   => $prefix . 'audio_mp3',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Poster Image:', 'grille' ),
				'desc' => esc_html__( 'The preview image for this audio track', 'grille' ),
				'id'   => $prefix . 'audio_poster_url',
				'type' => 'file',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  VIDEO POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-portfolio-video',
		'title'    => esc_html__( 'Video Post Format Settings', 'grille' ),
		'page'     => 'portfolio',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => esc_html__( 'M4V File URL:', 'grille' ),
				'desc' => esc_html__( '', 'grille' ),
				'id'   => $prefix . 'video_m4v',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Poster Image:', 'grille' ),
				'desc' => esc_html__( '', 'grille' ),
				'id'   => $prefix . 'video_poster',
				'type' => 'file',
				'std'  => '',
			),
			array(
				'name' => esc_html__( 'Embed Code:', 'grille' ),
				'desc' => esc_html__( 'If you are not using self hosted video then you can include embeded code here.', 'grille' ),
				'id'   => $prefix . 'portfolio_embed_code',
				'type' => 'textarea',
				'std'  => '',
			),
		),

	);
	bean_add_meta_box( $meta_box );
} // END function bean_metabox_download()
