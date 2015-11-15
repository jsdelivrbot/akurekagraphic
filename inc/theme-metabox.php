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
      'title'         => __( 'Slideshow Detail', 'argcom' ),
      'object_types'  => array( 'slideshow' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Image', 'argcom' ),
      'desc'    => __( 'Dimensions of the image should be 1920x750 pixels.', 'argcom' ),
      'id'      => $prefix . 'slideshow_image',
      'type'    => 'file',
      'allow'   => array( 'url' ),
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Link', 'argcom' ),
      'desc'    => __( 'links to posts, pages or external web.', 'argcom' ),
      'id'      => $prefix . 'slideshow_link',
      'type'    => 'text',
    ) );

  }

// Post Type: Slideset

add_action( 'cmb2_init', 'argcom_slideset_metaboxes' );

  function argcom_slideset_metaboxes() {

    $prefix = 'argcom_';

    $slideset = new_cmb2_box( array(
      'id'            => 'slideset_metabox',
      'title'         => __( 'Slideset Detail', 'argcom' ),
      'object_types'  => array( 'slideset', ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $slideset->add_field( array(
      'name'    => __( 'Slideset Image', 'argcom' ),
      'desc'    => __( 'Dimensions of the image should be 600x400 pixels.', 'argcom' ),
      'id'      => $prefix . 'slideset_image',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $slideset->add_field( array(
      'name'    => __( 'Slideset Link', 'argcom' ),
      'desc'    => __( 'links to posts, pages or external web.', 'argcom' ),
      'id'      => $prefix . 'slideset_link',
      'type'    => 'text',
    ) );
  }
  
 // PROJECTS
  
add_action( 'cmb2_init', 'argcom_register_portfolio_metabox' );

  function argcom_register_portfolio_metabox() {

    $prefix = '_argcom_';

    $cmb_portfolio = new_cmb2_box( array(
      'id'            => $prefix . 'portfolio',
      'title'         => __( 'Slide Details', 'argcom' ),
      'object_types'  => array( 'portfolio' ),
    ) );

    $cmb_portfolio->add_field( array(
      'name' => __( 'Main Image', 'argcom' ),
      'desc' => __( 'Upload an image or enter a URL.', 'argcom' ),
      'id'   => $prefix . 'portfolio_image',
      'type' => 'file',
    ) );
    
    $cmb_portfolio->add_field( array(
      'name' => 'Project Image',
      'desc' => '',
      'id'   => $prefix . 'portfolio_image_list',
      'type' => 'file_list',
    ) );
    
  }