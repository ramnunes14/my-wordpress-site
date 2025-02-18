<?php
require_once MEU_PLUGIN_DIR . 'includes/api/api.php';

$current_user_id = get_current_user_id(); 
$liked_players = get_user_meta($current_user_id, 'liked_players', true);
if (!is_array($liked_players)) {
    $liked_players = [];
}

// Verifica o estado do like/unlike
if (isset($_GET['estado']) && in_array($_GET['estado'], ['like', 'unlike'])) {
    if (isset($_GET['player'])) {
        $player = sanitize_text_field($_GET['player']);

        if ($_GET['estado'] == 'like') {
            if (verificapl() && verifico(json_decode($redis->get('players')), $player)) {
                if (!in_array($player, $liked_players)) {
                    $liked_players[] = $player;
                    update_user_meta($current_user_id, 'liked_players', $liked_players);
                }
            }
            
        } elseif ($_GET['estado'] == 'unlike') {
            
            $key = array_search($player, $liked_players);
            if ($key !== false) {
                unset($liked_players[$key]);
                $liked_players = array_values($liked_players); 
                update_user_meta($current_user_id, 'liked_players', $liked_players);
            }
        }
    }
}
$current_user_id = get_current_user_id(); 
$liked_players = get_user_meta($current_user_id, 'liked_players', true);
if (!is_array($liked_players)) {
    $liked_players = [];
}
// Exibe os jogadores curtidos
if (!empty($liked_players)) {
    echo "<h2 style='color:white'>LIKED PLAYERS</h2>";
    foreach ($liked_players as $like) {
        echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 70px; background-color: white; border-radius: 20px; width: 500px; margin: 20px auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);'>";
        echo "<span style='color:black;'>" . esc_html($like) . "</span></br>";
        echo "<a style='color:red;' href='?page_id=36&player=" . urlencode($like) . "&estado=unlike'>❤️UNLIKE</a></br>";
        echo "</div>";
    }
} else {
    echo "<h2 style='color:white'>NO LIKED PLAYERS</h2>";
}
// Função para verificar se o player foi já curtido na sessão
function verificapl() {
    if (isset($_SESSION['likes'])) {
        foreach ($_SESSION['likes'] as $likes) {
            if ($likes == $_GET['player']) {
                return false;
            }
        }
    }
    return true;
}

// Função para verificar se o jogador existe nos dados da API
function verifico($data, $key) {
    foreach ($data as $dadoplayer) {
        foreach ($dadoplayer as $d) {
            if ($d == $key) {
                return true;
            }
        }
    }
    return false;
}
?>
