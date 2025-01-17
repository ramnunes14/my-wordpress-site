<?php
$apiUrlgame = "https://api.football-data-api.com/league-matches?key=example&season_id=2012";
$game = curl_init();
curl_setopt($game, CURLOPT_URL, $apiUrlgame);
curl_setopt($game, CURLOPT_RETURNTRANSFER, true);
$responde_game = curl_exec($game);

if (curl_errno($game)) 
{
    echo 'Erro na requisição: ' . curl_error($game);
    exit;
}

curl_close($game);

$data_game = json_decode($responde_game, true);
$_SESSION['games'] = $data_game['data'];

?>