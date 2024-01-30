<?php 

function thentwrktheme_menus() {
    register_nav_menus(
        array(
            'header_menu'   => esc_html__( 'Header Menu', 'thentwrktheme' ),
            'footer_menu' => esc_html__( 'Footer Menu', 'thentwrktheme' ),
        )
    );
}
add_action( 'init', 'thentwrktheme_menus' );