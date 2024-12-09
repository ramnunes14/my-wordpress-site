<?php
/*
Plugin Name: Estatística
Description: Tudo sobre futebol.
Version: 1.0
Author: Ricardo
*/


add_action( 'init', 'verstats' );

function verstats() {
    session_start();
    
    $apiUrl = "https://api.football-data-api.com/league-players?key=example&season_id=2012&include=stats";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) 
    {
        echo 'Erro na requisição: ' . curl_error($ch);
        exit;
    }
    
    curl_close($ch);
    
    $data = json_decode($response, true);
    $data = $data['data'];
    function procura($data,$key,$type=null){
        $result=[];
        $nacionalidades = [
            "Portugal" => "pt",    // Portugal
            "Brazil" => "br",      // Brasil
            "France" => "fr",      // França
            "Germany" => "de",     // Alemanha
            "Spain" => "es",       // Espanha
            "Italy" => "it",       // Itália
            "England" => "gb",     // Inglaterra (bandeira específica)
            "Scotland" => "scotland", // Escócia
            "Wales" => "wales",    // País de Gales
            "Northern Ireland" => "northern-ireland", // Irlanda do Norte
            "Ireland" => "ie",     // Irlanda
            "Argentina" => "ar",   // Argentina
            "Belgium" => "be",     // Bélgica
            "Netherlands" => "nl", // Países Baixos (Holanda)
            "Senegal" => "sn",     // Senegal
            "Ivory Coast" => "ci", // Costa do Marfim
            "Ghana" => "gh",       // Gana
            "Nigeria" => "ng",     // Nigéria
            "Australia" => "au",   // Austrália
            "United States" => "us", // Estados Unidos
            "Canada" => "ca",      // Canadá
            "Sweden" => "se",      // Suécia
            "Denmark" => "dk",     // Dinamarca
            "Norway" => "no",      // Noruega
            "Switzerland" => "ch", // Suíça
            "Croatia" => "hr",     // Croácia
            "Poland" => "pl",      // Polônia
            "Serbia" => "rs",      // Sérvia
            "Czech Republic" => "cz", // República Tcheca
            "Austria" => "at",     // Áustria
            "Japan" => "jp",       // Japão
            "South Korea" => "kr", // Coreia do Sul
            "Mexico" => "mx",      // México
            "Colombia" => "co",    // Colômbia
            "Uruguay" => "uy",     // Uruguai
        ];
        
        
            if($key=='player'){
                    //EXIBIR JOGADOR DEPOIS DE SELECIONAR SUGESTAO
                    $bandeira_url = "https://flagcdn.com/w320/" . $nacionalidades[procura($data,"nationality","key")] . ".png";
                    if($type=="exibir"){
                        echo "<img src='".$bandeira_url."'style='width: 100px;'></br></h1>";
                        echo "<h1>".procura($data,"full_name","key")."</h1>";
                        echo "<span style='color:red'> ->     ".procura($data,"position","key")."</br></span>";
                        echo "<span style='color:red'> ->     ".procura($data,"minutes_played_overall","key")."min played</br></span>";
                        echo "<span style='color:red'> ->     ".procura($data,"goals_overall","key")." goals in ".procura($data,"season","key")."</br></span>";
                        echo "<span style='color:red'> ->     ".procura($data,"yellow_cards_overall","key")." yellow cards</br></span>";
                        echo "<a style='color:blue;' href='".procura($data,"url","key")."'>More Info</br></a>";
                        echo "----------------------------------------------------------------------------------------</br></br>";

                    }
                    //DEPOIS DO FORM APARECE AS SUGESTOES
                    else{
                        foreach($data as $chave=>$player){
                            
                            if($chave=='full_name'){echo "<a style='font-size:30px;'href='../../?".$player."' style='color:blue;'>".$player."</a></br>";}
                                        
                        }
                    }
                    $encontrado=true;
            }
            //RETORNA OS VALORES PEDIDOS PARA O JOGADOR SELECIONADO
            else if($type=="key"){
                
                    foreach($data as $chave=>$player){
                        if($chave==$key){return $player;} 
                    }
                
            }
            else if($key=="all"){
                foreach($data as $dadoplayer){
                            procura($dadoplayer,'player',"exibir");
                            $encontrado=true;
                }
            }
            //BUSCA INICIAL DOS JOGADORES NO GERAL
            else {
                echo "<h1>Jogadores encontrados:</h1>";
                foreach($data as $dadoplayer){
                    foreach($dadoplayer as $chave=>$player){
                        if($player==$key){
                            procura($dadoplayer,'player',$type);
                            $encontrado=true;
                            break;
                        }
                    }
                }
            }

            if(!$encontrado){echo "Ups! Something went wrong!";}
        
    }

    if($_POST!=null){
        procura($data,$_POST['player']);
        echo"<form action='/' >
            <button style='padding:10px;background-color:blue;color:white;border-radius:10px;' type='submit'>Voltar a pesquisar</button>
        </form>";
        die();
    }
    if($_GET!=null){

        foreach($_GET as $key=>$get){
        procura($data,str_replace("_"," ",$key),"exibir");}
    }
}