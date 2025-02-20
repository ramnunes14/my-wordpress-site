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
    echo "<div style='background-color:white;display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 70px; background-color: white; border-radius: 20px; width: 500px; margin: 20px auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);'>";
    echo "<h1 style='color:black;'>".isTheSame($data,"full_name")."</h1>";
    echo "<span style='color:red;'>Este jogador esta no top ".$resultado." ".$posicao."s na sua liga</span></br>";
    echo "</div>";
    
}
?>