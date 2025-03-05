<?php
wp_footer();
require_once "functions.php";
echo "<div class='corr'>";
echo "<div class='container'>";
player(json_decode($redis->get('players'), true), $_POST['jogador'] ?? $_GET['jogador']);
echo "</div>";
echo "</div>";

?>