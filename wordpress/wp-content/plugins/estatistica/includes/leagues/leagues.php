<?php
echo "</br>";
foreach (json_decode($redis->get('leagues'), true) as $dadoplayer) {
    echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 70px; background-color: white; border-radius: 20px; width: 500px; margin: 20px auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);'>";

    
    
    $id=null;
    foreach($dadoplayer['season'] as $season){
        $id=$season['id'];
    }
    echo "<a href='?id=".$id."'><img src='".$dadoplayer['image']."'style='width: 100px;'></br></h1></a>";
    echo "</div>";
}

