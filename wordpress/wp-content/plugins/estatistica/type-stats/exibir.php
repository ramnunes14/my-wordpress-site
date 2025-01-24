<?php

function ver($data){
    
    $nacionalidades=getNac();
    $bandeira_url = "https://flagcdn.com/w320/" . $nacionalidades[isTheSame($data,"nationality")] . ".png";
    $cara_url= "https://cdn.footystats.org/img/players/".strtolower(isTheSame($data,"nationality"))."-".isTheSame($data,"shorthand").".png";
    if (filter_var($cara_url, FILTER_VALIDATE_URL)) 
    {
        echo "<div style='align-items: center; justify-content: center; padding: 20px; background-color: white; border-radius: 20px; width: 500px; margin: 20px auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);'>";
        echo "<img src='".$cara_url."'style='width: 100px;'></br></h1>";
        echo "<h1>".isTheSame($data,"full_name")." ";
        echo "<img src='".$bandeira_url."'style='width: 50px;position:absolute;'></br></h1>";
        echo "<span style='color:red'>".isTheSame($data,"position")."</br></span>";
        echo "<span style='color:red'>".isTheSame($data,"nationality")."</br></span>";
        echo "<span style='color:red'>".isTheSame($data,"minutes_played_overall")."min played</br></span>";
        echo "<span style='color:red'>".isTheSame($data,"goals_overall")." goals in ".isTheSame($data,"season")."</br></span>";
        echo "<span style='color:red'>".isTheSame($data,"yellow_cards_overall")." yellow cards</br></span>";
        echo "<a style='color:blue;' href='".isTheSame($data,"url")."'>More Info</br></a>";
        $tem_like=false;
        $current_user_id = get_current_user_id(); 
        
        if (!$current_user_id) {
            die("<h2 style='color:white'>Usuário não autenticado.</h2>");
        }
        $liked_players = get_user_meta($current_user_id, 'liked_players', true);
        
        
        if (!is_array($liked_players)) {
            $liked_players = [];
            
        }

        
        $player_name = isTheSame($data, "full_name");
        $tem_like = in_array($player_name, $liked_players);

        if($tem_like){
            echo "<a id='unlike' style='color:red;' href='?player=".isTheSame($data,"full_name")."& estado=unlike'>❤️UNLIKE</br></a>";
        }
        else{
            echo "<a id='like' style='color:red;' href='?player=".isTheSame($data,"full_name")."& estado=like'>❤️LIKE</br></a>";
        }
        
        

        echo "</div>";
        
        if(isTheSame($data,"full_name")!=null)
        {
            return true;
        }
    } 
    else 
    {
        
    }
    
}
?>