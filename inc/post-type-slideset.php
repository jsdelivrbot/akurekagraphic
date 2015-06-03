<?php
/**
 * @package AkuRekaGraphic
 * @author Jamaludin Rajalu
 * @version 1.0.0
 * 
 */

function title_slideset_input ( $title ) {
  if ( get_post_type() == 'slideset' ) {
    $title = __( 'Enter slideset title here', 'argcom' );
  }
  return $title;
} // End title_text_input()
add_filter( 'enter_title_here', 'title_slideset_input' );

function argcom_slideset() {

  $labels = array(
    'name'                => _x( 'Slideset', 'Post Type General Name', 'argcom' ),
    'singular_name'       => _x( 'Slideset', 'Post Type Singular Name', 'argcom' ),
    'menu_name'           => __( 'Slideset', 'argcom' ),
    'parent_item_colon'   => __( 'Parent Slideset:', 'argcom' ),
    'all_items'           => __( 'All Slideset', 'argcom' ),
    'view_item'           => __( 'View Slideset', 'argcom' ),
    'add_new_item'        => __( 'Add New Slideset', 'argcom' ),
    'add_new'             => __( 'New Slideset', 'argcom' ),
    'edit_item'           => __( 'Edit Slideset', 'argcom' ),
    'update_item'         => __( 'Update Slideset', 'argcom' ),
    'search_items'        => __( 'Search Slideset', 'argcom' ),
    'not_found'           => __( 'No Slideset found', 'argcom' ),
    'not_found_in_trash'  => __( 'No Slideset found in Trash', 'argcom' ),
  );
  $args = array(
    'label'               => __( 'Slideset', 'argcom' ),
    'description'         => __( 'Frontpage image slideset', 'argcom' ),
    'labels'              => $labels,
    'supports'            => array( 'title' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'     => 20,
    'menu_icon'           => 'dashicons-format-gallery',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'slideset', $args );

}

// Hook into the 'init' action
add_action( 'init', 'argcom_slideset', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_slideset_posts_custom_column', 'argcom_slideset_custom_columns');
add_filter('manage_edit-slideset_columns', 'argcom_add_new_slideset_columns');

function argcom_add_new_slideset_columns( $columns ){
  $columns = array(
    'cb'                        => '<input type="checkbox">',
    'argcom_slideset_image'    => __( 'Image', 'argcom' ),
    'title'                     => __( 'Title', 'argcom' ),
    'date'                      => __( 'Date', 'argcom' )
  );
  return $columns;
}

function argcom_slideset_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'argcom_slideset_image' : echo '<img src="'. get_post_meta($post->ID,'argcom_slideset_image',true) .'" width="120">';break;
  }
}