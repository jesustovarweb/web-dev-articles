<?php

// Enqueue the child theme stylesheet so custom styles are properly loaded
add_action( 'wp_enqueue_scripts', 'basic_child_theme_load_styles' );

function basic_child_theme_load_styles() {
    wp_enqueue_style(
        'child-theme-styles',
        get_stylesheet_uri()
    );
}