<?php

$redis = new Redis(); 


if ($redis->connect('127.0.0.1', 6379)) {
    
    
} 
else {
   
    echo "Falha na conexão com o Redis!<br>";
    exit;

}

$apiUrlmleague = "https://api.football-data-api.com/league-matches?key=test85g57&season_id=2012";


$mleague = curl_init();
curl_setopt($mleague, CURLOPT_URL, $apiUrlmleague);
curl_setopt($mleague, CURLOPT_RETURNTRANSFER, true);
$responde_mleague = curl_exec($mleague);


if (curl_errno($mleague)) {
    echo 'Erro na requisição: ' . curl_error($mleague);
    exit;
}


curl_close($mleague);


if (empty($responde_mleague)) {
    echo 'Erro: A resposta da API está vazia.<br>';
    exit;
}

$data_mleague = json_decode($responde_mleague, true);


if (isset($data_mleague['data'])) {
    
    $redis->set('mleagues', json_encode($data_mleague['data']));
    
} 
else {
    echo 'Erro: A chave "data" não foi encontrada na resposta da API.<br>';
    exit;
}
?>
