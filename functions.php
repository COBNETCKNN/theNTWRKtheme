<?php 
// Enquesing custom CSS&JS files
function thentwrktheme_files() {
    //enqueue CSS
    wp_enqueue_style('mainCSS', get_template_directory_uri() . '/css/main.css', array(), '1.0');
    wp_enqueue_style('owlCarousel', get_template_directory_uri() . '/assets/owlCarousel/owl.carousel.min.css', array(), '1.0');

    //enqueue JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('mainJS', get_stylesheet_directory_uri() . '/js/main.js', array(), 1.0, true);
    wp_enqueue_script('masonryJSminified', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js');
    wp_enqueue_script('owlCarouselJS', get_stylesheet_directory_uri(). '/assets/owlCarousel/owl.carousel.min.js', array(), 1.0, true);
}
add_action( 'wp_enqueue_scripts', 'thentwrktheme_files' );

// Adding theme supports
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

add_image_size('logo-size', 210, 60, true);
add_image_size('social-media-icons', 25, 25, true);
add_image_size('project-carousel', 225, 200, true);
add_image_size('project-post', 850, 250, true);

// Registrating Custom Post Types
require_once('partials/post-types.php');

// Registrating Menus
require_once('partials/menu-registration.php');

// Disabling editor on certain pages
// removes rich text editor for certain pages
function remove_pages_editor(){
    if(get_the_ID() === 21) {
        remove_post_type_support( 'page', 'editor' );
    } 
    
    if(get_the_ID() === 42) {
        remove_post_type_support( 'page', 'editor' );
    } 
    
    if(get_the_ID() === 8) {
        remove_post_type_support( 'page', 'editor' );
    } 

    if(get_the_ID() === 10) {
        remove_post_type_support( 'page', 'editor' );
    } 
    // end if
} // end remove_pages_editor
add_action( 'add_meta_boxes', 'remove_pages_editor' );
