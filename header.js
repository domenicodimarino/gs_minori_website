document.addEventListener('DOMContentLoaded', (event) => {
    const loginButton = document.querySelector('.login-btn');
    const dropdownMenu = document.getElementById('login_dropdown');

    if (loginButton && loginButton.id === 'logged') {
        dropdownMenu.style.display = 'block'; // Rendi visibile la lista ul
        loginButton.disabled = true; // Rendi il bottone non cliccabile
    }
});