<?php 
/**
 * Triangle functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Triangle
 */

/*
*	Register Custom Navigation Walker
*/

if (!class_exists("RedusFrameworkPlugin")) {
	require_once (get_template_directory()."/libs/redux-framework-master/redux-framework.php");
	require_once (get_template_directory()."/libs/redux-framework-master/sample/triangle-config.php");
}

require_once('wp_bootstrap_navwalker.php');

require('shortcodes.php');


if ( ! function_exists('theme_setup') ) :
function theme_setup()
{
	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/

	add_theme_support( 'title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */

	add_theme_support( 'post-thumbnails');


	add_theme_support('custom-background');


	/*
	 *	Enable support for custom header
	 *	
	 *	@link https://codex.wordpress.org/Custom_Headers
	 */

	global $wp_version;

	if ( version_compare( $wp_version, '3.4', '>=' ) ) :
		add_theme_support( 'custom-header' );
	else :
		add_custom_image_header( $wp_head_callback, $admin_head_callback );
	endif;

	/*
	* This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption.
	*/
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

}
endif;

/** Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run. */

add_action( 'after_setup_theme', 'theme_setup' );

// add_action('after_setup_theme', 'remove_admin_bar');
// function remove_admin_bar() 
// {
// 	if (!current_user_can('administrator') && !is_admin()) {
// 	  show_admin_bar(false);
// 	}
// }

add_action('init', function(){
	show_admin_bar(false);
});

function theme_files() {
	$styles = [
		['handle' => 'style', 'src' => '../style.css', 'deps' => false, 'media'=>"all"],
		['handle' => 'bootstrap', 'src' => 'bootstrap.min.css', 'deps' => false, 'media'=>"all"],
		['handle' => 'font_awesome', 'src' => 'font-awesome.min.css', 'deps' => false, 'media'=>"all"],
		['handle' => 'animate', 'src' => 'animate.min.css', 'deps' => false, 'media'=>"all"],
		['handle' => 'lightbox', 'src' => 'lightbox.css', 'deps' => false, 'media'=>"all"],
		['handle' => 'main', 'src' => 'main.css', 'deps' => false, 'media'=>"all"],
		['handle' => 'responsive', 'src' => 'responsive.css', 'deps' => false, 'media'=>"all"]
	];
	for ($i = 0; $i < sizeof($styles); $i++) {

		wp_enqueue_style($styles[$i]['handle'], get_template_directory_uri() . '/css/' . $styles[$i]['src'], $styles[$i]['deps'], $styles[$i]['media'] );
	
	}

	$scripts = [
		['handle' => 'bootstrap', 'src'=>'bootstrap.min.js','dep'=> array( 'jquery' ),'var'=> false,'in_foot'=> true],
		['handle' => 'lightbox', 'src'=>'lightbox.min.js','dep'=> array( 'jquery' ),'var'=> false,'in_foot'=> true],
		['handle' => 'wow', 'src'=>'wow.min.js','dep'=> array( 'jquery' ),'var'=> false,'in_foot'=> true],
		['handle' => 'main', 'src'=>'main.js', 'dep'=>array( 'jquery' ), 'var'=>false, 'in_foot'=>true]
	];

	for ($i=0; $i < sizeof($scripts); $i++) {

		wp_enqueue_script( $scripts[$i]['handle'], get_template_directory_uri() . '/js/' . $scripts[$i]['src'], $scripts[$i]['dep'], $scripts[$i]['ver'], $scripts[$i]['in_foot'] );	
	
	}
}
add_action( 'wp_enqueue_scripts', 'theme_files' );

function admin_files(){
	$styles = [
		['handle' => 'font_awesome', 'src' => 'font-awesome.min.css', 'deps' => false, 'media'=>"all"]
	];
	for ($i = 0; $i < sizeof($styles); $i++) {
		wp_enqueue_style($styles[$i]['handle'], get_template_directory_uri() . '/css/' . $styles[$i]['src'], $styles[$i]['deps'], $styles[$i]['media'] );
	}
}
add_action( 'admin_enqueue_scripts', 'admin_files' );

register_nav_menus( array(
    'primary' => __( 'Primary', 'triangle_menu' ),
) );

$args = array(
	'flex-width'    => true,
	'width'			=> '208',
	'height'        => '60',
	'default-image' => get_template_directory_uri() . '/images/logo.png',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

function social_icons(){
	global $triangle;
	$social_options = [ 'facebook', 'twitter', 'google-plus', 'dribbble', 'linkedin', 'pinterest' ];
	$markup = '';
	foreach($social_options as $icon) :
		if(!empty($triangle[$icon])) {
			$markup .= '<li><a href="' . $triangle[$icon] . '"><i class="fa fa-'. $icon .'"></i></a></li>';
		}
	endforeach;
	return $markup;
}

register_post_type( $post_type, $args );
