<?php
function verNames($data)
{
    echo"<div class='cartao'>";
    echo "<a href='?name=".isTheSame($data,"full_name")."' style='color:black;'>".isTheSame($data,"full_name")."</a></br>";
    echo "</div>";
}
?>