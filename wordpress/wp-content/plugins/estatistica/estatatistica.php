<?php
/*
Plugin Name: EstatísticaFut
Description: Tudo sobre futebol.
Version: 1.0
Author: Ricardo
*/

add_action( 'init', 'verstats' );

function verstats() {
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
            <button style='padding:10px;background-color:#768a4f;color:white;border-radius:10px;border:#abccbd;' type='submit' onmouseover='this.style.backgroundColor=\"#768a4f\";' onmouseout='this.style.backgroundColor=\"#768a4f\";'>Voltar a pesquisar</button>
            </form>";
        }
        echo "<body style='background-color:#122f51;text-align:center;'>";
        if($_POST != null&& !isset($_POST['passe'])) 
        {

            if (isset($data)) 
            {
                player($data, $_POST['player']);
            } 
            else 
            {
                echo "Erro: A variável \$data não está definida.";
            }
            die();

        }

        if($_GET != null && isset($_GET['name'])) 
        {
            
            
            if (isset($data)) {
                player($data, $_GET['name']);
            } 
            else {
                echo "Erro: A variável \$data não está definida.";
            }
            die();

        }

        if(isset($_GET['view'])&&$_GET['view']=='players')
        {

            
            if (isset($data)) 
            {
                player($data, 'all');
            } 
            else 
            {
                echo "Erro: A variável \$data não está definida.";
            }
            die();

        }
        if(isset($_GET['estado'])&&$_GET['estado']=='like')
        {

            if(isset($_GET['player']))
            {
                if(verificapl()==true&&verifico($data,$_GET['player'])==true)
                {
                    $_SESSION['likes'][]=$_GET['player'];
                }
                
            }
            
            echo "<h2 style='color:white'>LIKED PLAYERS</h2>";
            foreach($_SESSION['likes'] as $like)
            {
                
                
                    echo "<span style='color:white;'>".$like."</span></br>";
            
                
            }
            
        }
        if(isset($_GET['estado'])&&$_GET['estado']=='unlike')
        {

            if(isset($_GET['player']))
            {
                if(verifico($data,$_GET['player'])==true&&removepl()==true)
                {
                }
                
            }
            
            echo "<h2 style='color:white'>LIKED PLAYERS</h2>";

            foreach($_SESSION['likes'] as $like)
            {
                echo "<span style='color:white;'>".$like."</span></br>";
            }
            
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
function removepl()
{
    foreach($_SESSION['likes'] as $likes)
    {
        if($likes == $_GET['player'])
        {
            
            return true;
        }
    }
    return false;
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