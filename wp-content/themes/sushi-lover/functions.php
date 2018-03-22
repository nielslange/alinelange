<?php
/**
 * Sushi Lovers functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */

/**
 * Load Bootstrap Nav Walker
 * @since Sushi Lovers 1.0
 */
require_once('wp_bootstrap_navwalker.php');

/**
 * Run Jetpack in development mode on development and staging environment
 * @since Sushi Lovers 1.0
 */
if ( WP_DEBUG ) {
	add_filter( 'jetpack_development_mode', '__return_true' );
}

/**
 * Hide ACF on production environment
 * @since Sushi Lovers 1.0
 */
if ( !WP_DEBUG ) {
	//add_filter('acf/settings/show_admin', '__return_false');
}

/**
 * Loads media from a remote site when on a local dev environment.
 * Eliminates the need to download the uploads directory from the remote site for testing purposes.
 * @since Sushi Lovers 3.0
 */
if ( $_SERVER['HTTP_HOST'] == 'dev.alinelange.de' ) {
    add_filter( 'upload_dir', function ( $uploads ) {
        $uploads['baseurl'] = 'https://alinelange.de/wp-content/uploads';
        return $uploads;
    } );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 * @since Sushi Lovers 1.0
 */
if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/load_theme_textdomain
 * @link https://codex.wordpress.org/Function_Reference/add_editor_style
 * @link https://codex.wordpress.org/Function_Reference/add_theme_support
 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
 * @link https://codex.wordpress.org/Function_Reference/add_action
 * @return void
 */
if ( !function_exists( 'sushilovers_setup' ) ) {
	function sushilovers_setup() {
		global $content_width;

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on Sushi Lovers, use a find and replace
		 * to change 'sushilovers' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'sushilovers', trailingslashit( get_template_directory() ) . 'languages' );

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Always hide admin bar in frontend
		// add_filter('show_admin_bar', '__return_false');

		// Add immage size(s)
		add_image_size( 'portfolio_vertical', 320, 500, true );
		add_image_size( 'portfolio_horizontal', 320, 160, true );
		add_image_size( 'blog_horizontal', 420, 280, true );
		add_image_size( 'portfolio_slider', 900, 600, true );

	    // Set default values for the upload media box
	    update_option( 'image_default_align', 'none' );
	    update_option( 'image_default_link_type', 'none' );
	    update_option( 'image_default_size', 'large' );
		
		// This theme uses wp_nav_menu() in one location
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'sushilovers' ),
			'social'  => esc_html__( 'Social Links Menu', 'sushilovers' ),
		) );

		// Enable support for WooCommerce
		add_theme_support( 'woocommerce' );

		// Enable admin to show/hide WooCommerce breadcrumbs
		if ( sushilovers_is_woocommerce_active() && get_field( 'woocommerce_shop_breadcrumbs', 'option') == 0 ) {
			add_action( 'init', 'sushilovers_remove_woocommerce_breadcrumbs' );
		}
	}
}
add_action( 'after_setup_theme', 'sushilovers_setup' );

/**
 * Register widgetized areas
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 * @link https://codex.wordpress.org/Function_Reference/add_action
 * @return void
 */
function sushilovers_widgets_init() {
	register_sidebar( array(
			'name' => esc_html__( 'Main Sidebar', 'sushilovers' ),
			'id' => 'sidebar-main',
			'description' => esc_html__( 'Appears in the sidebar on posts and pages except the optional Front Page template, which has its own widgets', 'sushilovers' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'sushilovers' ),
			'id' => 'sidebar-blog',
			'description' => esc_html__( 'Appears in the sidebar on the blog and archive pages only', 'sushilovers' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Single Post Sidebar', 'sushilovers' ),
			'id' => 'sidebar-single',
			'description' => esc_html__( 'Appears in the sidebar on single posts only', 'sushilovers' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Page Sidebar', 'sushilovers' ),
			'id' => 'sidebar-page',
			'description' => esc_html__( 'Appears in the sidebar on pages only', 'sushilovers' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'WooCommerce Sidebar', 'sushilovers' ),
			'id' => 'woocommerce-sidebar',
			'description' => esc_html__( 'Appears in the sidebar on product pages only', 'sushilovers' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'First Footer Widget Area', 'sushilovers' ),
			'id' => 'sidebar-footer-1',
			'description' => esc_html__( 'Appears in the footer sidebar', 'sushilovers' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3 class="widget-title h5">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Second Footer Widget Area', 'sushilovers' ),
			'id' => 'sidebar-footer-2',
			'description' => esc_html__( 'Appears in the footer sidebar', 'sushilovers' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title h5">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Third Footer Widget Area', 'sushilovers' ),
			'id' => 'sidebar-footer-3',
			'description' => esc_html__( 'Appears in the footer sidebar', 'sushilovers' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title h5">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Fourth Footer Widget Area', 'sushilovers' ),
			'id' => 'sidebar-footer-4',
			'description' => esc_html__( 'Appears in the footer sidebar', 'sushilovers' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3 class="widget-title h5">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Fifth Footer Widget Area', 'sushilovers' ),
			'id' => 'sidebar-footer-5',
			'description' => esc_html__( 'Appears in the footer sidebar', 'sushilovers' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3 class="widget-title h5">',
			'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'sushilovers_widgets_init' );

/**
 * Display an optional post thumbnail.
*
* Wraps the post thumbnail in an anchor element on index views, or a div
* element when on single views.
*
 * @since Sushi Lovers 1.0
*/
if ( ! function_exists( 'sushilovers_post_thumbnail' ) ) {
	function sushilovers_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {
			printf('<div class="post-thumbnail">%s</div><!-- .post-thumbnail -->', the_post_thumbnail());
		} else {
			printf('<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">%s</a>', the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ));
		}
	}
}

/**
* Prints HTML with meta information for the categories, tags.
*
* @since Sushi Lovers 1.0
*/
if ( !function_exists( 'sushilovers_entry_meta' ) ) {
	function sushilovers_entry_meta() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'sushilovers' ) );
		}

		$format = get_post_format();
		if ( current_theme_supports( 'post-formats', $format ) ) {
			printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
					sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'sushilovers' ) ),
					esc_url( get_post_format_link( $format ) ),
					get_post_format_string( $format )
					);
		}

		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					get_the_date(),
					esc_attr( get_the_modified_date( 'c' ) ),
					get_the_modified_date()
					);

			printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
					_x( 'Posted on', 'Used before publish date.', 'sushilovers' ),
					esc_url( get_permalink() ),
					$time_string
					);
		}

		if ( 'post' == get_post_type() ) {
			if ( is_singular() || is_multi_author() ) {
				printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
						_x( 'Author', 'Used before post author name.', 'sushilovers' ),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author()
						);
			}

			$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'sushilovers' ) );
			if ( $categories_list ) {
				printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
						_x( 'Categories', 'Used before category names.', 'sushilovers' ),
						$categories_list
						);
			}

			$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'sushilovers' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
						_x( 'Tags', 'Used before tag names.', 'sushilovers' ),
						$tags_list
						);
			}
		}

		if ( is_attachment() && wp_attachment_is_image() ) {
			// Retrieve attachment metadata.
			$metadata = wp_get_attachment_metadata();

			printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
					_x( 'Full size', 'Used before full size attachment link.', 'sushilovers' ),
					esc_url( wp_get_attachment_url() ),
					$metadata['width'],
					$metadata['height']
					);
		}

		if ( !is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'sushilovers' ), get_the_title() ) );
			echo '</span>';
		}
	}
}


/**
 * Check if user is on blog page
 *
 * @since Sushi Lovers 1.0
 * @link https://developer.wordpress.org/reference/functions/get_post_type
 * @return bool
 */
function is_blog() {
	global $post;
	$post_type = get_post_type($post);

	return ( is_home() || is_archive() || is_single() ) && ($post_type == 'post');
}

/**
 * Recreate the default filters on the_content
 * This will make it much easier to output the Theme Options Editor content with proper/expected formatting.
 * We don't include an add_filter for 'prepend_attachment' as it causes an image to appear in the content, on attachment pages.
 * Also, since the Theme Options editor doesn't allow you to add images anyway, no big deal.
 *
 * @since Sushi Lovers 1.0
 * @link https://developer.wordpress.org/reference/functions/add_filter
 * @return void
 */
add_filter( 'meta_content', 'wptexturize' );
add_filter( 'meta_content', 'convert_smilies' );
add_filter( 'meta_content', 'convert_chars'  );
add_filter( 'meta_content', 'wpautop' );
add_filter( 'meta_content', 'shortcode_unautop' );
add_filter( 'meta_content', 'do_shortcode' );

/**
 * Unhook the WooCommerce Wrappers
 *
 * @since Sushi Lovers 1.0
 * @link https://developer.wordpress.org/reference/functions/remove_action
 * @return void
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Outputs the opening container div for WooCommerce
 *
 * @since Sushi Lovers 1.0
 * @return void
 */
if ( !function_exists( 'sushilovers_before_woocommerce_wrapper' ) ) {
	function sushilovers_before_woocommerce_wrapper() {
		echo '<div id="shop">';
		echo '<div id="primary" class="site-content row" role="main">';
	}
}

/**
 * Outputs the closing container div for WooCommerce
 *
 * @since Sushi Lovers 1.0
 * @return void
 */
if ( ! function_exists( 'sushilovers_after_woocommerce_wrapper' ) ) {
	function sushilovers_after_woocommerce_wrapper() {
		echo '</div> <!-- /#primary.site-content.row -->';
		echo '</div> <!-- /#shop -->';
	}
}

/**
 * Check if WooCommerce is active
 *
 * @since Sushi Lovers 1.0
 * @link https://developer.wordpress.org/reference/functions/apply_filters
 * @link https://developer.wordpress.org/reference/functions/get_option
 * @return void
 */
function sushilovers_is_woocommerce_active() {
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if WooCommerce is active and a WooCommerce template is in use and output the containing div
 *
 * @since Sushi Lovers 1.0
 * @link https://developer.wordpress.org/reference/functions/add_action
 * @return void
 */
if ( !function_exists( 'sushilovers_setup_woocommerce_wrappers' ) ) {
	function sushilovers_setup_woocommerce_wrappers() {
		if ( sushilovers_is_woocommerce_active() && is_woocommerce() ) {
			add_action( 'sushilovers_before_woocommerce', 'sushilovers_before_woocommerce_wrapper', 10, 0 );
			add_action( 'sushilovers_after_woocommerce', 'sushilovers_after_woocommerce_wrapper', 10, 0 );
		}
	}
	add_action( 'template_redirect', 'sushilovers_setup_woocommerce_wrappers', 9 );
}

/**
 * Outputs the opening wrapper for the WooCommerce content
 *
 * @since Sushi Lovers 1.0
 * @link https://docs.woothemes.com/wc-apidocs/function-is_shop.html
 * @link https://docs.woothemes.com/wc-apidocs/function-is_product.html
 * @link https://codex.wordpress.org/Function_Reference/get_option
 * @link https://codex.wordpress.org/Function_Reference/add_action
 * @return void
 */
if ( !function_exists( 'sushilovers_woocommerce_before_main_content' ) ) {
	function sushilovers_woocommerce_before_main_content() {
		echo '<div id="shop">';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-sm-12 col-md-8">';
	}
	add_action( 'woocommerce_before_main_content', 'sushilovers_woocommerce_before_main_content', 10 );
}

/**
 * Outputs the closing wrapper for the WooCommerce content
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/add_action
 * @return void
 */
if ( !function_exists( 'sushilovers_woocommerce_after_main_content' ) ) {
	function sushilovers_woocommerce_after_main_content() {
		echo '</div> <!-- end .col-sm-12 .col-md-18 -->';
		echo '<div class="col-sm-12 col-md-4">';
		echo get_sidebar();
		echo '</div> <!-- end .col-sm-12 .col-sm-4 -->';
		echo '</div> <!-- end .row-->';
		echo '</div> <!-- end .container -->';
		echo '</div> <!-- end #shop -->';
	}
	add_action( 'woocommerce_after_main_content', 'sushilovers_woocommerce_after_main_content', 10 );
}

/**
 * Remove the breadcrumbs from the WooCommerce pages
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/remove_action
 * @return void
 */
if ( !function_exists( 'sushilovers_remove_woocommerce_breadcrumbs' ) ) {
	function sushilovers_remove_woocommerce_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}

/**
 * Remove catalog ordering from shop page
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/remove_action
 * @return void
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Set the number of products to display on the WooCommerce shop page
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/get_option
 * @link https://codex.wordpress.org/Function_Reference/sanitize_text_field
 * @link https://codex.wordpress.org/Function_Reference/add_filter
 * @link https://codex.wordpress.org/Function_Reference/add_action
 * @return void
 */
if ( !function_exists( 'sushilovers_set_number_woocommerce_products' ) ) {
	function sushilovers_set_number_woocommerce_products() {
		if ( function_exists('get_field') && get_field( 'woocommerce_shop_products', 'option' ) ) {
			$numprods = "return " . sanitize_text_field( get_field( 'woocommerce_shop_products', 'option' ) ) . ";";
			add_filter( 'loop_shop_per_page', create_function( '$cols', $numprods ), 20 );
		}
	}
	add_action( 'init', 'sushilovers_set_number_woocommerce_products' );
}

add_filter( 'wc_product_sku_enabled', 'sushilovers_wc_product_sku_enabled' );
function sushilovers_wc_product_sku_enabled( $enabled ) {
	if ( !is_admin() && is_product() ) {
		return false;
	}

	return $enabled;
}

/**
 * Set up theme settings option page
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/get_stylesheet_directory
 * @return void
 */
if ( sushilovers_is_woocommerce_active() ) {
	if ( function_exists('acf_add_options_page') ) {
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Settings',
			'menu_title'	=> 'Settings',
			'parent_slug'	=> 'themes.php',
		));
	}
}

/**
 * Enqueue styles
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @return void
 */
add_action( 'wp_enqueue_scripts', 'sushilovers_load_styles' );
function sushilovers_load_styles() {
	wp_enqueue_style( 'sushilovers', get_stylesheet_uri() );
	wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato:400,300' );
	wp_enqueue_style( 'nothing-you-could-do', 'https://fonts.googleapis.com/css?family=Nothing+You+Could+Do' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-select', get_stylesheet_directory_uri() . '/css/bootstrap.select.min.css' );
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'flexslider', get_stylesheet_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/assets/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/assets/slick/slick-theme.css' );
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.min.css', null, time() );
	#wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/assets/custom.css' );
	wp_enqueue_style( 'viewport-bug-workaround', get_stylesheet_directory_uri() . '/css/ie10-viewport-bug-workaround.css' );
}

/**
 * Enqueue styles
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @return void
 */
add_action( 'wp_enqueue_scripts', 'sushilovers_load_scripts' );
function sushilovers_load_scripts() {
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.11.3', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.5', true );
	wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.min.js', array(), '1.10.0', true );
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '2.6.0', true );
    wp_enqueue_script( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/js/fontawesome-all.min.js', array(), '5.0.8', true );
    wp_enqueue_script( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/js/fa-v4-shims.min.js', array(), '5.0.8', true );
    wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), '1.5.3', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array(), '1.8.1', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/custom.js', array(), '1.0.0', true );
	#wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'viewport-bug-workaround', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array(), '1.0.0', true );
}

/**
 * Enqueue login styles
 *
 * @since Sushi Lovers 3.0
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @return void
 */
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_stylesheet() {
    wp_enqueue_style( 'login-style', get_template_directory_uri() . '/css/login.css' );
}

add_filter('woocommerce_variable_price_html', 'bbloomer_custom_variation_price', 10, 2);
function bbloomer_custom_variation_price( $price, $product ) {
	$price = '';
	if ( !$product->min_variation_price || $product->min_variation_price !== $product->max_variation_price ) $price .= '<span class="from">' . _x('From:', 'min_price', 'woocommerce') . ' </span>';
	$price .= woocommerce_price($product->min_variation_price);
	return $price;
}

/**
* Optimize WooCommerce Scripts
* Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
*/
add_action( 'wpenqueuescripts', 'childmanagewoocommercestyles', 99 );
function childmanagewoocommercestyles() {
  remove_action('wphead', 'wcgenerator_tag');
  if ( function_exists( 'is_woocommerce' ) ) {
    if ( !is_woocommerce() && !is_cart() && !is_checkout() ) {
      wp_dequeue_style( 'woocommerce-layout' );
      wp_dequeue_style( 'woocommerce-smallscreen' );
      wp_dequeue_style( 'woocommerce-general' );
      wp_dequeue_style( 'wc-add-to-cart' );
      wp_dequeue_style( 'wc-cart-fragments' );
      wp_dequeue_style( 'woocommerce' );
      wp_dequeue_style( 'jquery-blockui' );
      wp_dequeue_style( 'jquery-placeholder' );
    }
  }
}

/**
 * Register CPT portfolio
 *
 * @since Sushi Lovers 1.0
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 * @return void
 */
add_action( 'init', 'sushilovers_custom_post_type', 0 );
function sushilovers_custom_post_type() {
	$labels = array(
			'name'                  => _x( 'Portfolio', 'Post Type General Name', 'esst_projects' ),
			'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'esst_projects' ),
			'menu_name'             => __( 'Portfolio', 'esst_projects' ),
			'name_admin_bar'        => __( 'Portfolio', 'esst_projects' ),
			'archives'              => __( 'Artikel Archiv', 'esst_projects' ),
			'parent_item_colon'     => __( 'Elternelement:', 'esst_projects' ),
			'all_items'             => __( 'Alle Einträge', 'esst_projects' ),
			'add_new_item'          => __( 'Neuen Eintrag erstellen', 'esst_projects' ),
			'add_new'               => __( 'Eintrag erstellen', 'esst_projects' ),
			'new_item'              => __( 'Neues Projekt', 'esst_projects' ),
			'edit_item'             => __( 'Eintrag bearbeiten', 'esst_projects' ),
			'update_item'           => __( 'Eintrag bearbeiten', 'esst_projects' ),
			'view_item'             => __( 'Eintrag betrachten', 'esst_projects' ),
			'search_items'          => __( 'Eintrag suchen', 'esst_projects' ),
			'not_found'             => __( 'Eintrag nicht gefunden', 'esst_projects' ),
			'not_found_in_trash'    => __( 'Eintrag nicht gefunden', 'esst_projects' ),
			'featured_image'        => __( 'Beitragsbild', 'esst_projects' ),
			'set_featured_image'    => __( 'Beitragsbild festlegen', 'esst_projects' ),
			'remove_featured_image' => __( 'Beitragsbild entfernen', 'esst_projects' ),
			'use_featured_image'    => __( 'Als Beitragsbild verwenden', 'esst_projects' ),
	);
	$args = array(
			'label'                 => __( 'Portfolio', 'sushilovers_portfolio' ),
			'labels'                => $labels,
			'supports'              => array( 'post-formats', 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail', 'revisions' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
	);
	register_post_type( 'portfolio', $args );
}

/**
 * Readjust mobile breakpoint
 */
add_filter('woocommerce_style_smallscreen_breakpoint','sushilovers_woocommerce_style_smallscreen_breakpoint');
function sushilovers_woocommerce_style_smallscreen_breakpoint($px) {
	$px = '767px';
	return $px;
}

/**
 * Don't show additional information tab on product page
 */
add_filter( 'wc_product_enable_dimensions_display', '__return_false' );

/**
 * Inform customers about from gift if total order amount is EUR 20,00 or above
 * and the cart contains at least one physical product
 */
add_action( 'woocommerce_before_cart_table', 'sushilovers_woocommerce_before_cart_table', 9 );
function sushilovers_woocommerce_before_cart_table() {
	global $woocommerce;
	
	if ( sushilovers_cart_has_physical_products() ) {
		if ( $woocommerce->cart->subtotal < 10 && !sushilovers_cart_has_gift()) {
			wc_print_notice( __( 'Ab einem Bestellwert von 10,00 &euro; erhälst Du ein kleines Dankeschön von mir! <a href="/shop">Weiter einkaufen</a>', 'woocommerce' ), 'notice' );
		} else {
			if ( !sushilovers_cart_has_gift() ) {
				$args = array(
					'post_type' 		=> 'product',
					'product_cat'		=> 'Geschenk',
					'orderby'        	=> 'rand',
					'posts_per_page' 	=> '1',
				);
				$gift = new WP_Query( $args );
				wc_print_notice( __( 'Hurra, Dein Bestellwert liegt über 10,00 &euro;. Darf ich Dir hierfür ein kleines Dankeschön geben? <a href="?add-to-cart='.$gift->post->ID.'">Sehr gerne!</a>', 'woocommerce' ), 'notice' );
			}
		}
	}
}

/**
 * Check if cart has any physical products 
 */
function sushilovers_cart_has_physical_products() {
	global $woocommerce;

	$physical_products = 0;
	$products 		   = $woocommerce->cart->get_cart();
	 
	foreach ($products as $product) {
		$product_id  = $product['product_id'];
		$is_virtual  = get_post_meta($product_id, '_virtual', true);

		if ( $is_virtual != 'yes') {
			$physical_products += 1;
		}
	}

	return $physical_products ? true : false;
}

/**
 * Check if cart has any physical products
 */
function sushilovers_cart_has_gift() {
	global $woocommerce;

	foreach ($woocommerce->cart->get_cart() as $product) {
		$product_id  	= $product['product_id'];
		$product_cats	= get_the_terms($product_id, 'product_cat');
		
		foreach ($product_cats as $category) {
			if ( $category->slug == 'geschenk' ) return $product_id;
		}
	}

	return false;
}

/**
 * Hide WooCommerce category gift 
 */
add_filter( 'woocommerce_product_categories_widget_args', 'sushilovers_hide_category_gift' );
function sushilovers_hide_category_gift( $cat_args ) {
	$product = get_term_by( 'slug', 'geschenk', 'product_cat' );
	$cat_args['exclude'] = array($product->term_id);

	return $cat_args;
}

/**
 * Forward all WooCommerce email notifications
 */
add_filter( 'woocommerce_email_headers', 'smntcs_woocommerce_email_headers', 10, 2);
function smntcs_woocommerce_email_headers($headers, $object) {
	$headers = array();
	$headers[] = 'Bcc: Shop Aline Lange <shop@alinelange.de>';
	$headers[] = 'Bcc: Niels Lange <info@nielslange.de>';
	$headers[] = 'Content-Type: text/html';
	return $headers;
}

/**
 * Add category taxomony to post type page
 */
add_action( 'init', 'smntcs_add_taxonomies_to_pages' );
function smntcs_add_taxonomies_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}

/**
 * Generate breadcrumbs
 */
function get_breadcrumb() {
	echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
	
	if (in_array('page-template-page-mentoring-detail',get_body_class())) {
		echo "&nbsp; &#187; &nbsp;";
		echo '<a href="/mentoring-programm" rel="nofollow">Mentoring-Programm „HappyHealthyBusiness”</a>';
	}
	
	global $post;
	$parents = get_post_ancestors($post);
	$parents = array_reverse($parents);
	foreach ($parents as $parent) {
		echo "&nbsp; &#187; &nbsp;";
		echo '<a href="'.get_the_permalink($parent).'" rel="nofollow">' . get_the_title($parent) . '</a>';
	}
	if (is_category() || is_single()) {
		echo "&nbsp; &#187; &nbsp;";
		the_category(' &bull; ');
		if (is_single()) {
			echo "&nbsp; &#187; &nbsp;";
			echo get_the_title();
		}
	} elseif (is_page()) {
		echo "&nbsp; &#187; &nbsp;";
		echo get_the_title();
	}
	echo ' <a class="pull-right" href="/mein-konto/customer-logout/" rel="nofollow">Logout</a>';
	echo '<span class="clearfix"></span>';
}

/**
 * Redirect to homepage after logout
 */
add_action('wp_logout','wpc_auto_redirect_after_logout');
function wpc_auto_redirect_after_logout(){
	wp_redirect( home_url() );
	exit();
}

/***
 * Exclude widget categories
 * 
 * Online Workshop --> ID: 967
 * Online Workshop Bonus --> ID: 1081
 */
add_filter('widget_categories_args','nl_exclude_widget_categories');
function nl_exclude_widget_categories($args){
	$exclude = '967,1081,1513';
	$args['exclude'] = $exclude;
	return $args;
}

function getWorkshopNavigation(){
	// Return if WooCommerce Memberships hasn't been activated
	if ( !function_exists('wc_memberships_is_user_active_member') ) return; 
		
	$pagelist 	= get_pages('sort_column=menu_order&sort_order=asc');
	$pages 		= array();
	foreach ($pagelist as $page) {
		$pages[] += $page->ID;
	}

	$current 		= array_search(get_the_ID(), $pages);
	$prev_id 		= $pages[$current-1];
	$next_id 		= $pages[$current+1];
	$with_bonus		= wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic');
	$without_bonus	= wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic-no-bonus');

	echo '<div class="breadcrumb">';

	if ( !empty($next_id) ) {
		echo '<div class="col-sm-6">';
		echo 'Zurück zu <a href="';
		echo get_permalink($prev_id);
		echo '"';
		echo 'title="';
		echo get_the_title($prev_id);
		echo'">' . get_the_title($prev_id) . '</a>';
		echo "</div>";
	}
	
	if ( !empty($next_id) && !is_page('affiliate-programm') ) {
		if ( $with_bonus || ($no_bonus && !is_page('bonus')) || ($no_bonus && !has_category('online-workshop-bonus', get_post($next_id))) ) {
			echo '<div class="col-sm-6 text-right">';
			echo 'Weiter zu <a href="';
			echo get_permalink($next_id);
			echo '"';
			echo 'title="';
			echo get_the_title($next_id);
			echo'">' . get_the_title($next_id) . '</a>';
			echo "</div>";
		}
	}
	
	echo '<div class="clearfix"></div>';
	echo '</div>';
}

/**
 *   Child page conditional
 *   @ Accept's page ID, page slug or page title as parameters
 */
function is_child( $parent = '' ) {
	global $post;

	$parent_obj = get_page( $post->post_parent, ARRAY_A );
	$parent = (string) $parent;
	$parent_array = (array) $parent;

	if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
		return true;
	} elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
		return true;
	} elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
		return true;
	} else {
		return false;
	}
}