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
        'supports' => array('thumbnail', 'title'),
        'taxonomies' => array( 'category' ),
        'show_in_rest' => true,
        'show_in_nav_menus' => true
    ));
}
add_action('init', 'thentwrktheme_post_types');

// Removing default Posts from WordPress
function remove_default_post_type($args, $postType) {
    if ($postType === 'post') {
        $args['public']                = false;
        $args['show_ui']               = false;
        $args['show_in_menu']          = false;
        $args['show_in_admin_bar']     = false;
        $args['show_in_nav_menus']     = false;
        $args['can_export']            = false;
        $args['has_archive']           = false;
        $args['exclude_from_search']   = true;
        $args['publicly_queryable']    = false;
        $args['show_in_rest']          = false;
    }

    return $args;
}
add_filter('register_post_type_args', 'remove_default_post_type', 0, 2);