<?php
echo "</br>";
foreach ($_SESSION['games'] as $dadoplayer) {
    echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 70px; background-color: white; border-radius: 20px; width: 500px; margin: 20px auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);'>";

    $home_name = "";
    $away_name = "";
    $home_image = "";
    $away_image = "";

    foreach ($dadoplayer as $chave => $player) {
        
        if ($chave == 'home_name') {
            $player=resolve_nome($player);
            $home_name = "<div style='font-weight: bold; font-size: 18px;position:absolute;left:520px;text-align:left;word-wrap: break-word;'>$player</div>";
        }
        
        if ($chave == 'home_image') {
            
            $home_image = "<img src='https://cdn.footystats.org/img/$player' alt='Home Team Logo' style='width: 50px; height: auto; margin: 10px;'>";
        }

        if ($chave == 'away_name') {
            $player=resolve_nome($player);
            $away_name = "<div style='font-weight: bold; font-size: 18px;position:absolute;left:870px;text-align:right;'>$player</div>";
        }

        if ($chave == 'away_image') {
            $away_image = "<img src='https://cdn.footystats.org/img/$player' alt='Away Team Logo' style='width: 50px; height: auto; margin: 10px;'>";
        }
        if ($chave == 'odds_ft_1') {
            $team1=$player;
            
        }
        if ($chave == 'odds_ft_x') {
            $x=$player;
            
        }
        if ($chave == 'odds_ft_2') {
            $team2=$player;
            
        }
    }

    // Exibir a equipa da casa (Nome e Imagem) e equipa visitante corretamente
    echo $home_name;
    echo "<div style='display: flex; justify-content: center; align-items: center; gap: 20px;'>$home_image  VS $away_image</div>";
    echo $away_name;
    echo "</br>";
    echo "PROBABILIDADE DE APOSTA";
    echo "</br>";
    echo number_format(((1/$team1)*100),2,',','')."% | ".number_format(((1/$x)*100),2,',','')."% | ".number_format(((1/$team2)*100),2,',','')."%";
    echo "</div>"; // Fecha game-container
}

function resolve_nome($player){

    if($player=='Brighton & Hove Albion'){
        return 'Brigthon';
    }
    if($player=='Wolverhampton Wanderers'){
        return 'Wolves';
    }
    return $player;
}