<?php
require_once 'vendor/autoload.php';
require_once 'custom-posts/all.php';
require_once 'ajax.php';
require_once 'custom-taxonomies/all.php';
require_once 'customizerOptions.php';
use jorgelsaud\ZonaproCorpTheme\Styles;
new Styles();
add_filter('acf/settings/save_json', function() {
	return get_stylesheet_directory() . '/fields';
});

add_filter('acf/settings/load_json', function($paths) {
	$paths = array(get_template_directory() . '/fields');

	if(is_child_theme())
	{
		$paths[] = get_stylesheet_directory() . '/fields';
	}

	return $paths;
});
// Estilo Admin Site
function adminStyleAndScripts(){
	$uri=get_template_directory_uri().'/css/adminStyle.css';
	wp_register_script('adminStyle',$uri);
	wp_enqueue_style('adminStyle',$uri);
    	$parent_style = 'parent-style';
	if(is_child_theme()){
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ));
	}
	else{
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	}
}
add_action('admin_head', 'adminStyleAndScripts');


add_filter('option_blogname', 'local_blogname');

 function local_blogname($name) {
        return apply_filters('the_title', $name);
 }

if ( ! function_exists( 'zonaproCorpTheme_setup' ) ) :
	function zonaproCorpTheme_setup() {
		//Estilo del editor Wysing
		add_editor_style( array( 'css/editor-style.css', zonaproCorpTheme_fonts_url() ) );
		$defaults = array(
			'default-color' => '#f6f6f6',
			'default-image' => get_template_directory_uri() . '/images/background.jpg',
		);
		add_theme_support( 'custom-background' ,$defaults);
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		show_admin_bar( false);
		/*
		 * Enable support for custom logo.
		 */
		add_theme_support( 'custom-logo',array(
			'height'      => 120,
			'width'       => 250,
			'flex-width' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		));
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'main-menu' => __( 'Ubicacion de Menu Principal', 'zonaprocorp' ),
		) );
		add_image_size('imagen_servicios_redonda',220,220,true);
		add_image_size('imagen_full_width',1440,400,true);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		// add_theme_support( 'post-thumbnails' );
		// set_post_thumbnail_size( 1200, 9999 );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		// add_theme_support( 'html5', array(
		// 	'search-form',
		// 	'comment-form',
		// 	'comment-list',
		// 	'gallery',
		// 	'caption',
		// 	) );
		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		// add_theme_support( 'post-formats', array(
		// 	'aside',
		// 	'image',
		// 	'video',
		// 	'quote',
		// 	'link',
		// 	'gallery',
		// 	'status',
		// 	'audio',
		// 	'chat',
		// 	) );


	}
endif;


if ( ! function_exists( 'zonaproCorp_custom_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 * @since Twenty Sixteen 1.2
	 */
	function zonaproCorp_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			if(has_custom_logo()){
				function example_callback( $html ) {
					$html= str_replace('class="','class="navbar-brand ',$html);
					return $html;
				}
				add_filter( 'get_custom_logo', 'example_callback' );
				the_custom_logo();

			}
			else{
				echo '<a class="navbar-brand" href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>';
			}
		}
	}
endif;



add_action( 'after_setup_theme', 'zonaproCorpTheme_setup' );
if ( ! function_exists( 'zonaproCorpTheme_fonts_url' ) ) :
	/**
	 * Register Google fonts for Twenty Sixteen.
	 *
	 * Create your own zonaproCorpTheme_fonts_url() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function zonaproCorpTheme_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'zonaproCorpTheme' ) ) {
			$fonts[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic';
		}
		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Open Sans Condensed font: on or off', 'zonaproCorpTheme' ) ) {
			$fonts[] = 'Open Sans Condensed:300,300italic,700';
		}
		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Fira Mono Condensed font: on or off', 'zonaproCorpTheme' ) ) {
			$fonts[] = 'Fira+Mono:400,700';
		}


		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;
if(!function_exists('mainMenu')){
	function mainMenu(){
		wp_nav_menu( array(
			'menu'              => 'main-menu',
			'theme_location'    => 'main-menu',
			'depth'             => 0,
			'container'         => '',
			// 'container_class'   => 'nav navbar-nav',
			// 'container_id'      => 'mainMenu',
			'menu_class'        => 'nav navbar-nav pull-sm-right',
			// 'fallback_cb'       => '\jorgelsaud\WordpressTools\NavWalker::fallback',
			'walker'            => new \jorgelsaud\WordpressTools\NavWalker()
		)
	);
	}
}
// Create 40 Word Callback for Custom Post Excerpts, call using politica_excerpt('html5wp_custom_post');
function informacion_corporativa_length($length)
{
	if(get_field('cantidad_de_palabras_de_informacion_corporativa','options')>1){
		return get_field('cantidad_de_palabras_de_informacion_corporativa','options');
	}
	return 40;
}
function more_callback(){
	return '...';
}

function get_posts_excerpt($length_callback = '', $more_callback = '')
{
	global $post;
	if (function_exists($length_callback)) {
		add_filter('excerpt_length', $length_callback);
	}
	if (function_exists($more_callback)) {
		add_filter('excerpt_more', $more_callback);
	}
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>' . $output . '</p>';
	return $output;
}
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Ajustes Generales',
		'menu_title' 	=> 'Ajustes Generales',
	));

}
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'theme-slug' ),
		'id' => 'sidebar-1',
		'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
//Video Width auto embeded
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;

function custom_oembed_filter($html, $url, $attr, $post_ID) {
	$return = '<div class="video-container">'.$html.'</div>';
	return $return;
}
//add_filter( 'embed_defaults', 'bigger_embed_size' );
//
//function bigger_embed_size()
//{ 
//  return array( 'width' => 600, 'height' => 430 );
//}
