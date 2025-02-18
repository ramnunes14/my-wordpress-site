<?php
require_once MEU_PLUGIN_DIR . 'includes/api/api.php';
require_once MEU_PLUGIN_DIR . 'includes/api/api-bandeiras.php';
require_once MEU_PLUGIN_DIR . 'includes/api/api-leagues.php';
require_once MEU_PLUGIN_DIR . 'includes/players/estatistica/exibir.php';

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
        require_once MEU_PLUGIN_DIR . 'includes/players/estatistica/goals.php';
        verGoals($data);
        
    }

    else if($key=="all"){
        
        if(ver($data)){
            
            return true;
        }
        
        }

    else if($key=="assists"){
        require_once MEU_PLUGIN_DIR . 'includes/players/estatistica/assists.php';
        verAssists($data);
        
    }

    else if($key=="cards"){
        require_once MEU_PLUGIN_DIR . 'includes/players/estatistica/cards.php';
        verCards($data);
        
    }

    else if($key=="minutes"){
        require_once MEU_PLUGIN_DIR . 'includes/players/estatistica/minutes.php';
        verMinutes($data);
        
    }

    else if($key=="names"){
        require_once MEU_PLUGIN_DIR . 'includes/players/estatistica/names.php';
        verNames($data);
        
    }
    else if($key=="rank"){
        require_once MEU_PLUGIN_DIR . 'includes/players/estatistica/rank.php';
        verRank($data);
        
    }

    else{
        $encontrou = verificaPlayer($data,$key);
        if($encontrou){
            
        }
    }
}



function erro(){
    echo "<div style='text-align:center;'>";
    echo "<h1 style='color:white;'>Seu Input Nao é válido</h1>";
    echo "</br>";
    echo "</div>";
    die();
    
}
