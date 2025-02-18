<?php 

// Inicializando a conexão com o Redis
$redis = new Redis();
if (!$redis->connect('127.0.0.1', 6379)) {
    echo "Falha na conexão com o Redis!";
    exit;
}

// Definindo a URL da API
$apiUrl = "https://api.football-data-api.com/league-players?key=example&season_id=2012&include=stats";

// Inicializando cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Executando a requisição
$response = curl_exec($ch);

// Verificando erros na requisição cURL
if (curl_errno($ch)) {
    echo 'Erro na requisição: ' . curl_error($ch);
    exit;
}

// Fechando a conexão cURL
curl_close($ch);

// Decodificando a resposta JSON
$data = json_decode($response, true);

// Verificando se a chave 'data' existe na resposta
if (isset($data['data'])) {
    // Armazenando os dados dos jogadores no Redis
    $redis->set('players', json_encode($data['data']));
} else {
    echo "Erro: Dados não encontrados na resposta da API.";
}

?>
