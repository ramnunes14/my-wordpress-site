<?php 
$apiUrl = "https://api.football-data-api.com/league-players?key=example&season_id=2012&include=stats";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) 
{
    echo 'Erro na requisição: ' . curl_error($ch);
    exit;
}

curl_close($ch);

$data = json_decode($response, true);
$data = $data['data'];
?>