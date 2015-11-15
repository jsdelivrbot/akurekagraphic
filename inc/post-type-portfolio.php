<?php

// PROJECT FILE LIST
  
function argcom_portfolio_slide( $file_list_meta_key, $img_size = 'full' ) {

  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

  foreach ( (array) $files as $attachment_id => $attachment_url ) {
    ?>
      <li data-thumb="<?php echo get_post_meta(get_the_ID(),'_argcom_portfolio_image',true); ?>">
        <?php echo wp_get_attachment_image( $attachment_id, $img_size ); ?>
      </li> 
    <?php
  }

}

function argcom_portfolio_carousel( $file_list_meta_key, $img_size = 'full' ) {

  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

  foreach ( (array) $files as $attachment_id => $attachment_url ) {
    ?>
      <li data-thumb="<?php echo get_post_meta(get_the_ID(),'_argcom_portfolio_image',true); ?>">
        <?php echo wp_get_attachment_image( $attachment_id, $img_size ); ?>
      </li> 
    <?php
  }
}

// PROJECTS

add_action( 'init', 'register_cpt_portfolio' );

function register_cpt_portfolio() {

  $labels = array( 
    'name' => _x( 'Portfolios', 'argcom' ),
    'singular_name' => _x( 'Portfolio', 'argcom' ),
    'add_new' => _x( 'Add New', 'argcom' ),
    'add_new_item' => _x( 'Add New Portfolio', 'argcom' ),
    'edit_item' => _x( 'Edit Portfolio', 'argcom' ),
    'new_item' => _x( 'New Portfolio', 'argcom' ),
    'view_item' => _x( 'View Portfolio', 'argcom' ),
    'search_items' => _x( 'Search Portfolios', 'argcom' ),
    'not_found' => _x( 'No portfolios found', 'argcom' ),
    'not_found_in_trash' => _x( 'No portfolios found in Trash', 'argcom' ),
    'parent_item_colon' => _x( 'Parent Portfolio:', 'argcom' ),
    'menu_name' => _x( 'Portfolios', 'argcom' ),
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

  register_post_type( 'portfolio', $args );
}