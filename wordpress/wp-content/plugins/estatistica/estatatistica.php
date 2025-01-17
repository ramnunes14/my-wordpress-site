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
        // Verificar se o arquivo functions.php existe
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
        echo "<body style='background-color:#122f51;text-align:center;'>";
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
        if (isset($_GET['estado']) && $_GET['estado'] == 'like') {
            if (isset($_GET['player'])) {
                if(isset($_SESSION['likes'])){
                    if (verificapl() == true && verifico($data, $_GET['player']) == true) {
                        if (!in_array($_GET['player'], $_SESSION['likes'])) {
                            $_SESSION['likes'][] = $_GET['player'];
                        }
                    }
                }
                else{
                    $_SESSION['likes']=[];
                }
            }
        
            echo "<h2 style='color:white'>LIKED PLAYERS</h2>";
            if (!empty($_SESSION['likes'])) {
                foreach ($_SESSION['likes'] as $like) {
                    echo "<span style='color:white;'>" . htmlspecialchars($like) . "</span></br>";
                }
            }
        }
        
        if (isset($_GET['estado']) && $_GET['estado'] == 'unlike') {
            if (isset($_GET['player'])) {
                
                $key = array_search($_GET['player'], $_SESSION['likes']);
                if ($key !== false) {
                    unset($_SESSION['likes'][$key]);
                    
                    $_SESSION['likes'] = array_values($_SESSION['likes']);
                }
            }
        
            echo "<h2 style='color:white'>LIKED PLAYERS</h2>";
            if (!empty($_SESSION['likes'])) {
                foreach ($_SESSION['likes'] as $like) {
                    echo "<span style='color:white;'>" . htmlspecialchars($like) . "</span></br>";
                }
            }
        }
        if(isset($_GET['view']) && $_GET['view']=='matches')
        {

            require __DIR__ . '/matches/matches.php';

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
    foreach($_SESSION['likes'] as $likes)
    {
        if($likes == $_GET['player'])
        {
            return false;
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