<?php
/**
 * Theme Customizer functionality
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function grille_customize_register( $wp_customize ) {

	/**
	 * Customize.
	 */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'settings'        => array( 'blogname' ),
			'render_callback' => 'grille_customize_partial_blogname',
		)
	);

	/**
	 * Fonts.
	 */
	$fonts = bean_font_library();

	/**
	 * Add custom controls.
	 */
	require get_parent_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . 'class-themebeans-range-control.php' );

	/**
	 * Top-Level Customizer sections and panels.
	 */
	$wp_customize->add_section(
		'grille_theme_options', array(
			'title'    => esc_html__( 'Theme Options', 'grille' ),
			'priority' => 34,
		)
	);

	$wp_customize->add_panel(
		'typography_panel', array(
			'priority'    => 35,
			'title'       => esc_html__( 'Typography', 'grille' ),
			'description' => esc_html__( 'Customize your site typography.', 'grille' ),
		)
	);

	$wp_customize->add_section(
		'grille_portfolio', array(
			'title'    => esc_html__( 'Portfolio', 'grille' ),
			'priority' => 40,
		)
	);

	$wp_customize->add_section(
		'404_settings', array(
			'title'    => esc_html__( '404 & Coming Soon', 'grille' ),
			'priority' => 50,
		)
	);

	$wp_customize->add_section(
		'custom_heading_typography', array(
			'title'    => esc_html__( 'Headings', 'grille' ),
			'panel'    => 'typography_panel',
			'priority' => 7,
		)
	);

	$wp_customize->add_section(
		'custom_body_typography', array(
			'title'    => esc_html__( 'Body', 'grille' ),
			'panel'    => 'typography_panel',
			'priority' => 8,
		)
	);

	/**
	 * Customizer options.
	 */
	$wp_customize->add_setting(
		'footer_alt_text', array(
			'default'           => 'Im on <a href="">Twitter</a>, <a href="">Dribbble</a> & <a href="">Facebook</a>',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'grille_sanitize_html',
		)
	);

	$wp_customize->add_control(
		'footer_alt_text', array(
			'type'    => 'textarea',
			'label'   => esc_html__( 'Footer Alternate Text', 'grille' ),
			'section' => 'grille_theme_options',
		)
	);

	$wp_customize->add_setting(
		'footer_copyright', array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'grille_sanitize_html',
		)
	);

	$wp_customize->add_control(
		'footer_copyright', array(
			'type'    => 'textarea',
			'label'   => esc_html__( 'Footer Copyright Text', 'grille' ),
			'section' => 'grille_theme_options',
		)
	);

	$wp_customize->add_setting(
		'theme_accent_color', array(
			'default' => '#38C994',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'theme_accent_color', array(
				'label'    => esc_html__( 'Accent Color', 'grille' ),
				'section'  => 'colors',
				'settings' => 'theme_accent_color',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'thumb_bg_color', array(
			'default' => '#38C994',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'thumb_bg_color', array(
				'label'    => esc_html__( 'Thumbnail Accent Color', 'grille' ),
				'section'  => 'colors',
				'settings' => 'thumb_bg_color',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'header_text_color', array(
			'default' => '#333',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_text_color', array(
				'label'    => esc_html__( 'Header Font Color', 'grille' ),
				'section'  => 'colors',
				'settings' => 'header_text_color',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'body_text_color', array(
			'default' => '#333',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'body_text_color', array(
				'label'    => esc_html__( 'Body Font Color', 'grille' ),
				'section'  => 'colors',
				'settings' => 'body_text_color',
				'priority' => 4,
			)
		)
	);

	$wp_customize->add_setting(
		'body_sec_text_color', array(
			'default' => '#ACACAC',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'body_sec_text_color', array(
				'label'    => esc_html__( 'Body Secondary Font Color', 'grille' ),
				'section'  => 'colors',
				'settings' => 'body_sec_text_color',
				'priority' => 5,
			)
		)
	);

	$wp_customize->add_setting(
		'colophon_bg_color', array(
			'default' => '#F9F9F9',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'colophon_bg_color', array(
				'label'    => esc_html__( 'Footer Background Color', 'grille' ),
				'section'  => 'colors',
				'settings' => 'colophon_bg_color',
				'priority' => 6,
			)
		)
	);

	$wp_customize->add_setting(
		'colophon_text_color', array(
			'default' => '#ACACAC',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'colophon_text_color', array(
				'label'    => esc_html__( 'Footer Text Color', 'grille' ),
				'section'  => 'colors',
				'settings' => 'colophon_text_color',
				'priority' => 7,
			)
		)
	);

	$wp_customize->add_setting( 'type_select_headings', array( 'default' => 'Roboto Slab' ) );
	$wp_customize->add_control(
		'type_select_headings',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Heading Font', 'grille' ),
			'description' => esc_html__( 'Customize the header font.', 'grille' ),
			'section'     => 'custom_heading_typography',
			'choices'     => $fonts,
		)
	);

	$wp_customize->add_setting(
		'type_slider_h1_size', array(
			'default'           => '24',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h1_size', array(
				'default'     => '24',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H1 Size', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h1_lineheight', array(
			'default'           => '36',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h1_lineheight', array(
				'default'     => '36',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H1 Line Height', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h1_letterspacing', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h1_letterspacing', array(
				'default'     => '0',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H1 Letter Spacing', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h1_size', array(
			'default'           => '24',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h1_size', array(
				'default'     => '24',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H1 Size', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h1_lineheight', array(
			'default'           => '36',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h1_lineheight', array(
				'default'     => '36',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H1 Line Height', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h1_letterspacing', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h1_letterspacing', array(
				'default'     => '0',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H1 Letter Spacing', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h2_size', array(
			'default'           => '20',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h2_size', array(
				'default'     => '20',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H2 Size', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h2_lineheight', array(
			'default'           => '32',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h2_lineheight', array(
				'default'     => '32',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H2 Line Height', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h2_letterspacing', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h2_letterspacing', array(
				'default'     => '0',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H2 Letter Spacing', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h3_size', array(
			'default'           => '18',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h3_size', array(
				'default'     => '18',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H3 Size', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h3_lineheight', array(
			'default'           => '30',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h3_lineheight', array(
				'default'     => '30',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H3 Line Height', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h3_letterspacing', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h3_letterspacing', array(
				'default'     => '0',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H3 Letter Spacing', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h4_size', array(
			'default'           => '16',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h4_size', array(
				'default'     => '16',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H4 Size', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h4_lineheight', array(
			'default'           => '26',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h4_lineheight', array(
				'default'     => '26',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H4 Line Height', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h4_letterspacing', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h4_letterspacing', array(
				'default'     => '0',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H4 Letter Spacing', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h5_size', array(
			'default'           => '14',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h5_size', array(
				'default'     => '14',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H5 Size', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h5_lineheight', array(
			'default'           => '27',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h5_lineheight', array(
				'default'     => '27',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H5 Line Height', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_h5_letterspacing', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_h5_letterspacing', array(
				'default'     => '0',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H5 Letter Spacing', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_heading_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting( 'type_select_body', array( 'default' => 'Courier' ) );
	$wp_customize->add_control(
		'type_select_body',
		array(
			'type'     => 'select',
			'label'    => esc_html__( 'Body Font', 'grille' ),
			'section'  => 'custom_body_typography',
			'priority' => 1,
			'choices'  => $fonts,
		)
	);

	$wp_customize->add_setting(
		'type_slider_body_size', array(
			'default'           => '14',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_body_size', array(
				'default'     => '14',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Body Size', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_body_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_body_lineheight', array(
			'default'           => '24',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_body_lineheight', array(
				'default'     => '24',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Body Line Height', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_body_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 80,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'type_slider_body_letterspacing', array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'type_slider_body_letterspacing', array(
				'default'     => '0',
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'H5 Letter Spacing', 'grille' ),
				'description' => 'px',
				'section'     => 'custom_body_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting( 'show_portfolio_loop_single', array( 'default' => false ) );
	$wp_customize->add_control(
		'show_portfolio_loop_single',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Enable Single Portfolio Loop', 'grille' ),
			'section'  => 'grille_portfolio',
			'priority' => 5,
		)
	);

	$wp_customize->add_setting( 'show_portfolio_sharing', array( 'default' => false ) );
	$wp_customize->add_control(
		'show_portfolio_sharing',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Enable Portfolio Sharing', 'grille' ),
			'section'  => 'grille_portfolio',
			'priority' => 5,
		)
	);

	$wp_customize->add_setting( 'twitter_profile', array( 'default' => '' ) );
	$wp_customize->add_control(
		'twitter_profile',
		array(
			'label'    => esc_html__( 'Twitter Username (eg:ThemeBeans)', 'grille' ),
			'section'  => 'grille_portfolio',
			'type'     => 'text',
			'priority' => 6,
		)
	);

	$wp_customize->add_setting( 'portfolio_posts_count', array( 'default' => '-1' ) );
	$wp_customize->add_control(
		'portfolio_posts_count',
		array(
			'label'    => esc_html__( 'Portfolio Template Count', 'grille' ),
			'section'  => 'grille_portfolio',
			'type'     => 'text',
			'priority' => 6,
		)
	);

	$wp_customize->add_setting( 'portfolio_css_filter', array( 'default' => 'none' ) );
	$wp_customize->add_control(
		'portfolio_css_filter',
		array(
			'type'     => 'select',
			'label'    => esc_html__( 'CSS3 Filter', 'grille' ),
			'section'  => 'grille_portfolio',
			'priority' => 10,
			'choices'  => array(
				'none'       => 'None',
				'grayscale'  => 'Black & White',
				'sepia'      => 'Sepia Tone',
				'saturation' => 'High Saturation',
			),
		)
	);

	$wp_customize->add_setting( 'show_blog_filter', array( 'default' => false ) );
	$wp_customize->add_control(
		'show_blog_filter',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Display Posts Filter', 'grille' ),
			'section'  => 'grille_theme_options',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'show_tags', array( 'default' => false ) );
	$wp_customize->add_control(
		'show_tags',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Display Single Post Tags', 'grille' ),
			'section'  => 'grille_theme_options',
			'priority' => 3,
		)
	);

	$wp_customize->add_setting( 'show_pagination', array( 'default' => false ) );
	$wp_customize->add_control(
		'show_pagination',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Display Pagination', 'grille' ),
			'section'  => 'grille_theme_options',
			'priority' => 4,
		)
	);

	$wp_customize->add_setting( 'show_related_posts', array( 'default' => false ) );
	$wp_customize->add_control(
		'show_related_posts',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Display Related Posts', 'grille' ),
			'section'  => 'grille_theme_options',
			'priority' => 5,
		)
	);

	$wp_customize->add_setting( 'show_archive_text', array( 'default' => false ) );
	$wp_customize->add_control(
		'show_archive_text',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Display Archive Text', 'grille' ),
			'section'  => 'grille_theme_options',
			'priority' => 6,
		)
	);

	$wp_customize->add_setting( 'post_excerpt', array( 'default' => '17' ) );
	$wp_customize->add_control(
		'post_excerpt',
		array(
			'label'    => esc_html__( 'Post Excerpt Word Count', 'grille' ),
			'section'  => 'grille_theme_options',
			'type'     => 'text',
			'priority' => 7,
		)
	);

	$wp_customize->add_setting( 'comments_text', array( 'default' => 'Have something to say? Feel free to add your voice.' ) );
	$wp_customize->add_control(
		'comments_text',
		array(
			'label'    => esc_html__( 'Comments Text', 'grille' ),
			'section'  => 'grille_theme_options',
			'type'     => 'text',
			'priority' => 8,
		)
	);

	$wp_customize->add_setting( 'comments_form_text', array( 'default' => 'Join the conversation. Come on, lets hear it folks.' ) );
	$wp_customize->add_control(
		'comments_form_text',
		array(
			'label'    => esc_html__( 'Comments Form Text', 'grille' ),
			'section'  => 'grille_theme_options',
			'type'     => 'text',
			'priority' => 9,
		)
	);

	$wp_customize->add_setting( 'error_title', array( 'default' => 'Shucks.' ) );
	$wp_customize->add_control(
		'error_title',
		array(
			'label'    => esc_html__( '404 Header', 'grille' ),
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'error_text', array( 'default' => 'Unfortunately, this page is long gone.' ) );
	$wp_customize->add_control(
		'error_text',
		array(
			'label'    => esc_html__( '404 Text', 'grille' ),
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 2,
		)
	);

	$wp_customize->add_setting( 'comingsoon_year', array( 'default' => '2016' ) );
	$wp_customize->add_control(
		'comingsoon_year',
		array(
			'label'    => esc_html__( 'Year (ex: 2014)', 'grille' ),
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 3,
		)
	);

	$wp_customize->add_setting( 'comingsoon_month', array( 'default' => '01' ) );
	$wp_customize->add_control(
		'comingsoon_month',
		array(
			'label'    => esc_html__( 'Month (ex: 01 for JAN)', 'grille' ),
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 4,
		)
	);

	$wp_customize->add_setting( 'comingsoon_day', array( 'default' => '01' ) );
	$wp_customize->add_control(
		'comingsoon_day',
		array(
			'label'    => esc_html__( 'Day (ex: 01)', 'grille' ),
			'section'  => '404_settings',
			'type'     => 'text',
			'priority' => 5,
		)
	);
}
add_action( 'customize_register', 'grille_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function grille_customize_preview_js() {
	wp_enqueue_script( 'grille-customize-preview', get_theme_file_uri( '/assets/js/admin/customize-preview' . GRILLE_ASSET_SUFFIX . '.js' ), array( 'customize-preview' ), '@@pkg.version', true );
}
add_action( 'customize_preview_init', 'grille_customize_preview_js' );

/**
 * CSS to make the Customizer controls look a bit better.
 */
function grille_customize_controls_css() {
	wp_enqueue_style( 'grille-customize-preview', get_theme_file_uri( '/assets/css/customize-controls' . GRILLE_ASSET_SUFFIX . '.css' ), '@@pkg.version', true );
}
add_action( 'customize_controls_print_styles', 'grille_customize_controls_css' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @see tabor_customize_register()
 *
 * @return void
 */
function grille_customize_partial_blogname() {
	bloginfo( 'name' );
}
