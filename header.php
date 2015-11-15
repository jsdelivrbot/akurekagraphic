<?php
/**
 * @package AkuRekaGraphic
 * @author Jamaludin Rajalu
 * @version 1.0.0
 * 
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap" <?php if ( is_home() ) { echo 'style="background:#E2E2E2;"'; } else {/** home body background */} ?>>
<header class="header">
  <div class="column wrap">
    <div class="col-6-12">
      <a href="<?php echo bloginfo( 'url' ); ?>">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
      </a>
    </div>
    <div class="col-6-12">
      <?php
        wp_nav_menu(array(
          'theme_location'  => 'main',
          'menu'            => 'Main Navigation',
          'menu_class'      => 'main-nav'
        ));
      ?>     
    </div>
  </div>
</header>