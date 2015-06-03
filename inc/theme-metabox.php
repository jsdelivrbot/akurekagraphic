<?php
/**
 * @package AkuRekaGraphic
 * @author Jamaludin Rajalu
 * @version 1.0.0
 * 
 */

if ( file_exists(  get_template_directory() . '/lib/cmb2/init.php' ) ) {
  require_once  get_template_directory() . '/lib/cmb2/init.php';
} elseif ( file_exists(  get_template_directory()  . '/lib/CMB2/init.php' ) ) {
  require_once  get_template_directory()  . '/lib/CMB2/init.php';
}

// Post Type: Slideshow

add_action( 'cmb2_init', 'argcom_slideshow_metaboxes' );

  function argcom_slideshow_metaboxes() {

    $prefix = 'argcom_';

    $slideshow = new_cmb2_box( array(
      'id'            => 'slideshow_metabox',
      'title'         => __( 'Slideshow Detail', 'ukmtheme' ),
      'object_types'  => array( 'slideshow' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Image', 'ukmtheme' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 1920x750 pixels. <a href="'. get_template_directory_uri() .'/img/960_350.psd">PSD File</a>', 'ukmtheme' ),
      'id'      => $prefix . 'slideshow_image',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Caption', 'ukmtheme' ),
      'desc'    => __( 'Some caption for the image.', 'ukmtheme' ),
      'id'      => $prefix . 'slideshow_caption',
      'type'    => 'textarea',
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Link', 'ukmtheme' ),
      'desc'    => __( 'links to posts, pages or external web.', 'ukmtheme' ),
      'id'      => $prefix . 'slideshow_link',
      'type'    => 'text',
    ) );
    
    $slideshow->add_field( array(
      'name'    => __( 'Hide Caption', 'ukmtheme' ),
      'desc'    => __( 'Hide slideshow caption', 'ukmtheme' ),
      'id'      => $prefix . 'slideshow_caption_hide',
      'type'    => 'checkbox'
    ) );
  }

// Post Type: Slideset

add_action( 'cmb2_init', 'argcom_slideset_metaboxes' );

  function argcom_slideset_metaboxes() {

    $prefix = 'argcom_';

    $slideset = new_cmb2_box( array(
      'id'            => 'slideset_metabox',
      'title'         => __( 'Slideset Detail', 'ukmtheme' ),
      'object_types'  => array( 'slideset', ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $slideset->add_field( array(
      'name'    => __( 'Slideset Image', 'ukmtheme' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 600x400 pixels. <a href="'. get_template_directory_uri() .'/img/960_350.psd">PSD File</a>', 'ukmtheme' ),
      'id'      => $prefix . 'slideset_image',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $slideset->add_field( array(
      'name'    => __( 'Slideset Link', 'ukmtheme' ),
      'desc'    => __( 'links to posts, pages or external web.', 'ukmtheme' ),
      'id'      => $prefix . 'slideset_link',
      'type'    => 'text',
    ) );
  }