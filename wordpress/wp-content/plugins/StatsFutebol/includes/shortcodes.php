<?php
//Macthes
function matches_shortcode()       { require_once MEU_PLUGIN_DIR . 'includes/matches/matches.php';}
add_shortcode('matches', 'matches_shortcode');

//Pagina Inicial
function paginainicial_shortcode() { require_once MEU_PLUGIN_DIR . 'includes/front-page/front-page.php';}
add_shortcode('paginainicial', 'paginainicial_shortcode');

//Live
function live_shortcode()          { require_once MEU_PLUGIN_DIR . 'includes/live/live.php';}
add_shortcode('live', 'live_shortcode');

//Likes
function likes_shortcode()         { require_once MEU_PLUGIN_DIR . 'includes/likes/likes.php';}
add_shortcode('likes', 'likes_shortcode');

//Players
function players_shortcode()         { require_once MEU_PLUGIN_DIR . 'includes/players/players.php';}
add_shortcode('players', 'players_shortcode');

//Goals
function goals_shortcode()         { 
    require_once MEU_PLUGIN_DIR . 'includes/players/functions.php';
    wp_footer();
    echo "<div class='corr'>";
    echo "<div class='container'>";
    player(json_decode($redis->get('players'), true), "goals");
    echo "</div>";
    echo "</div>";
}
add_shortcode('goals', 'goals_shortcode');

//Assists
function assists_shortcode()         { 
    require_once MEU_PLUGIN_DIR . 'includes/players/functions.php';
    wp_footer();
    echo "<div class='corr'>";
    echo "<div class='container'>";
    player(json_decode($redis->get('players'), true), "assists");
    echo "</div>";
    echo "</div>";
}
add_shortcode('assists', 'assists_shortcode');

//Minutes
function minutes_shortcode()         { 
    require_once MEU_PLUGIN_DIR . 'includes/players/functions.php';
    wp_footer();
    echo "<div class='corr'>";
    echo "<div class='container'>";
    player(json_decode($redis->get('players'), true), "minutes");
    echo "</div>";
    echo "</div>";
}
add_shortcode('minutes', 'minutes_shortcode');

//Cards
function cards_shortcode()         { 
    require_once MEU_PLUGIN_DIR . 'includes/players/functions.php';
    wp_footer();
    echo "<div class='corr'>";
    echo "<div class='container'>";
    player(json_decode($redis->get('players'), true), "cards");
    echo "</div>";
    echo "</div>";
}
add_shortcode('cards', 'cards_shortcode');

//Ranking
function ranking_shortcode()         { 
    require_once MEU_PLUGIN_DIR . 'includes/players/functions.php';
    wp_footer();
    echo "<div class='corr'>";
    echo "<div class='container'>";
    player(json_decode($redis->get('players'), true), "rank");
    echo "</div>";
    echo "</div>";
}
add_shortcode('ranking', 'ranking_shortcode');