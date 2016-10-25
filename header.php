<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 
 */

 global $triangle;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php bloginfo('title'); ?></title>
    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo  $triangle['logo-uploader']['url']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo  $triangle['logo-uploader']['url']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo  $triangle['logo-uploader']['url']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo  $triangle['logo-uploader']['url']; ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo  $triangle['logo-uploader']['url']; ?>">
    <style>
    <?php 
        echo $triangle['custom-css']; 
    ?>
    </style>
    <?php wp_head(); ?>

</head><!--/head-->

<body <?php body_class(); ?>>
	<header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <?= social_icons(); ?>
                        </ul>                    
                    </div> 
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php if ( get_header_image() ) : ?>
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    	<h1><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></h1>
                    </a>
                    <?php endif; ?>
                </div>
                <?php
                    $args = array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'triangle',
                        'menu_class'        => 'nav navbar-nav navbar-right',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker()
                    );
                    wp_nav_menu( $args);
                ?>
            </div>
        </div>
    </header>
    <!--/#header-->

