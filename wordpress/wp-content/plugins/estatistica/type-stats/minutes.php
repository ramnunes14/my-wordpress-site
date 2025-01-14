<?php
function verMinutes($data)
{
    $resultado=isTheSame($data,"minutes_played_overall");
    echo "<h1 style='color:white;'>".isTheSame($data,"full_name")."</h1>";
    echo "<span style='color:white'>Este jogador tem ".$resultado." minutos</span></br>";
}
?>