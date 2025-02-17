document.addEventListener("DOMContentLoaded", function() {
    const login_button = document.getElementsByClassName('login-btn')[0];
    const guest_paragraph  = document.getElementById('guest_paragraph');
    const guest_links = document.getElementById('solo_ospiti');
    const allCards = document.querySelectorAll('.home-card');
    const fanCardLogged = allCards[allCards.length - 2];

    if (login_button.id == "logged") {
        fanCardLogged.style.display = "flex";
        guest_paragraph.style.display = "none";
        guest_links.style.display = "none";

    }
});