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
