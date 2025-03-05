<?php
function verMinutes($data)
{
    echo"<div class='cartao'>";
    $resultado=isTheSame($data,"minutes_played_overall");
    echo "<h1 style='color:black;'>".isTheSame($data,"full_name")."</h1>";
    echo "<span style='color:black'>Este jogador tem ".$resultado." minutos</span>";
    echo "</div>";
}
?>