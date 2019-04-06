<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

if ( ! defined( 'GRILLE_DEBUG' ) ) :
	/**
	 * Check to see if development mode is active.
	 * If set to false, the theme will load un-minified assets.
	 */
	define( 'GRILLE_DEBUG', true );
endif;

if ( ! defined( 'GRILLE_ASSET_SUFFIX' ) ) :
	/**
	 * If not set to true, let's serve minified .css and .js assets.
	 * Don't modify this, unless you know what you're doing!
	 */
	if ( ! defined( 'GRILLE_DEBUG' ) || true === GRILLE_DEBUG ) {
		define( 'GRILLE_ASSET_SUFFIX', null );
	} else {
		define( 'GRILLE_ASSET_SUFFIX', '.min' );
	}
endif;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function grille_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on @@pkg.name, use a find and replace
	 * to change 'grille' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'grille', get_parent_theme_file_path( '/languages' ) );

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Filter Tabor's custom-background support argument.
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 * }
	 */
	$args = array(
		'default-color' => 'ffffff',
	);
	add_theme_support( 'custom-background', $args );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 140, 140 );

	add_image_size( 'sml-thumbnail', 50, 50, true );
	add_image_size( 'post-feat', 940, 9999, false );
	add_image_size( 'port-full', 1320, 9999, false );
	add_image_size( 'grid-feat', 600, 9999 );

	// Set the content width in pixels, based on the theme's design and stylesheet.
	$GLOBALS['content_width'] = apply_filters( 'grille_content_width', 1280 );

	/*
	 * This theme uses wp_nav_menu() in the following locations.
	 */
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Navigation', 'grille' ),
			'mobile-menu'  => esc_html__( 'Mobile Navigation', 'grille' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'link',
			'aside',
			'video',
			'audio',
			'gallery',
			'quote',
		)
	);

	/*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	add_editor_style( array( 'assets/css/editor' . GRILLE_ASSET_SUFFIX . '.css', grille_fonts_url() ) );

	/*
	 * Enable support for Customizer Selective Refresh.
	 * See: https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for the WordPress default Theme Logo
	 * See: https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo', array(
			'flex-width' => true,
		)
	);

	/*
	 * Delcare support for WooCommerce.
	 * See: https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );
}
add_action( 'after_setup_theme', 'grille_setup' );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function grille_widget_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Internal Sidebar', 'grille' ),
			'description'   => esc_html__( 'Widget area for the primary sidebar.', 'grille' ),
			'id'            => 'internal-sidebar',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'grille' ),
			'description'   => esc_html__( 'Widget area for the first footer column.', 'grille' ),
			'id'            => 'footer-col-1',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'grille' ),
			'description'   => esc_html__( 'Widget area for the second footer column.', 'grille' ),
			'id'            => 'footer-col-2',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'grille' ),
			'description'   => esc_html__( 'Widget area for the third footer column.', 'grille' ),
			'id'            => 'footer-col-3',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 4', 'grille' ),
			'description'   => esc_html__( 'Widget area for the fourth footer column.', 'grille' ),
			'id'            => 'footer-col-4',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);

	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Shop Sidebar', 'grille' ),
				'description'   => esc_html__( 'Widget area for the WooCommerce shop.', 'grille' ),
				'id'            => 'shop-sidebar',
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
		);
	}
}
add_action( 'widgets_init', 'grille_widget_init' );

/**
 * Enqueue scripts and styles.
 */
function grille_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'grille-fonts', grille_fonts_url(), array(), null );

	// Load theme styles.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'grille-style', get_parent_theme_file_uri( '/style' . GRILLE_ASSET_SUFFIX . '.css' ) );
		wp_enqueue_style( 'grille-child-style', get_theme_file_uri( '/style.css' ), false, '@@pkg.version', 'all' );
	} else {
		wp_enqueue_style( 'grille-style', get_theme_file_uri( '/style' . GRILLE_ASSET_SUFFIX . '.css' ) );
	}

	if ( class_exists( 'Easy_Digital_Downloads' ) ) {
		wp_enqueue_style( 'edd', get_theme_file_uri( '/assets/css/edd.css' ), false, '1.0', 'all' );
	}

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'grille-woocommerce', get_theme_file_uri( '/assets/css/woocommerce.css' ), false, '1.0', 'all' );
	}

	/**
	 * Now let's check the same for the scripts.
	 */
	if ( GRILLE_DEBUG ) {

		// Vendor scripts.
		wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/vendors/isotope.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'infinitescroll', get_theme_file_uri( '/assets/js/vendors/infinitescroll.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'fitvids', get_theme_file_uri( '/assets/js/vendors/fitvids.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'meanmenu', get_theme_file_uri( '/assets/js/vendors/meanmenu.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'grille-libraries', get_theme_file_uri( '/assets/js/vendors/custom-libraries.js' ), array( 'jquery' ), '@@pkg.version', true );

		// Custom scripts.
		wp_enqueue_script( 'grille-coming-soon', get_theme_file_uri( '/assets/js/custom/coming-soon.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'grille-likes', get_theme_file_uri( '/assets/js/custom/likes.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'grille-global', get_theme_file_uri( '/assets/js/custom/global.js' ), array( 'jquery', 'imagesloaded' ), '@@pkg.version', true );

		$translation_handle       = 'grille-global'; // Variable for wp_localize_script.
		$translation_handle_likes = 'grille-likes'; // Variable for wp_localize_script.

	} else {
		wp_enqueue_script( 'tabor-vendors-min', get_theme_file_uri( '/assets/js/vendors.min.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'tabor-custom-min', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery', 'imagesloaded' ), '@@pkg.version', true );

		$translation_handle       = 'grille-custom-min'; // Variable for wp_localize_script for minified javascript.
		$translation_handle_likes = 'grille-custom-min'; // Variable for wp_localize_script for minified javascript.
	}

	// Localization.
	wp_localize_script( $translation_handle, 'WP_TEMPLATE_DIRECTORY_URI', array( 0 => get_template_directory_uri() ) );

	if ( is_page_template( 'template-contact.php' ) || is_singular( 'post' ) ) {
		wp_enqueue_script( 'validation', 'https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array( 'jquery' ), '@@pkg.version', true );
	}

	// Load the standard WordPress comments reply javascript.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Localize the script with new data.
	$localize_array = array(
		'url'   => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'ajax-nonce' ),
	);

	wp_localize_script( $translation_handle_likes, 'grille_localization', $localize_array );

}
add_action( 'wp_enqueue_scripts', 'grille_scripts' );

/**
 * Register Google fonts for @@pkg.name.
 *
 * @return string Google fonts URL for the theme.
 */
function grille_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	/**
	 * Get font selections from the Customizer
	 */
	$fonts[] = get_theme_mod( 'type_select_headings', 'Roboto Slab' );
	$fonts[] = get_theme_mod( 'type_select_body' );

	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family' => rawurlencode( implode( '|', array_unique( $fonts ) ) ),
				'subset' => rawurlencode( 'latin,latin-ext' ),
			), 'https://fonts.googleapis.com/css'
		);
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Add sidebar functionality to posts and pages.
 */
function grille_sidebar_loader() {
	global $post, $bean_sidebar_location, $bean_sidebar_class, $bean_content_class;

	$bean_sidebar_location = get_post_meta( $post->ID, '_bean_page_layout', true );
	$bean_sidebar_class    = '';
	$bean_content_class    = '';

	if ( 'right' === $bean_sidebar_location ) {
		$bean_sidebar_class = 'sidebar right sidebar-right';
		$bean_content_class = '';

	} else {
		$bean_content_class = 'wrapper';
	}
}

/**
 * Redirect singular team member posts to the homepage.
 */
function grille_no_single_cpt_redirect() {
	$queried_post_type = get_query_var( 'post_type' );
	if ( is_single() && 'team' === $queried_post_type ) {
		wp_safe_redirect( esc_url( home_url( '/' ) ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'grille_no_single_cpt_redirect' );

/**
 * Loop by post view count.
 *
 * @param string $id Post ID.
 */
function grille_get_post_views( $id ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $id, $count_key, true );

	if ( '' === $count ) {
		delete_post_meta( $id, $count_key );
		add_post_meta( $id, $count_key, '0' );
		return '0';
	}

	return $count;
}

/**
 * Output the view count.
 *
 * @param string $id Post ID.
 */
function grille_set_post_views( $id ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $id, $count_key, true );

	if ( '' === $count ) {
		$count = 0;
		delete_post_meta( $id, $count_key );
		add_post_meta( $id, $count_key, '0' );
	} else {
		$count++;
		update_post_meta( $id, $count_key, $count );
	}
}

/**
 * Set the max character length for the post excerpts.
 *
 * @param string $length Post ID.
 */
function grille_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'post_excerpt', '17' );

	return $excerpt_length;
}
add_filter( 'excerpt_length', 'grille_excerpt_length', 999 );

/**
 * Return an ellipsis for the excerpt more tag.
 *
 * @param string $more Text.
 */
function grille_excerpt_more_text( $more ) {
	global $post;
	return '...';
}
add_filter( 'excerpt_more', 'grille_excerpt_more_text' );

/**
 * Setup pingbacks.
 *
 * @param string $comment Comment.
 * @param array  $args Array of query arguments.
 * @param string $depth Current comment depth.
 */
function grille_ping( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
	<?php
}

/**
 * Move the comment field back to the bottom.
 *
 * @param array $fields Array of fields.
 */
function grille_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'grille_move_comment_field_to_bottom' );

/**
 * Retrieve related posts via taxonomy.
 *
 * @param string $post_id Current post's ID.
 * @param string $taxonomy Current post's taxonomy.
 * @param array  $args Array of query arguments.
 */
function grille_get_related_posts( $post_id, $taxonomy, $args = array() ) {
	$terms = wp_get_object_terms( $post_id, $taxonomy );

	if ( count( $terms ) ) {
		$post      = get_post( $post_id );
		$our_terms = array();
		foreach ( $terms as $term ) {
			$our_terms[] = $term->slug;
		}
		$args  = wp_parse_args(
			$args, array(
				'post_type'    => $post->post_type,
				'post__not_in' => array( $post_id ),
				'orderby'      => 'rand',
				'tax_query'    => array(
					array(
						'taxonomy' => $taxonomy,
						'terms'    => $our_terms,
						'field'    => 'slug',
						'operator' => 'IN',
					),
				),
			)
		);
		$query = new WP_Query( $args );
		return $query;
	} else {
		return false;
	}
}

/**
 * Filter the default comment form.
 *
 * @param array $fields Array of fields.
 */
function bean_custom_form_filters( $args = array(), $post_id = null ) {
	global $id;

	if ( null === $post_id ) {
		$post_id = $id;
	} else {
		$id = $post_id;
	}

	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$fields = array(
		'author' => '
			<div class="comment-form-author eight left clearfix">
				<label for="author" class="subtext show-for-third">' . esc_html__( 'Name', 'grille' ) . ( '<span class="required">*</span>' ) . '</label>
				<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required/>
			</div>
			<label for="author" class="subtext hide-for-third">' . esc_html__( 'Name', 'grille' ) . ( '<span class="required">*</span>' ) . '</label>',

		'email'  => '
			<div class="comment-form-email eight left clearfix">
			<label for="email" class="subtext show-for-third">' . esc_html__( 'Email', 'grille' ) . ( '<span class="required">*</span>' ) . '</label>
				<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required/>
			</div>
			<label for="email" class="subtext hide-for-third">' . esc_html__( 'Email', 'grille' ) . ( '<span class="required">*</span>' ) . '</label>',

		'url'    => '
			<div class="comment-form-url eight left clearfix">
				<label for="url" class="subtext show-for-third">' . esc_html__( 'Website', 'grille' ) . '</label>
				<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"/>
			</div>
			<label for="url" class="subtext hide-for-third">' . esc_html__( 'Website', 'grille' ) . '</label>',
	);

	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div class="comment-form-message twelve left clearfix"><label for="comment" class="subtext show-for-third">' . esc_html__( 'Comment', 'grille' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8"  required></textarea></div>',
		'',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'grille' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as subtext">' . sprintf( __( 'Currently logged in as <a href="%1$s">%2$s</a> / <a href="%3$s" title="Log out of this account">Logout</a>', 'grille' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => null,
		'comment_notes_after'  => null,
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</a>',
		'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		'title_reply'          => '',
		'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'grille' ),
		'cancel_reply_link'    => esc_html__( 'Cancel', 'grille' ),
		'label_submit'         => esc_html__( 'Submit Comment', 'grille' ),
	);

	return $defaults;
}
add_filter( 'comment_form_defaults', 'bean_custom_form_filters' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function grille_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'grille_pingback_header' );

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Customizer additions.
 */
require get_theme_file_path( '/inc/customizer/customizer.php' );
require get_theme_file_path( '/inc/customizer/customizer-css.php' );
require get_theme_file_path( '/inc/customizer/sanitization.php' );
require get_theme_file_path( '/inc/customizer/fonts.php' );
require get_theme_file_path( '/inc/customizer/font-library.php' );

/**
 * Metaboxes.
 */
require get_theme_file_path( '/inc/meta/meta.php' );
require get_theme_file_path( '/inc/meta/meta-page.php' );
require get_theme_file_path( '/inc/meta/meta-post.php' );
require get_theme_file_path( '/inc/meta/meta-portfolio.php' );
require get_theme_file_path( '/inc/meta/meta-team.php' );
require get_theme_file_path( '/inc/meta/meta-download.php' );

/**
 * Widgets.
 */
require get_theme_file_path( '/inc/widgets/widget-flickr.php' );
require get_theme_file_path( '/inc/widgets/widget-portfolio.php' );
require get_theme_file_path( '/inc/widgets/widget-portfolio-menu.php' );
require get_theme_file_path( '/inc/widgets/widget-portfolio-taxonomy.php' );

/**
 * Likes.
 */
require get_theme_file_path( '/inc/likes.php' );

/**
 * Admin specific functions.
 */
require get_parent_theme_file_path( '/inc/admin/init.php' );

/**
 * Disable Merlin WP.
 */
function themebeans_merlin() {}

/**
 * Disable Dashboard Doc.
 */
function themebeans_guide() {}
