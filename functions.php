<?php 
/**
 * Triangle functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Triangle
 */

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
	* This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'theme' ),
	) );

	/*
	* This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption.
	*/
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

}

endif;

/** Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'theme_setup' );

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() 
{
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

/**
 * Enqueue scripts and styles.
 */
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


	// wp_enqueue_style('style', get_stylesheet_uri() );
	// wp_enqueue_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', false, '01', 'all');
	// wp_enqueue_style('font_awesome', get_template_directory_uri(). '/css/font-awesome.min.css', false, '01', 'all');
	// wp_enqueue_style('animate', get_template_directory_uri(). '/css/animate.min.css', false, '01', 'all');
	// wp_enqueue_style('lightbox', get_template_directory_uri(). '/css/lightbox.css', false, '01', 'all');
	// wp_enqueue_style('main', get_template_directory_uri(). '/css/main.css', false, '01', 'all');
	// wp_enqueue_style('responsive', get_template_directory_uri(). '/css/responsive.css');

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
