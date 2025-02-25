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

function meu_menu_admin() {
    add_menu_page(
        'Configurações Estatistica', 
        'Menu Stats',                     
        'manage_options',               
        'meu-menu-slug',                
        'minha_pagina_admin',           
        'dashicons-admin-generic',      
    );
}
add_action('admin_menu', 'meu_menu_admin');


function registrar_config_homepage() {
    register_setting('config_homepage_grupo', 'pagina_principal'); 
    register_setting('config_homepage_grupo', 'shortcodes_paginas'); 

    add_settings_section('config_homepage_secao', 'Configuração da Página Inicial', null, 'config-homepage');
    add_settings_field('pagina_principal', 'Escolha a Página Principal:', 'campo_pagina_principal_callback', 'config-homepage', 'config_homepage_secao');

    add_settings_section('config_shortcodes_secao', 'Shortcodes por Página', null, 'config-homepage');
    add_settings_field('shortcodes_paginas', 'Definir Shortcodes:', 'campo_shortcodes_callback', 'config-homepage', 'config_shortcodes_secao');
}
add_action('admin_init', 'registrar_config_homepage');


function campo_pagina_principal_callback() {
    $pagina_selecionada = get_option('pagina_principal', ''); 
    $paginas = get_pages(); 

    echo '<select name="pagina_principal">';
    echo '<option value="">-- Selecione uma Página --</option>';
    
    foreach ($paginas as $pagina) {
        $selected = ($pagina_selecionada == $pagina->ID) ? 'selected' : '';
        echo '<option value="' . esc_attr($pagina->ID) . '" ' . $selected . '>' . esc_html($pagina->post_title) . '</option>';
    }
    
    echo '</select>';
}

function campo_shortcodes_callback() {
    $shortcodes_paginas = get_option('shortcodes_paginas', []); 
    $paginas = get_pages(); 

    echo '<table>';
    foreach ($paginas as $pagina) {
        $valor_shortcode = isset($shortcodes_paginas[$pagina->ID]) ? esc_attr($shortcodes_paginas[$pagina->ID]) : '';
        echo '<tr>';
        echo '<td><strong>' . esc_html($pagina->post_title) . ':</strong></td>';
        echo '<td><input type="text" name="shortcodes_paginas[' . $pagina->ID . ']" value="' . $valor_shortcode . '" placeholder="[meu_shortcode]" style="width: 300px;"></td>';
        echo '</tr>';
    }
    echo '</table>';
}



function minha_pagina_admin() {
    ?>
    <div class="wrap">
        <h1>Configurações do Site</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields('config_homepage_grupo');
                do_settings_sections('config-homepage');
                submit_button('Salvar Configurações');
            ?>
        </form>
    </div>
    <?php
}
function inserir_shortcode_nas_paginas($content) {
    if (is_page()) {
        $pagina_id = get_the_ID();
        $shortcodes_paginas = get_option('shortcodes_paginas', []);

        if (!empty($shortcodes_paginas[$pagina_id])) {
            $content .= do_shortcode($shortcodes_paginas[$pagina_id]);
        }
    }
    return $content;
}
add_filter('the_content', 'inserir_shortcode_nas_paginas');
