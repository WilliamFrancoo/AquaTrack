document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".menu-toggle").forEach(botao => {
        botao.addEventListener("click", () => {
            document.querySelector(".sidebar")?.classList.toggle("aberta");
        });
    });
});
