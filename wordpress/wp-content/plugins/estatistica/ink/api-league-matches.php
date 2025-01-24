<?php
if(isset($_GET['id'])){
    $apiUrlmleague = "https://api.football-data-api.com/league-matches?key=test85g57&season_id=".$_GET['id'];
    $mleague = curl_init();
    curl_setopt($mleague, CURLOPT_URL, $apiUrlmleague);
    curl_setopt($mleague, CURLOPT_RETURNTRANSFER, true);
    $responde_mleague = curl_exec($mleague);

    if (curl_errno($mleague)) 
    {
        echo 'Erro na requisição: ' . curl_error($mleague);
        exit;
    }

    curl_close($mleague);

    $data_mleague = json_decode($responde_mleague, true);
    $redis->set('mleagues', json_encode($data_mleague['data']));
}
?>