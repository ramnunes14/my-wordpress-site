<?php
wp_footer();
require_once "functions.php";
player(json_decode($redis->get('players'), true), $_POST['jogador']);

?>