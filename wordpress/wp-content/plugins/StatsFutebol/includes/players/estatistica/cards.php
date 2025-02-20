<?php
function verCards($data){
    $resultado=isTheSame($data,"cards_overall");
    $yellow=isTheSame($data,"yellow_cards_overall");
    $red=isTheSame($data,"red_cards_overall");
    echo"<div class='cartao'>";
    echo "<h1 style='color:black;'>".isTheSame($data,"full_name")."</h1>";
    echo "<span style='color:black'>Este jogador levou ".$resultado." cartoes no total</span></br>";
    echo "<span style='color:black'>🟨 ".$yellow." cartoes amarelos</span></br>";
    echo "<span style='color:black'>🟥 ".$red." cartoes vermelhos</span></br>";
    echo "</div>";
}
?>