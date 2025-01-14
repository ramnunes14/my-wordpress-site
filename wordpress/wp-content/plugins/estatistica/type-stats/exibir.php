<?php

function ver($data){
    
    $nacionalidades=getNac();
    $bandeira_url = "https://flagcdn.com/w320/" . $nacionalidades[isTheSame($data,"nationality")] . ".png";
    $cara_url= "https://cdn.footystats.org/img/players/".strtolower(isTheSame($data,"nationality"))."-".isTheSame($data,"shorthand").".png";
    if (filter_var($cara_url, FILTER_VALIDATE_URL)) 
    {
        echo "<pre style='background-color:white;padding:20px;border-radius:30px;'>";
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
        foreach($_SESSION['likes'] as $like){
            if(isTheSame($data,"full_name")==$like){
                $tem_like=true;
            }
        }

        if($tem_like){
            echo "<a style='color:red;' href='?player=".isTheSame($data,"full_name")."& estado=unlike'>❤️UNLIKE</br></a>";
        }
        else{
            echo "<a style='color:red;' href='?player=".isTheSame($data,"full_name")."& estado=like'>❤️LIKE</br></a>";
        }
        
        

        echo "</pre>";
        echo "</br>";
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