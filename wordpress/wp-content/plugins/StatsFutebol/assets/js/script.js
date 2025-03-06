document.addEventListener("DOMContentLoaded", function () {
    let currentPage = 1;
    
    const totalPages = Math.ceil(gamesData.length / pageSize);
    const container = document.querySelector(".games-container");
    const prevBtn = document.getElementById("prev");
    const nextBtn = document.getElementById("next");
    const pageLinks = document.querySelectorAll(".page");

    function verificarString(str) {
        if (!str || str.length <= 10) {
            return str;
        }
    
        let palavras = str.split(" ");
        
        if (palavras.length >= 2) {
            let primeiraPalavra = palavras[0];
            let segundaParte = palavras.slice(1).join(" ");
            
            return `${primeiraPalavra}<br>${segundaParte}`;
        }
    
        return str;
    }
    

    function renderGames() {
        container.innerHTML = ""; 
        let start = (currentPage - 1) * pageSize;
        let end = start + pageSize;
        let gamesToShow = gamesData.slice(start, end);

        gamesToShow.forEach(game => {
            let home_name = verificarString(game.home_name);
            let away_name = verificarString(game.away_name);
            let home_image = game.home_image ? `https://cdn.footystats.org/img/${game.home_image}` : "default.png";
            let away_image = game.away_image ? `https://cdn.footystats.org/img/${game.away_image}` : "default.png";

            let team1 = game.odds_ft_1 || 0;
            let x = game.odds_ft_x || 0;
            let team2 = game.odds_ft_2 || 0;

            let prob1 = team1 > 0 ? (100 / team1).toFixed(2).replace(".", ",") + "%" : "N/A";
            let probX = x > 0 ? (100 / x).toFixed(2).replace(".", ",") + "%" : "N/A";
            let prob2 = team2 > 0 ? (100 / team2).toFixed(2).replace(".", ",") + "%" : "N/A";

            container.innerHTML += `
                <div class='game-container'>
                    <div class='match-info'>
                        <div class='home-name'>${home_name}</div>
                        <img class='team-logo' src='${home_image}' alt='Home Team Logo'>
                        <span><strong>VS</strong></span>
                        <img class='team-logo' src='${away_image}' alt='Away Team Logo'>
                        <div class='away-name'>${away_name}</div>
                    </div>
                    
                    <div class='bets'>
                        <div class='betting-odds'>
                            <p><strong>PROBABILIDADE DE APOSTA</strong></p>
                            <p>${prob1} | ${probX} | ${prob2}</p>
                        </div>
                        <div class='betting-houses'>
                            <img class="imag" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Logotype_Betclic.svg/1200px-Logotype_Betclic.svg.png" alt="Imagem de exemplo">
                            <img class="imag" src="https://static.oddsscanner.com/wp/sites/3/feature-image-Solverde.webp" alt="Imagem de exemplo">
                            <img class="imag" src="https://feelinglucky.pt/wp-content/uploads/2024/09/betano-logo.svg" alt="Imagem de exemplo">
                        </div>
                    </div>
                </div>
            `;
        });

        
        prevBtn.classList.toggle("disabled", currentPage === 1);
        nextBtn.classList.toggle("disabled", currentPage === totalPages);

        
        pageLinks.forEach((link, index) => {
            link.classList.toggle("active", index + 1 === currentPage);
        });
    }

    prevBtn.addEventListener("click", () => {
        if (currentPage > 1) {
            currentPage--;
            renderGames();
        }
    });

    nextBtn.addEventListener("click", () => {
        if (currentPage < totalPages) {
            currentPage++;
            renderGames();
        }
    });

    pageLinks.forEach((link, index) => {
        link.addEventListener("click", () => {
            currentPage = index + 1;
            renderGames();
        });
    });

    renderGames(); 
});

