<?php
/*
Plugin Name: EstatísticaFut
Description: Tudo sobre futebol.
Version: 1.0
Author: Ricardo
*/

add_action( 'init', 'verstats' );

function verstats() {
    
    session_start();
    // Verificar se o arquivo functions.php existe
    $functions_file = plugin_dir_path(__FILE__) . 'functions.php';
    if (file_exists($functions_file)) {
        require $functions_file;
    } else {
        echo "O arquivo functions.php não foi encontrado.";
    }
    if($_REQUEST!=null){
    include get_template_directory() . '/header.php';
    echo "</br>";
    
    echo "<form action='/' >
        <button style='padding:10px;background-color:#768a4f;color:white;border-radius:10px;border:#abccbd;' type='submit' onmouseover='this.style.backgroundColor=\"#768a4f\";' onmouseout='this.style.backgroundColor=\"#768a4f\";'>Voltar a pesquisar</button>
        </form>";
    }
    echo "<body style='background-color:#122f51;text-align:center;'>";
    if($_POST != null) 
    {
        
        
        // Verificar se $data está definida
        if (isset($data)) {
            player($data, $_POST['player']);
        } else {
            echo "Erro: A variável \$data não está definida.";
        }
        die();
    }
    if($_GET != null && isset($_GET['name'])) {
        echo "<form action='/' >
        <button style='padding:10px;background-color:#768a4f;color:white;border-radius:10px;border:#abccbd;' type='submit' onmouseover='this.style.backgroundColor=\"#768a4f\";' onmouseout='this.style.backgroundColor=\"#768a4f\";'>Voltar a pesquisar</button>
        </form>";
        
        // Verificar se $data está definida
        if (isset($data)) {
            player($data, $_GET['name']);
        } else {
            echo "Erro: A variável \$data não está definida.";
        }
        die();
    }

    echo "</body>";
}
