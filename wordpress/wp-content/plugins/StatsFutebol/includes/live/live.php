<?php require_once MEU_PLUGIN_DIR . 'includes/api/api-live.php'; ?>

<div class='games-container'>

<?php 
if(json_decode($redis->get('games'), true)==null){
?>      <div class="no-games">
            <h2 class="text-ng">Sem Jogos em Direto Hoje!</h2>
            <h2 class="text-n">Pesquisar noutra data</h2>
            <form class="data-live" action="">
                <label>Data</label> 
                <input id="form-dat" type=date>
                <input id="btn-dat" type=submit>
            </form>
        </div>
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
            $home_name = verificarString($player); 
        }
        
        if ($chave == 'home_image'){ 
            $home_image= "https://cdn.footystats.org/img/$player"; 
            }

        if ($chave == 'away_name') {
            $away_name = verificarString($player);
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
        
        <div class='match-info'>
        <div class='home-name'><?php echo $home_name; ?></div>
            <img class='team-logo' src='<?php echo $home_image; ?>' alt='Home Team Logo'>
            <span><strong>VS</strong></span>
            <img class='team-logo' src='<?php echo $away_image; ?>' alt='Away Team Logo'>
            <div class='away-name'><?php echo $away_name; ?></div>
        </div>
        
        <br>
        <div class='bets'>
            <div class='betting-odds'>
                <p><strong>PROBABILIDADE DE APOSTA</strong></p>
                <p>
                    <?php 
                        echo number_format(((1/$team1)*100), 2, ',', '') . "% | " . 
                            number_format(((1/$x)*100), 2, ',', '') . "% | " . 
                            number_format(((1/$team2)*100), 2, ',', '') . "%";
                    ?>
                </p>
            </div>
            <div class='betting-houses'>
                    <img class="imag" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Logotype_Betclic.svg/1200px-Logotype_Betclic.svg.png" alt="Imagem de exemplo">
                    <img class="imag" src="https://static.oddsscanner.com/wp/sites/3/feature-image-Solverde.webp" alt="Imagem de exemplo">
                    <img class="imag" src="https://feelinglucky.pt/wp-content/uploads/2024/09/betano-logo.svg" alt="Imagem de exemplo">
            </div>
        </div>
    </div>

<?php }} ?>

</div>
