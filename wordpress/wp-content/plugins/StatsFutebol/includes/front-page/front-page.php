
<article class="article-front">
<div class="flex-div">
<div class="form-container">
        <form action="#" method="POST">
            <label for="input-field">Buscar Jogador por nome :</label>
            <input type="hidden" id="input-field" name="name" value='ola'>
            <input type="text" id="input-field" name="jogador"  placeholder="Nome do Jogador" required>
            <button type="submit" class="pes">Pesquisar</button>
        </form>
        <div class="tipos">
            <form action="#" method="POST">
                <input type="hidden"  name="page_id" value='72'>
                <button type="submit" class="botao-post">Goals</button>
            </form>
            <form action="#" method="POST">
                <input type="hidden"  name="page_id" value='74'>
                <button type="submit" class="botao-post">Assistencias</button>
            </form>
            <form action="#" method="POST">
                <input type="hidden"  name="page_id" value='78'>
                <button type="submit" class="botao-post">Cartões</button>
            </form>
            <form action="#" method="POST">
                <input type="hidden"  name="page_id" value='80'>
                <button type="submit" class="botao-post">Minutos</button>
            </form>
            <form action="#" method="POST">
                <input type="hidden"  name="p" value='42'>
                <button type="submit" class="botao-post">Nomes</button>
            </form>
            <form action="#" method="POST">
                <input type="hidden"  name="page_id" value='76'>
                <button type="submit" class="botao-post">Rank</button>
            </form>
        </div>
</div>

<?php require "news-front-page.php" ?>
<?php require_once MEU_PLUGIN_DIR . 'includes/api/api-league-matches.php'; ?>
<div class="jogos">
    <h1 id="text-titl">Jogos Hoje🔴
    </h1></br>
    <div id='games-container' class='games-container'></div>
    <script>
        const pageSize = 8;
        var gamesData = <?php echo json_encode(json_decode($redis->get('mleagues'), true)); ?>;
    </script>
    </br>
    </br>
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
</div>
</div>
</article>