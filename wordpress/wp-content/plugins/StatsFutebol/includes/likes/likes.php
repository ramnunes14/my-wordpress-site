<?php
require_once MEU_PLUGIN_DIR . 'includes/api/api.php';

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
    echo "<h2 style='color:white'>LIKED PLAYERS</h2>";
    foreach ($liked_players as $like) {
        echo "<div class='like-div'>";
        echo "<span class='esc'>" . esc_html($like) . "</span></br>";
        echo "<a class='a-unlike'  href='?page_id=36&player=" . urlencode($like) . "&estado=unlike'>❤️UNLIKE</a></br>";
        echo "</div>";
    }
} else {
    echo "<h2 >No Liked Players</h2>";
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
