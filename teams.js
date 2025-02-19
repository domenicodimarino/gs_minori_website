document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-link1');
    const sections = document.querySelectorAll('.section');
    const teamImage = document.querySelector('.team-image');
    const rosterTitle = document.querySelector('.roster-title');

    navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetId = this.getAttribute('data-target');
            navLinks.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
            if (targetId === 'all-section') {
                sections.forEach(section => {
                    section.style.display = 'block';
                });
                teamImage.style.display = 'block';
                rosterTitle.style.display = 'block';
            } else {
                sections.forEach(section => {
                    if (section.id === targetId) {
                        section.style.display = 'block';
                    } else {
                        section.style.display = 'none';
                    }
                });
                teamImage.style.display = 'none';
                rosterTitle.style.display = 'none';
            }
        });
    });

    // Show the "TUTTI" section by default
    sections.forEach(section => {
        section.style.display = 'block';
    });
    teamImage.style.display = 'block';
    rosterTitle.style.display = 'block';
    document.querySelector('.nav-link1[data-target="all-section"]').classList.add('active');
});