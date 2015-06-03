<?php
/**
 * @package AkuRekaGraphic
 * @author Jamaludin Rajalu
 * @version 1.0.0
 * 
 */

function title_slideshow_input ( $title ) {
  if ( get_post_type() == 'slideshow' ) {
    $title = __( 'Enter slide title here', 'argcom' );
  }
  return $title;
} // End title_text_input()
add_filter( 'enter_title_here', 'title_slideshow_input' );

function argcom_slideshow() {

  $labels = array(
    'name'                => _x( 'Slideshows', 'Post Type General Name', 'argcom' ),
    'singular_name'       => _x( 'Slideshow', 'Post Type Singular Name', 'argcom' ),
    'menu_name'           => __( 'Slideshow', 'argcom' ),
    'parent_item_colon'   => __( 'Parent Slideshow:', 'argcom' ),
    'all_items'           => __( 'All Slideshows', 'argcom' ),
    'view_item'           => __( 'View Slideshow', 'argcom' ),
    'add_new_item'        => __( 'Add New Slideshow', 'argcom' ),
    'add_new'             => __( 'New Slideshow', 'argcom' ),
    'edit_item'           => __( 'Edit Slideshow', 'argcom' ),
    'update_item'         => __( 'Update Slideshow', 'argcom' ),
    'search_items'        => __( 'Search Slideshows', 'argcom' ),
    'not_found'           => __( 'No Slideshows found', 'argcom' ),
    'not_found_in_trash'  => __( 'No Slideshows found in Trash', 'argcom' ),
  );
  $args = array(
    'label'               => __( 'slideshow', 'argcom' ),
    'description'         => __( 'Frontpage image slideshow', 'argcom' ),
    'labels'              => $labels,
    'supports'            => array( 'title' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'     => 20,
    'menu_icon'           => 'dashicons-format-image',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'slideshow', $args );

}

// Hook into the 'init' action
add_action( 'init', 'argcom_slideshow', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_slideshow_posts_custom_column', 'argcom_slideshow_custom_columns');
add_filter('manage_edit-slideshow_columns', 'argcom_add_new_slideshow_columns');

function argcom_add_new_slideshow_columns( $columns ){
  $columns = array(
    'cb'                        => '<input type="checkbox">',
    'argcom_slideshow_image'    => __( 'Image', 'argcom' ),
    'title'                     => __( 'Title', 'argcom' ),
    'date'                      => __( 'Date', 'argcom' )
  );
  return $columns;
}

function argcom_slideshow_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'argcom_slideshow_image' : echo '<img src="'. get_post_meta($post->ID,'argcom_slideshow_image',true) .'" width="120">';break;
  }
}