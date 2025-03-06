<?php require_once MEU_PLUGIN_DIR . 'includes/api/api-league-matches.php'; ?>

<div id='games-container' class='games-container'></div>
<script>
    const pageSize = 9;
    var gamesData = <?php echo json_encode(json_decode($redis->get('mleagues'), true)); ?>;
</script>
<ul class="pagination">
    <li id="prev" class="disabled"><a href="#">«</a></li>
    <li class="page"><a href="#">1</a></li>
    <li class="page"><a href="#">2</a></li>
    <li class="page"><a href="#">3</a></li>
    <li class="page active"><a href="#">4</a></li>
    <li class="page"><a href="#">5</a></li>
    <li class="page"><a href="#">6</a></li>
    <li id="next"><a href="#">»</a></li>
</ul>
</br>