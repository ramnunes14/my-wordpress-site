<?php
function verCards($data){
    $resultado=isTheSame($data,"cards_overall");
    $yellow=isTheSame($data,"yellow_cards_overall");
    $red=isTheSame($data,"red_cards_overall");
    echo "<h1 style='color:white;'>".isTheSame($data,"full_name")."</h1>";
    echo "<span style='color:white'>Este jogador levou ".$resultado." cartoes no total</span></br>";
    echo "<span style='color:white'>🟨 ".$yellow." cartoes amarelos</span></br>";
    echo "<span style='color:white'>🟥 ".$red." cartoes vermelhos</span></br>";
}
?>