<?php

function statsfutebol_register_styles() {
    wp_enqueue_style(
        'statsfutebol-style',
        STATSFUTEBOL_PLUGIN_URL . 'assets/css/style.css',
        array(), 
        filemtime(plugin_dir_path(__FILE__) . '../assets/css/style.css'), 
        'all' 
    );
}

add_action('wp_enqueue_scripts', 'statsfutebol_register_styles');

function statsfutebol_register_scripts() {
    wp_enqueue_script(
        'statsfutebol-script',
        STATSFUTEBOL_PLUGIN_URL . 'assets/js/script.js',
        array(), 
        filemtime(plugin_dir_path(__FILE__) . '../assets/js/script.js'), 
        true 
    );
}

add_action('wp_enqueue_scripts', 'statsfutebol_register_scripts');
