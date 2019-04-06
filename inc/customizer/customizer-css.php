<?php
/**
 * Enqueues front-end CSS for Customizer options.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

/**
 * Set the Custom CSS via Customizer options.
 */
function grille_customizer_css() {

	$theme_accent_color  = get_theme_mod( 'theme_accent_color', '#38C994' );
	$thumb_bg_color      = get_theme_mod( 'thumb_bg_color', '#38C994' );
	$body_text_color     = get_theme_mod( 'body_text_color', '#333' );
	$header_text_color   = get_theme_mod( 'header_text_color', '#333' );
	$body_sec_text_color = get_theme_mod( 'body_sec_text_color', '#ACACAC' );
	$colophon_bg_color   = get_theme_mod( 'colophon_bg_color', '#F9F9F9' );
	$colophon_text_color = get_theme_mod( 'colophon_text_color', '#ACACAC' );

	$type_select_headings = get_theme_mod( 'type_select_headings' );
	$h1_size              = get_theme_mod( 'type_slider_h1_size' );
	$h1_lineheight        = get_theme_mod( 'type_slider_h1_lineheight' );
	$h1_letterspacing     = get_theme_mod( 'type_slider_h1_letterspacing' );

	$h2_size          = get_theme_mod( 'type_slider_h2_size' );
	$h2_lineheight    = get_theme_mod( 'type_slider_h2_lineheight' );
	$h2_letterspacing = get_theme_mod( 'type_slider_h2_letterspacing' );

	$h3_size          = get_theme_mod( 'type_slider_h3_size' );
	$h3_lineheight    = get_theme_mod( 'type_slider_h3_lineheight' );
	$h3_letterspacing = get_theme_mod( 'type_slider_h3_letterspacing' );

	$h4_size          = get_theme_mod( 'type_slider_h4_size' );
	$h4_lineheight    = get_theme_mod( 'type_slider_h4_lineheight' );
	$h4_letterspacing = get_theme_mod( 'type_slider_h4_letterspacing' );

	$h5_size          = get_theme_mod( 'type_slider_h5_size' );
	$h5_lineheight    = get_theme_mod( 'type_slider_h5_lineheight' );
	$h5_letterspacing = get_theme_mod( 'type_slider_h5_letterspacing' );

	$type_select_body   = get_theme_mod( 'type_select_body' );
	$body_size          = get_theme_mod( 'type_slider_body_size' );
	$body_lineheight    = get_theme_mod( 'type_slider_body_lineheight' );
	$body_letterspacing = get_theme_mod( 'type_slider_body_letterspacing' );

	$css =
	'
	a { color:' . $theme_accent_color . '; }

	.cats,
	.author-tag,
	#filter a.active,
	.entry-meta a:hover,
	.header-alt a:hover,
	.pagination a:hover,
	.entry-title a:hover,
	.comment-meta a:hover,
	.comment-author a:hover,
	.site-description a:hover,
	.isotope-item .entry-meta a:hover,
	.isotope-item.post .entry-meta a:hover,
	#header-container li.current-menu-item a,
	.isotope-item.portfolio .entry-meta a:hover,
	.isotope-item.type-download .entry-meta a:hover,
	h1 a:hover,
	h2.entry-title a:hover,
	.logo h1:hover,
	.bean-tabs > li.active > a,
	.bean-panel-title > a:hover,
	#header-container ul li a:hover,
	#colophon .inner .subtext a:hover,
	.bean-tabs > li.active > a:hover,
	.team .post-edit-link:hover,
	.bean-tabs > li.active > a:focus,
	.widget ul.product_list_widget li a:hover,
	.single-product ul.tabs li.active a,
	.widget_bean_tweets .follow-link { color:' . $theme_accent_color . '!important; }

	input:focus,
	textarea:focus,
	.subscribe .mailbag-wrap input[type="text"]:focus,
	.subscribe .mailbag-wrap input[type="email"]:focus,
	.subscribe .mailbag-wrap input[type="password"]:focus,
	.single-product ul.tabs li.active a { border-color:' . $theme_accent_color . '!important; }

	.btn,
	.button,
	.new-tag,
	.onsale,
	.tagcloud a,
	button.button,
	.letter-logo a,
	.edd_checkout a,
	div.jp-play-bar,
	input[type="reset"],
	.btn[type="submit"],
	input[type="button"],
	input[type="submit"],
	.button[type="submit"],
	div.jp-volume-bar-value,
	.comment-form-rating p.stars a.active,
	.comment-form-rating p.stars a.active:hover,
	.entry-quote, .entry-link, .entry-aside { background-color:' . $theme_accent_color . '; }

	.bean-quote, .edd-submit.button { background-color:' . $theme_accent_color . '!important; }

	body .edd-cart-added-alert { color:' . $theme_accent_color . '!important; }

	.bean-shot a,
	.flickr_badge_image a,
	.instagram_badge_image a,
	.bean500px_badge_image a,
	.isotope-item .post-thumb,
	.widget_bean_portfolio .post-thumb { background-color:' . $thumb_bg_color . '; }

	h4.entry-title a, h1, h1 a, h2 a, h3, h4, h5 { color:' . $header_text_color . '!important; }

	body, form label, body #comments-list ol li { color:' . $body_text_color . '!important; }

	h6,
	.entry-meta .subtext,
	.bean-tabs > li > a, .bean-panel-title > a,
	blockquote,
	.post-date,
	#login span,
	span.required,
	.moderation,
	.comment-meta,
	.comment-meta a,
	#login span a,
	.entry-meta li a,
	.entry-content li,
	.bean-likes.active,
	.entry-meta li span,
	.logged-in-as a:hover,
	.entry-meta.subtext,
	a.comment-edit-link,
	.widget_categories li,
	.entry-meta span.count,
	.logged-in-as.subtext,
	#header-container li a,
	.bean-likes.active span,
	.comment-awaiting-moderation,
	.isotope-item.post .entry-meta a,
	#edd-card-cvc-wrap .edd-description,
	.isotope-item.portfolio .entry-meta a,
	.isotope-item.type-download .entry-meta a,
	.widget_bean_tweets a.twitter-time-stamp,
	.entry-meta li.likes a.bean-likes.active,
	.search-results .isotope-item .entry-meta a { color:' . $body_sec_text_color . '!important; }

	#colophon .inner  { background-color:' . $colophon_bg_color . '!important; }

	#colophon .inner .subtext,
	#colophon .inner .subtext a { color:' . $colophon_text_color . '!important; }

	h1 { font-size: ' . $h1_size . 'px!important; line-height: ' . $h1_lineheight . 'px!important; letter-spacing: ' . $h1_letterspacing . 'px!important; }
	h2 { font-size: ' . $h2_size . 'px!important; line-height: ' . $h2_lineheight . 'px!important; letter-spacing: ' . $h2_letterspacing . 'px!important; }
	h3 { font-size: ' . $h3_size . 'px!important; line-height: ' . $h3_lineheight . 'px!important; letter-spacing: ' . $h3_letterspacing . 'px!important; }
	h4 { font-size: ' . $h4_size . 'px!important; line-height: ' . $h4_lineheight . 'px!important; letter-spacing: ' . $h4_letterspacing . 'px!important; }
	h5 { font-size: ' . $h5_size . 'px!important; line-height: ' . $h5_lineheight . 'px!important; letter-spacing: ' . $h5_letterspacing . 'px!important; }
	p, body { font-size: ' . $body_size . 'px!important; line-height: ' . $body_lineheight . 'px!important; letter-spacing: ' . $body_letterspacing . 'px!important; }
	';

	if ( 'default' !== $type_select_headings ) {
		$css .= '
		h1,
		h2,
		h3,
		h4,
		h5,
		blockquote p,
		.comment-author cite,
		.bean-pricing-table .table-mast h5.title {
			font-family: ' . $type_select_headings . '!important;
		}
	';
	}

	if ( 'default' !== $type_select_body ) {
		$css .=
		'p,
		body,
		input,
		.btn,
		.button,
		textarea,
		.tagcloud a,
		.btn[type="submit"],
		.button[type="submit"],
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		#cancel-comment-reply-link { font-family: ' . $type_select_body . '!important; }
	';
	}

	if ( get_theme_mod( 'portfolio_css_filter' ) ) {
		switch ( get_theme_mod( 'portfolio_css_filter' ) ) {
			case 'none':
				break;
			case 'grayscale':
				$css .= '.isotope-item img{ -webkit-filter: grayscale(100%); }';
				break;
			case 'sepia':
				$css .= '.isotope-item img { -webkit-filter: sepia(50%); }';
				break;
			case 'saturation':
				$css .= '.isotope-item img { -webkit-filter: saturate(150%); }';
				break;
		}
	}

	include_once ABSPATH . 'wp-admin/includes/plugin.php'; if ( is_plugin_active( 'bean-pricingtables/bean-pricingtables.php' ) ) {
		$css .= '.bean-pricing-table .pricing-column li span {color:' . $theme_accent_color . '!important;}#powerTip,.bean-pricing-table .pricing-highlighted{background-color:' . $theme_accent_color . '!important;}#powerTip:after {border-color:' . $theme_accent_color . ' transparent!important; }';
	}

	return wp_strip_all_tags( $css );
}

/**
 * Enqueue the Customizer styles on the front-end.
 */
function grill_customizer_styles() {
	wp_add_inline_style( 'grille-style', grille_customizer_css() );
}
add_action( 'wp_enqueue_scripts', 'grill_customizer_styles' );

