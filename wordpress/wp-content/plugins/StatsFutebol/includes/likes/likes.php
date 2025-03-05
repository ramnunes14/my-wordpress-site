<article class="article-front">
<?php
require_once MEU_PLUGIN_DIR . 'includes/api/api.php';
require_once MEU_PLUGIN_DIR . 'includes/players/functions.php';

$current_user_id = get_current_user_id(); 
$liked_players = get_user_meta($current_user_id, 'liked_players', true);
if (!is_array($liked_players)) {
    $liked_players = [];
}


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

if (!empty($liked_players)) {
    echo "<h2 style='color:white'>LIKED PLAYERS</h2></br>";
    echo "<div class='container'>";
    foreach ($liked_players as $like) {
        
        player(json_decode($redis->get('players'), true), esc_html($like));
        
        
    }
    echo "</div>";
} else {
    echo "<h2 class='no-like'>No Liked Players</h2>";
}

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
</article>