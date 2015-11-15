<?php

// PROJECT FILE LIST
  
function argcom_project_slide( $file_list_meta_key, $img_size = 'full' ) {

  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

  foreach ( (array) $files as $attachment_id => $attachment_url ) {
    ?>
      <li data-thumb="<?php echo get_post_meta(get_the_ID(),'_argcom_project_image',true); ?>">
        <?php echo wp_get_attachment_image( $attachment_id, $img_size ); ?>
      </li> 
    <?php
  }

}

function argcom_project_carousel( $file_list_meta_key, $img_size = 'full' ) {

  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

  foreach ( (array) $files as $attachment_id => $attachment_url ) {
    ?>
      <li data-thumb="<?php echo get_post_meta(get_the_ID(),'_argcom_project_image',true); ?>">
        <?php echo wp_get_attachment_image( $attachment_id, $img_size ); ?>
      </li> 
    <?php
  }
}

// PROJECTS

add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

  $labels = array( 
    'name' => _x( 'Projects', 'project' ),
    'singular_name' => _x( 'Project', 'project' ),
    'add_new' => _x( 'Add New', 'project' ),
    'add_new_item' => _x( 'Add New Project', 'project' ),
    'edit_item' => _x( 'Edit Project', 'project' ),
    'new_item' => _x( 'New Project', 'project' ),
    'view_item' => _x( 'View Project', 'project' ),
    'search_items' => _x( 'Search Projects', 'project' ),
    'not_found' => _x( 'No projects found', 'project' ),
    'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
    'parent_item_colon' => _x( 'Parent Project:', 'project' ),
    'menu_name' => _x( 'Projects', 'project' ),
  );

  $args = array( 
    'labels' => $labels,
    'hierarchical' => true,

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-clipboard',

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'project', $args );
}