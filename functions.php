<?php
/**
 * @package AkuRekaGraphic
 * @author Jamaludin Rajalu
 * @version 1.0.0
 * 
 */
add_action( 'after_setup_theme', 'argcom_theme_setup' );

  function argcom_theme_setup() {
    
    add_theme_support( 'title-tag' );
    
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    
    add_theme_support( 'custom-header', array(
        'width'         => '210',
        'height'        => '100',
        'default-image' => get_template_directory_uri() . '/img/logo.svg',
        'uploads'       => true,
        'header-text'   => false
    ) );
    
    register_nav_menus( array(
        'main'  => 'Main Navigation'
    ) );
    
    add_filter( 'show_admin_bar', '__return_false' );
    
    require_once get_template_directory() . '/inc/post-type-slideshow.php';
    require_once get_template_directory() . '/inc/post-type-slideset.php';
    require_once get_template_directory() . '/inc/theme-metabox.php';
    
    require_once get_template_directory() . '/inc/theme-update-notifier.php';
      new ThemeUpdateChecker(
        'akurekagraphic-master',
        'https://raw.githubusercontent.com/jrajalu/akurekagraphic/master/version.json'
    );

  }
  
add_action( 'wp_enqueue_scripts', 'argcom_theme_scripts' );

  function argcom_theme_scripts() {
    
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/lib/jquery/jquery.min.js', array(), '2.1.4', false );
    // Theme Javascripts
    wp_enqueue_script( 'uikit', get_template_directory_uri() . '/lib/uikit/js/uikit.min.js', array(), '2.21.0', true );
    wp_enqueue_script( 'uikit-slideshow', get_template_directory_uri() . '/lib/uikit/js/components/slideshow.min.js', array(), '2.21.0', true );
    wp_enqueue_script( 'uikit-slider', get_template_directory_uri() . '/lib/uikit/js/components/slider.min.js', array(), '2.21.0', true );
    // Theme Stylesheet
    wp_enqueue_style( 'uikit', get_template_directory_uri() . '/lib/uikit/css/uikit.almost-flat.min.css', array(), '2.21.0' );
    wp_enqueue_style( 'uikit-slideshow', get_template_directory_uri() . '/lib/uikit/css/components/slideshow.almost-flat.min.css', array(), '2.21.0' );
    wp_enqueue_style( 'uikit-slider', get_template_directory_uri() . '/lib/uikit/css/components/slider.almost-flat.min.css', array(), '2.21.0' );
    wp_enqueue_style( 'uikit-slidenav', get_template_directory_uri() . '/lib/uikit/css/components/slidenav.almost-flat.min.css', array(), '2.21.0' );
    wp_enqueue_style( 'theme', get_stylesheet_uri(), array(), '1.0.0' );
    
  }
  
add_action( 'widgets_init', 'argcom_theme_widgets' );
  
  function argcom_theme_widgets() {

    register_sidebar( array(
      'name'          => 'Main Sidebar',
      'id'            => 'sidebar-1',
      'description'   => 'Main sidebar for pages',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
      'before_widget' => '<div>',
      'after_widget'  => '</div>'
    ) );
  }