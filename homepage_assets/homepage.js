document.addEventListener("DOMContentLoaded", function() {
    const login_button = document.getElementsByClassName('login-btn')[0];
    const guest_paragraph  = document.getElementById('guest_paragraph');
    const guest_links = document.getElementById('solo_ospiti');
    const sezione_riservata = document.getElementById('riservata');
    const allCards = document.querySelectorAll('.home-card');

    if (login_button.id == "logged") {
        guest_paragraph.style.display = "none";
        guest_links.style.display = "none";
        sezione_riservata.style.display = "block";

    }
});