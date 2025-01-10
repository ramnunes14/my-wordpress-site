<?php
require "ink/api.php";
require "ink/api-bandeiras.php";
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


function erro(){
    echo "<div style='text-align:center;'>";
    echo "<h1 style='color:red;'> Vini Don't Cry But Ups Something Went Wrong! </h1>";
    echo "</br>";
    $url="https://sportal365images.com/process/smp-images-production/abola.pt/25032024/7d24bef0-5f71-4654-a3f0-920956b925a6.jpg";
    echo "<img src='".$url."'style='width: 500px;'></br></h1>";
    echo "</div>";
    die();
    
}
