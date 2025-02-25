

    document.getElementById("toggleBtn").addEventListener("click", function() {
        var menu = document.getElementById("menu-tab");
        console.log(menu);
        menu.style.display = (menu.style.display === "none" || menu.style.display === "") ? "block" : "none";
    });
    