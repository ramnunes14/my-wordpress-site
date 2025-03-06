
document.getElementById("toggleBtn").addEventListener("click", function(event) {
    var menu = document.getElementById("menu-tab");
    menu.style.display = (menu.style.display === "none" || menu.style.display === "") ? "block" : "none";
    event.stopPropagation();
});


document.addEventListener("click", function(event) {
    var menu = document.getElementById("menu-tab");
    var toggleBtn = document.getElementById("toggleBtn");
    if (menu.style.display === "block" && !menu.contains(event.target) && event.target !== toggleBtn) {
        menu.style.display = "none";
    }
});

    document.addEventListener("DOMContentLoaded", function () {
        const pages = document.querySelectorAll(".page");
        const prevButton = document.getElementById("prev");
        const nextButton = document.getElementById("next");

        function updatePagination(index) {
            pages.forEach((page, i) => {
                page.classList.toggle("active", i === index);
            });

            
            prevButton.classList.toggle("disabled", index === 0);
            nextButton.classList.toggle("disabled", index === pages.length - 1);
        }

        pages.forEach((page, index) => {
            page.addEventListener("click", () => {
                updatePagination(index);
            });
        });

        prevButton.addEventListener("click", () => {
            const activeIndex = [...pages].findIndex(page => page.classList.contains("active"));
            if (activeIndex > 0) {
                updatePagination(activeIndex - 1);
            }
        });

        nextButton.addEventListener("click", () => {
            const activeIndex = [...pages].findIndex(page => page.classList.contains("active"));
            if (activeIndex < pages.length - 1) {
                updatePagination(activeIndex + 1);
            }
        });
    });