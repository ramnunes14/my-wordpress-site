<?php
// Inicialize o cliente Redis
$redis = new Redis(); 

// Tente conectar ao Redis
if ($redis->connect('127.0.0.1', 6379)) {
    // Conexão bem-sucedida
    
} else {
    // Falhou ao conectar
    echo "Falha na conexão com o Redis!";
    exit;
}

// Agora, faça a requisição cURL para a API de futebol
$apiUrlgame = "https://api.football-data-api.com/todays-matches?key=test85g57";
$game = curl_init();
curl_setopt($game, CURLOPT_URL, $apiUrlgame);
curl_setopt($game, CURLOPT_RETURNTRANSFER, true);
$responde_game = curl_exec($game);

if (curl_errno($game)) {
    echo 'Erro na requisição: ' . curl_error($game);
    exit;
}

curl_close($game);

// Processa a resposta da API
$data_game = json_decode($responde_game, true);

// Verifique se a chave 'data' está presente na resposta antes de tentar salvar no Redis
if (isset($data_game['data'])) {
    $redis->set('games', json_encode($data_game['data']));
} else {
    echo 'Erro: Dados não encontrados na resposta da API.';
}
?>
