// Código para abrir e fechar o menu
document.getElementById("menu-toggle").addEventListener("click", function() {
    const menu = document.getElementById("me");
    if (menu.style.display === "block") {
        menu.style.display = "none"; 
    } else {
        menu.style.display = "block"; 
    }
});