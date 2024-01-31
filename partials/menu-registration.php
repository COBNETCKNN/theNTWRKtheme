<?php 

function thentwrktheme_menus() {
    register_nav_menus(
        array(
            'header_menu'   => esc_html__( 'Header Menu', 'thentwrktheme' ),
        )
    );
}
add_action( 'init', 'thentwrktheme_menus' );