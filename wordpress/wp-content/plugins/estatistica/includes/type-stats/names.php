<?php
function verNames($data)
{
    echo "<a href='?name=".isTheSame($data,"full_name")."' style='color:white;'>".isTheSame($data,"full_name")."</a></br>";
}
?>