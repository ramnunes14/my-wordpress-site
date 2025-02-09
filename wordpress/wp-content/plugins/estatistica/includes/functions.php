<?php
require_once plugin_dir_path(__FILE__) . "../ink/api.php";
require_once plugin_dir_path(__FILE__) ."../ink/api-bandeiras.php";
require_once plugin_dir_path(__FILE__) ."../ink/api-leagues.php";
require_once "type-stats/exibir.php";
function isTheSame($data, $key) {
    foreach ($data as $chave => $player) {
        if ($chave == $key) {
            return $player;
        }
    }
        return null;  
}

function player ($data,$key){
   
    $_SESSION['erro']=false;
    foreach($data as $dadoplayer){
        foreach($dadoplayer as $chave=>$player){
            if(type($dadoplayer,$key)){$_SESSION['erro']=true;}
                
                break;
        }
    }
    if(!$_SESSION['erro']){
        erro();
    }
    
}

function verificaPlayer($data,$key){
    
    foreach($data as $d){
        if($d==$key){
            $_SESSION['erro']=true;
            echo "<div style='display: flex;flex-direction: column;gap: 15px;align-items: center;'>";
            ver($data);
            echo "</div>";
            return true;
        }
    }
    
}

function type($data,$key){

    if($key=="goals"){
        require_once "type-stats/goals.php";
        verGoals($data);
        
    }

    else if($key=="all"){
        
        if(ver($data)){
            
            return true;
        }
        
        }

    else if($key=="assists"){
        require_once "type-stats/assists.php";
        verAssists($data);
        
    }

    else if($key=="cards"){
        require_once "type-stats/cards.php";
        verCards($data);
        
    }

    else if($key=="minutes"){
        require_once "type-stats/minutes.php";
        verMinutes($data);
        
    }

    else if($key=="names"){
        require_once "type-stats/names.php";
        verNames($data);
        
    }
    else if($key=="rank"){
        require_once "type-stats/rank.php";
        verRank($data);
        
    }

    else{
        $encontrou = verificaPlayer($data,$key);
        if($encontrou){
            
        }
    }
}

function alterar_cor_fundo_admin() {
    echo '
    <style>
        body.wp-admin {
            background-color: white !important;
        }
        
    </style>';
}
add_action('admin_head', 'alterar_cor_fundo_admin');

function erro(){
    echo "<div style='text-align:center;'>";
    echo "<h1 style='color:white;'>Seu Input Nao é válido</h1>";
    echo "</br>";
    echo "</div>";
    die();
    
}
// Função que adiciona os menus do plugin no painel de administração
function estatistica_menu() {
    // Adiciona a página "Players"
    add_menu_page(
        'Players', // Título da página
        'Players', // Nome do menu
        'manage_options', // Permissões para acessar
        'players', // Slug
        'estatistica_players_page' // Função que irá renderizar o conteúdo
    );

    // Adiciona a página "Today Matches"
    add_submenu_page(
        'players', // Página pai
        'Today Matches', // Título da página
        'Today Matches', // Nome do submenu
        'manage_options', // Permissões
        'matches', // Slug
        'estatistica_matches_page' // Função que irá renderizar o conteúdo
    );

    // Adiciona a página "Leagues"
    add_submenu_page(
        'players', // Página pai
        'Leagues', // Título da página
        'Leagues', // Nome do submenu
        'manage_options', // Permissões
        'leagues', // Slug
        'estatistica_leagues_page' // Função que irá renderizar o conteúdo
    );
}

add_action('admin_menu', 'estatistica_menu');

// Funções para renderizar o conteúdo das páginas
function estatistica_players_page() {
    include plugin_dir_path(__FILE__) . 'parts/players.php';
}

function estatistica_matches_page() {
    include plugin_dir_path(__FILE__) . 'parts/matches.php';
}

function estatistica_leagues_page() {
    include plugin_dir_path(__FILE__) . 'parts/leagues.php';
}
