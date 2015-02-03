<?php
/**
 * If you would like to overwrite the css of the theme you will need to uncomment this action
 */

add_action('wp_enqueue_scripts', 'load_child_theme_styles', 999);

function load_child_theme_styles(){

    // If your css changes are minimal we recommend you to put them in the main style.css.
    // In this case uncomment bellow

  wp_enqueue_style( 'child-theme-style', get_stylesheet_directory_uri() . '/style.css' );

    // If you want to create your own file.css you will need to load it like this (Don't forget to uncomment bellow) :
    //** wp_enqueue_style( 'custom-child-theme-style', get_stylesheet_directory_uri() . '/file.css' );
}

/*
 * Load the translations from the child theme if present
 */
add_action( 'before_wpgrade_core', 'rosa_child_theme_setup' );
function rosa_child_theme_setup() {
	load_child_theme_textdomain( 'rosa_txtd', get_stylesheet_directory() . '/languages' );
}

/*--------------------
   Add Post and Pade ID in Admin
   --------------------*/
   add_filter('manage_posts_columns', 'posts_columns_id', 5);
   add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
   add_filter('manage_pages_columns', 'posts_columns_id', 5);
   add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
   function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
  }
  function posts_custom_id_columns($column_name, $id){
    if($column_name === 'wps_post_id'){
      echo $id;
    }
  }


/*--------------------
   Remove Admin Bar
   --------------------*/
// HIDE THE ADMIN BAR FOR ALL USERS
   show_admin_bar(false);


// SHOW ADMIN BAR FOR ADMINS ONLY
   add_action('after_setup_theme', 'remove_admin_bar');

   function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
  }


  /*--------------------
     Add MyFonts Files
  --------------------*/
  function rosa_child_scripts() {
    wp_enqueue_script( 'overeasy-font', get_template_directory_uri() . '/fonts/Over_Easy.js', array(), '', true );
  }

  add_action( 'wp_enqueue_scripts', 'rosa_child_scripts' );