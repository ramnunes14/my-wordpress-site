<?php
function verRank($data){
    $posicao=isTheSame($data,"position");

    if($posicao=="Defender")
    {
        $resultado=isTheSame($data,"rank_in_league_top_defenders");
    }

    else if($posicao=="Midfielder")
    {
        $resultado=isTheSame($data,"rank_in_league_top_midfielders");
    }

    else if($posicao=="Forward")
    {
        $resultado=isTheSame($data,"rank_in_league_top_attackers");
    }

    else if($posicao=="Goalkeeper")
    {
        $resultado=isTheSame($data,"rank_in_league_top_defenders");
        $posicao="Defender";
    }
    
    echo "<h1 style='color:white;'>".isTheSame($data,"full_name")."</h1>";
    echo "<span style='color:red;'>Este jogador esta no top ".$resultado." ".$posicao."s na sua liga</span></br>";
}
?>