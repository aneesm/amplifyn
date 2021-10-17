<?php
/**
* Plugin Name: DxDy Site Post Types
* Description: Custom Post Types
* Version: 1.0.0
* Author: Chamath Ellawala <chamath@dxdy.tech>
*/

function dxdy_custom_post_types() {
  register_post_type('stories', [
    'labels' => [
      'name' => __( 'Stories' ),
      'singular_name' => __( 'Stories' ),
      'all_items' => __( 'All Stories' ),
      'add_new' => __( 'Add Stories' ),
      'add_new_item' => __( 'Add New Stories' ),
      'edit' => __( 'Edit' ),
      'edit_item' => __( 'Edit Stories' ),
      'new_item' => __( 'New Stories' ),
      'view_item' => __( 'View Stories' ),
      'search_items' => __( 'Search Stories' ),
    ],
    'description' => __( "Stories" ),
    'public' => true,
    'exclude_from_search' => false,
    'show_ui' => true,
    'hierarchical' => false,
    'supports' => array( 'title', 'thumbnail' ),
    'menu_icon' => 'dashicons-align-left'
  ]);

 }

function dxdy_custom_taxonomies() {
  // register_taxonomy('place_types', ['places'], [
  //   'labels' => [
  //     'name' => __('Types'),
  //     'singular_name' => __('Type'),
  //     'search_items' => __('Search Types'),
  //     'all_items' => __('All Types'),
  //     'edit_item' => __('Edit Type'),
  //     'update_item' => __('Update Type'),
  //     'add_new_item' => __('Add New Type'),
  //     'new_item_name' => __('New Type Name'),
  //     'menu_name' => __('Types'),
  //   ],
  //   'hierarchical' => true,
  //   'show_ui' => true,
  //   'show_admin_column' => true,
  //   'query_var' => true,
  // ]);
}

// change menu items in admin
function dxdy_custom_menu_labels() {
  // global $menu;
  // global $submenu;
  // $menu[5][0] = __( 'Blog Articles' );
  // $submenu['edit.php'][5][0] = 'Blog Articles';
  // $submenu['edit.php'][10][0] = 'Add Article';
  // $menu[20][0] = __( 'Landing Pages' );
  // $submenu['edit.php?post_type=page'][5][0] = 'Landing Pages';
  // $submenu['edit.php?post_type=page'][10][0] = 'Add Landing Page';
  // echo '';
}

// change labels for posts and pages
function dxdy_custom_post_object_labels() {
  // global $wp_post_types;
  // $labels = &$wp_post_types['post']->labels;
  // $labels->name = 'Blog Articles';
  // $labels->singular_name = 'Blog Article';
  // $labels->add_new = 'Add Blog Article';
  // $labels->add_new_item = 'Add Blog Article';
  // $labels->edit_item = 'Edit Blog Article';
  // $labels->new_item = 'Blog Article';
  // $labels->view_item = 'View Blog Article';
  // $labels->search_items = 'Search Blog Articles';
  // $labels->not_found = 'No Blog Articles found';
  // $labels->not_found_in_trash = 'No Articles found in Trash';
  // $labels->name_admin_bar = 'Blog Article';

  // $labels = &$wp_post_types['page']->labels;
  // $labels->name = 'Landing Pages';
  // $labels->singular_name = 'Landing Page';
  // $labels->add_new = 'Add Landing Page';
  // $labels->add_new_item = 'Add Landing Page';
  // $labels->edit_item = 'Edit Landing Page';
  // $labels->new_item = 'Landing Page';
  // $labels->view_item = 'View Landing Page';
  // $labels->search_items = 'Search Landing Pages';
  // $labels->not_found = 'No Landing Pages found';
  // $labels->not_found_in_trash = 'No Pages found in Trash';
  // $labels->name_admin_bar = 'Landing Page';
}

add_action('init', 'dxdy_custom_post_types');
add_action('init', 'dxdy_custom_taxonomies');
add_action('admin_menu', 'dxdy_custom_menu_labels');
add_action('init', 'dxdy_custom_post_object_labels');
