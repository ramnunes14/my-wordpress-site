<?php require_once MEU_PLUGIN_DIR . 'includes/api/api-live.php'; ?>

<div class='games-container'>

<?php 
if(json_decode($redis->get('games'), true)==null){
?>
        <h2>Sem Jogos em Direto Hoje!</h2>
<?php
}
else{
foreach (json_decode($redis->get('games'), true) as $dadoplayer) { 
    
    $home_name = "";
    $away_name = "";
    $home_image = "";
    $away_image = "";
    $team1 = "";
    $x = "";
    $team2 = "";

    
    foreach ($dadoplayer as $chave => $player) {
        if ($chave == 'home_name') { 
            $home_name = $player; 
        }
        
        if ($chave == 'home_image'){ 
            $home_image= "https://cdn.footystats.org/img/$player"; 
            }

        if ($chave == 'away_name') {
            $away_name = $player;
        }

        if ($chave == 'away_image') {
            $away_image = "https://cdn.footystats.org/img/$player";
        }

        if ($chave == 'odds_ft_1') {
            $team1 = $player;
        }

        if ($chave == 'odds_ft_x') {
            $x = $player;
        }

        if ($chave == 'odds_ft_2') {
            $team2 = $player;
        }
    }
?>

    <div class='game-container'>
        <div class='home-name'><?php echo $home_name; ?></div>
        <div class='match-info'>
            <img class='team-logo' src='<?php echo $home_image; ?>' alt='Home Team Logo'>
            <span>VS</span>
            <img class='team-logo' src='<?php echo $away_image; ?>' alt='Away Team Logo'>
        </div>
        <div class='away-name'><?php echo $away_name; ?></div>
        <br>
        <div class='betting-odds'>
            <p>PROBABILIDADE DE APOSTA</p>
            <p>
                <?php 
                    echo number_format(((1/$team1)*100), 2, ',', '') . "% | " . 
                         number_format(((1/$x)*100), 2, ',', '') . "% | " . 
                         number_format(((1/$team2)*100), 2, ',', '') . "%";
                ?>
            </p>
        </div>
    </div>

<?php }} ?>

</div>
