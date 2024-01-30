<?php 
// Creating of Custom Post Types
function thentwrktheme_post_types() {

    // Copywriting Examples post type
    register_post_type('project', array(
        'public' => true,
        'labels' => array( 
            'name' => 'Projects',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'all_items' => 'All Projects',
            'singular_name' => 'Project',
        ),
        'menu_icon' => 'dashicons-hammer',
        'rewrite' => array('slug' => 'project'),
        'has_archive' => true,
        'supports' => array('editor', 'thumbnail', 'title'),
        'taxonomies' => array( 'category' ),
        'show_in_rest' => true,
        'show_in_nav_menus' => true
    ));
}
add_action('init', 'thentwrktheme_post_types');