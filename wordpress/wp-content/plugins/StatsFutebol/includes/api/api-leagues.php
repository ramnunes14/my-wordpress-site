<?php
$apiUrlleague = "https://api.football-data-api.com/league-list?key=test85g57";
$league = curl_init();
curl_setopt($league, CURLOPT_URL, $apiUrlleague);
curl_setopt($league, CURLOPT_RETURNTRANSFER, true);
$responde_league = curl_exec($league);

if (curl_errno($league)) 
{
    echo 'Erro na requisição: ' . curl_error($league);
    exit;
}

curl_close($league);

$data_league = json_decode($responde_league, true);
$redis->set('leagues', json_encode($data_league['data']));

?>