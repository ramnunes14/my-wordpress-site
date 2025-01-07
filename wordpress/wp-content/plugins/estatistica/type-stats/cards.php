<?php
function verCards($data){
    $resultado=isTheSame($data,"cards_overall");
    $yellow=isTheSame($data,"yellow_cards_overall");
    $red=isTheSame($data,"red_cards_overall");
    echo "<h1 style='color:black;'>".isTheSame($data,"full_name")."</h1>";
    echo "<span>Este jogador levou ".$resultado." cartoes no total</span></br>";
    echo "<span>🟨 ".$yellow." cartoes amarelos</span></br>";
    echo "<span>🟥 ".$red." cartoes vermelhos</span></br>";
}
?>