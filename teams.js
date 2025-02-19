document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-link1');
    const sections = document.querySelectorAll('.section');
    const teamImage = document.querySelector('.team-image');
    const rosterTitle = document.querySelector('.roster-title');

    // Salva la posizione di scroll corrente e l'ID della sezione attiva quando si clicca su un link
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function() {
            localStorage.setItem('previousScrollPosition', window.scrollY);
            const activeSection = document.querySelector('.section:not([style*="display: none"])');
            if (activeSection) {
                localStorage.setItem('activeSectionId', activeSection.id);
            } else {
                localStorage.setItem('activeSectionId', 'all-section');
            }
        });
    });

    // Ripristina la posizione di scroll e la sezione attiva se presenti
    const previousScrollPosition = localStorage.getItem('previousScrollPosition');
    const activeSectionId = localStorage.getItem('activeSectionId');
    if (previousScrollPosition) {
        window.scrollTo(0, parseInt(previousScrollPosition));
        localStorage.removeItem('previousScrollPosition');
    }
    if (activeSectionId) {
        if (activeSectionId === 'all-section') {
            sections.forEach(section => {
                section.style.display = 'block';
            });
            teamImage.style.display = 'block';
            rosterTitle.style.display = 'block';
            document.querySelector('.nav-link1[data-target="all-section"]').classList.add('active');
        } else {
            sections.forEach(section => {
                if (section.id === activeSectionId) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
            teamImage.style.display = 'none';
            rosterTitle.style.display = 'none';
            document.querySelector(`.nav-link1[data-target="${activeSectionId}"]`).classList.add('active');
        }
        localStorage.removeItem('activeSectionId');
    } else {
        sections.forEach(section => {
            section.style.display = 'block';
        });
        teamImage.style.display = 'block';
        rosterTitle.style.display = 'block';
        document.querySelector('.nav-link1[data-target="all-section"]').classList.add('active');
    }

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
});