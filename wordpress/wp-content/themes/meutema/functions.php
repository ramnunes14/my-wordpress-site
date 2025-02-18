<?php
function meutema_theme_support(){

    add_theme_support('tittle-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

}
add_action('after_setup_theme','meutema_theme_support');

function meutema_menus(){
    $locations= array(

        'primary'=>"Desktop Primary Left Sidebar",
        'footer' =>"Footer Menu Items"
    );
    register_nav_menus($locations);
}

add_action('init','meutema_menus');

function meutema_register_styles(){

    wp_enqueue_style('meutema-style',get_template_directory_uri()."/style.css",array(),'1.0','all');
    wp_enqueue_style('meutema-styles',get_template_directory_uri()."/assets/css/style.css",array(),'1.0','all');

}
add_action('wp_enqueue_scripts','meutema_register_styles');


function meutema_register_scripts(){

    
    wp_enqueue_script('meutema-main',get_template_directory_uri()."/assets/js/main.js",array(),'1.0',true);

}
add_action('wp_enqueue_scripts','meutema_register_scripts');