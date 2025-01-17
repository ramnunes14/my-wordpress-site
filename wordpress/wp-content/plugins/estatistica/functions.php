<?php
require_once "ink/api.php";
require "ink/api-bandeiras.php";
require_once "ink/api-matches.php";
require "type-stats/exibir.php";

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
            ver($data);
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
