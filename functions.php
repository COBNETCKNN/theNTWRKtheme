<?php 
// Enquesing custom CSS&JS files
function thentwrktheme_files() {
    //enqueue CSS
    wp_enqueue_style('mainCSS', get_template_directory_uri() . '/css/main.css', array(), '1.1');
    wp_enqueue_style('owlCarousel', get_template_directory_uri() . '/assets/owlCarousel/owl.carousel.min.css', array(), '1.1');
    wp_enqueue_style('scrollCarousel', 'https://cdn.jsdelivr.net/npm/scroll-carousel@1.2.7/dist/scroll.carousel.min.css');
    wp_enqueue_style('fontAwesomeCSS', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');

    //enqueue JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('mainJS', get_stylesheet_directory_uri() . '/js/main.js', array(), 1.1, true);
    wp_enqueue_script('owlCarouselJS', get_stylesheet_directory_uri(). '/assets/owlCarousel/owl.carousel.min.js', array(), 1.1, true);
    wp_enqueue_script('scrollCarouselJS', 'https://cdn.jsdelivr.net/npm/scroll-carousel@1.2.7/dist/scroll.carousel.min.js');
    wp_enqueue_script('fontAwesome', 'https://kit.fontawesome.com/24bc428ad4.js');
}
add_action( 'wp_enqueue_scripts', 'thentwrktheme_files' );

// Adding theme supports
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

add_image_size('logo-size', 210, 60, true);
add_image_size('social-media-icons', 25, 25, true);
add_image_size('project-carousel', 225, 200, true);
add_image_size('project-post', 850, 250, true);
add_image_size('services-carousel', 650, 65, true);

// Registrating Custom Post Types
require_once('partials/post-types.php');

// Registrating Menus
require_once('partials/menu-registration.php');

// Disabling editor on certain pages
function remove_pages_editor() {
    $disabled_pages = array(21, 42, 8, 10);

    $current_page_id = get_the_ID();

    if (in_array($current_page_id, $disabled_pages)) {
        remove_post_type_support('page', 'editor');
    }
}
add_action('add_meta_boxes', 'remove_pages_editor');

// Ajax load more for Projects Archive page
function cxc_theme_enqueue_script_style() {

	wp_enqueue_script( 'custom-script', get_template_directory_uri(). '/partials/ajax/load-more-projects.js', array('jquery') );
	// Localize the script with new data
	wp_localize_script( 'custom-script', 'ajax_posts', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'noposts' => __( 'No older posts found', 'cxc-codexcoach' ),
	));

}
add_action( 'wp_enqueue_scripts', 'cxc_theme_enqueue_script_style' );

// Ajax callback function for load more Projects archive page
require_once('partials/ajax/load-more-projects-callback.php');



