<?php
/*
Plugin Name: EstatísticaFut
Description: Tudo sobre futebol.
Version: 1.0
Author: Ricardo
*/

add_action( 'init', 'verstats' );

function verstats() {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    if(is_user_logged_in()){
        require 'config.php';
        session_start();
        $functions_file = plugin_dir_path(__FILE__) . 'functions.php';
        if (file_exists($functions_file))
        {
            require $functions_file;
        } 
        else 
        {
            echo "O arquivo functions.php não foi encontrado.";
        }
        if($_REQUEST!=null)
        {
        include get_template_directory() . '/header.php';
        echo "</br>";
        
        echo "
            <form action='/' >
            <button style='padding:10px;background-color:#038bbb;color:white;border-radius:10px;border:#abccbd;position: absolute;top:15%;left:4%' type='submit' >Voltar a pesquisar</button>
            </form>";
        echo "</br>";    
        }
        echo "<body style='background-color:#122f51;text-align:center;font-family: \"Roboto\", sans-serif;'>";
        if($_POST != null&& !isset($_POST['passe'])) 
        {

            if (isset($data)) 
            {
                player(json_decode($redis->get('players'), true), $_POST['player']);
            } 
            else 
            {
                echo "Erro: A variável \$data não está definida.";
            }
            die();

        }

        if($_GET != null && isset($_GET['name'])) 
        {
            
            
            if (json_decode($redis->get('players'))!=null) {
                player(json_decode($redis->get('players')), $_GET['name']);
            } 
            else {
                echo "Erro: A variável \$data não está definida.";
            }
            die();

        }

        if(isset($_GET['view'])&&$_GET['view']=='players')
        {

            
            if (json_decode($redis->get('players'))!=null) 
            {
                player(json_decode($redis->get('players')), 'all');
            } 
            else 
            {
                echo "Erro: A variável \$data não está definida.";
            }
            die();

        }


        $current_user_id = get_current_user_id(); 
        if (!$current_user_id) {
            die("<h2 style='color:white'>Usuário não autenticado.</h2>");
        }

        
        $liked_players = get_user_meta($current_user_id, 'liked_players', true);
        if (!is_array($liked_players)) {
            $liked_players = [];
        }

        
        if (isset($_GET['estado']) && in_array($_GET['estado'], ['like', 'unlike'])) {
            if (isset($_GET['player'])) {
                $player = sanitize_text_field($_GET['player']);

                if ($_GET['estado'] == 'like') {
                    if (verificapl() && verifico(json_decode($redis->get('players')), $player)) {
                        if (!in_array($player, $liked_players)) {
                            $liked_players[] = $player;
                            update_user_meta($current_user_id, 'liked_players', $liked_players);
                        }
                    }
                    $redirect_url = home_url('?view=players');
                    wp_redirect($redirect_url);
                    exit; 
                } 
                elseif ($_GET['estado'] == 'unlike') {
                    
                    $key = array_search($player, $liked_players);
                    if ($key !== false) {
                        unset($liked_players[$key]);
                        $liked_players = array_values($liked_players);
                        update_user_meta($current_user_id, 'liked_players', $liked_players);
                    }
                    $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : home_url();
                    wp_redirect($previous_url);
                    exit; 
                }
            }
        }

        
        
        if (!empty($liked_players)&&$_GET['estado']=='like') {
            echo "<h2 style='color:white'>LIKED PLAYERS</h2>";
            foreach ($liked_players as $like) {
                echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 70px; background-color: white; border-radius: 20px; width: 500px; margin: 20px auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);'>";

                echo "<span style='color:black;'>" . $like . "</span></br>";
                echo "<a style='color:red;' href='?player=".$like." & estado=unlike'>❤️UNLIKE</br></a>";
                echo "</div>";
            }
        }
        else if($_GET['estado']=='like'){
            echo "<h2 style='color:white'>NO LIKED PLAYERS</h2>";
        }


        if(isset($_GET['view']) && $_GET['view']=='matches')
        {
            
            echo "<h1 style='color:white'>Today Matches</h1>";
            require __DIR__ . '/matches/matches.php';

        }
        if(isset($_GET['id']))
        {

            require __DIR__ . '/matches/league-matches.php';

        }
        if(isset($_GET['view']) && $_GET['view']=='leagues')
        {

            require __DIR__ . '/leagues/leagues.php';

        }
        if(isset($_GET['API']) && $_GET['API']==true)
        {

            echo "<a style='color:white;' href='https://footystats.org'>FootyStats</a>";

        }
        echo "</body>";
        }
    
}

function verificapl()
{
    if(isset($_SESSION['likes'])){
        foreach($_SESSION['likes'] as $likes)
        {
            if($likes == $_GET['player'])
            {
                return false;
            }
        }
    }
    return true;
}


function verifico($data,$key)
{
    foreach($data as $dadoplayer)
    {
        
            foreach($dadoplayer as $d)
            {
                if($d==$key)
                {
                    return true;
                }
            
            }
    }
    return false;
}