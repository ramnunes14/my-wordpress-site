<?php
function verGoals($data)
{
    
    echo"<div class='cartao'>";

    if(isTheSame($data,"goals_overall","key")>0)
    {
        $resultado_home=(isTheSame($data,"goals_home")/isTheSame($data,"goals_overall"))*100;
        $resultado_home=(90*$resultado_home)/isTheSame($data,"minutes_played_overall");
        $resultado_away=(isTheSame($data,"goals_away")/isTheSame($data,"goals_overall"))*100;
        $resultado_away=(90*$resultado_away)/isTheSame($data,"minutes_played_overall");
    }

    else
    {
        $resultado_home=0;
        $resultado_away=0;
    }

    if($resultado_away>5 || $resultado_home>5)
    {
        echo "<h1 style='color:green;'>".isTheSame($data,"full_name")." <span style='color:black;'>(Best Bet)🟢</span></h1>";
    }

    else if($resultado_away>2 ||$resultado_home>2)
    {
        echo "<h1 style='color:orange;'>".isTheSame($data,"full_name")." <span style='color:black;'>(Careful Bet)🟡</span></h1>";
    }
    
    else
    {
        echo "<h1 style='color:red;'>".isTheSame($data,"full_name")." <span style='color:black;'>(Dangerous Bet)🔴</span></h1>";
    }
    echo "<span style='color:black'>Por jogo a probabilidade de ele marcar golo em casa é de ".$resultado_home."%</span></br>";
    echo "<span style='color:black'>Por jogo a probabilidade de ele marcar golo fora de casa é de ".$resultado_away."%</span>";
    echo "</div>";
    
}
?>