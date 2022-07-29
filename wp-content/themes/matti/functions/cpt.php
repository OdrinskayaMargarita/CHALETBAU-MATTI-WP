<?php
/**
 * Creating a function to create our CPT
 * Custom post type / example gallery, plz change for your projects
 * If you not use CPT, commented this function
 */
function custom_post_type()
{
    // Team
    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Team', 'Post Type General Name', 'my-theme'),
        'singular_name' => _x('Team', 'Post Type Singular Name', 'my-theme'),
        'menu_name' => __('Team', 'my-theme'),
        'parent_item_colon' => __('Team', 'my-theme'),
        'all_items' => __('All Members', 'my-theme'),
        'view_item' => __('View Member', 'my-theme'),
        'add_new_item' => __('Add New Member', 'my-theme'),
        'add_new' => __('Add New', 'my-theme'),
        'edit_item' => __('Edit Member', 'my-theme'),
        'update_item' => __('Update Member', 'my-theme'),
        'search_items' => __('Search Members', 'my-theme'),
        'not_found' => __('Not Found', 'my-theme'),
        'not_found_in_trash' => __('Not found in Trash', 'my-theme'),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label' => __('Team', 'my-theme'),
        'description' => __('Team', 'my-theme'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-groups',
        // Features this CPT supports in Post Editor
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
    );

    // Registering your Custom Post Type
    register_post_type('team', $args);


    // Jobs
    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Jobs', 'Post Type General Name', 'my-theme'),
        'singular_name' => _x('Jobs', 'Post Type Singular Name', 'my-theme'),
        'menu_name' => __('Jobs', 'my-theme'),
        'parent_item_colon' => __('Jobs', 'my-theme'),
        'all_items' => __('All Jobs', 'my-theme'),
        'view_item' => __('View Jobs', 'my-theme'),
        'add_new_item' => __('Add New Jobs', 'my-theme'),
        'add_new' => __('Add New', 'my-theme'),
        'edit_item' => __('Edit Jobs', 'my-theme'),
        'update_item' => __('Update Jobs', 'my-theme'),
        'search_items' => __('Search Jobs', 'my-theme'),
        'not_found' => __('Not Found', 'my-theme'),
        'not_found_in_trash' => __('Not found in Trash', 'my-theme'),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label' => __('Jobs', 'my-theme'),
        'description' => __('Jobs', 'my-theme'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-id',
        // Features this CPT supports in Post Editor
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
    );

    // Registering your Custom Post Type
    register_post_type('jobs', $args);


};
add_action('init', 'custom_post_type', 0);
?>