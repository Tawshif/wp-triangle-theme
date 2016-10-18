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
require_once('wp_bootstrap_navwalker.php');


if ( ! function_exists('theme_setup') ) :

function theme_setup()
{
	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/

	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */

	add_theme_support( 'post-thumbnails' );

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
		['id' => 'style', 'location' => 'stylesheet', 'dep' => false],
		['id' => 'bootstrap', 'location' => 'bootstrap.min.css', 'dep' => false],
		['id' => 'font_awesome', 'location' => 'font-awesome.min.css', 'dep' => false],
		['id' => 'animate', 'location' => 'animate.min.css', 'dep' => false],
		['id' => 'lightbox', 'location' => 'lightbox.css', 'dep' => false],
		['id' => 'main', 'location' => 'main.css', 'dep' => false],
		['id' => 'responsive', 'location' => 'responsive.css', 'dep' => false]
	];
	for ($style = 0; $style < sizeof($styles); $style++) {
		wp_enqueue_style($styles[$style]['id'], get_template_directory_uri() . '/css/' . $styles[$style]['location'], $styles[$style]['dep']);
	}
	$scripts = [
		['handle' => 'bootstrap', 'src'=>'bootstrap.min.js','dep'=> array( 'jquery' ),'var'=> false,'in_foot'=> true],
		['handle' => 'lightbox', 'src'=>'lightbox.min.js','dep'=> array( 'jquery' ),'var'=> false,'in_foot'=> true],
		['handle' => 'wow', 'src'=>'wow.min.js','dep'=> array( 'jquery' ),'var'=> false,'in_foot'=> true],
		['handle' => 'main', 'src'=>'main.js', 'dep'=>array( 'jquery' ), 'var'=>false, 'in_foot'=>true]
	];

	for ($script=0; $script < sizeof($scripts); $script++) { 
		wp_enqueue_script( $scripts[$script]['handle'], get_template_directory_uri() . '/js/' . $scripts[$script]['src'], $scripts[$script]['dep'], $scripts[$script]['ver'], $scripts[$script]['in_foot'] );	
	}
}

add_action( 'wp_enqueue_scripts', 'theme_files' );

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