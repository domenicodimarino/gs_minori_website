document.addEventListener("DOMContentLoaded", function () {
    let slideIndexes = {}; // Indice per ogni slideshow

    document.querySelectorAll(".slideshow-container").forEach((slideshow, index) => {
        slideshow.dataset.index = index; // Aggiunge un data-index unico
        slideIndexes[index] = 1; // Inizializza indice

        let slides = slideshow.querySelectorAll(".mySlides");
        let dots = slideshow.querySelectorAll(".dot");

        showSlides(1, index);

        slideshow.querySelector(".prev").addEventListener("click", () => plusSlides(-1, index));
        slideshow.querySelector(".next").addEventListener("click", () => plusSlides(1, index));

        dots.forEach((dot, i) => {
            dot.addEventListener("click", () => currentSlide(i + 1, index));
        });
    });

    function plusSlides(n, slideshowIndex) {
        showSlides(slideIndexes[slideshowIndex] += n, slideshowIndex);
    }

    function currentSlide(n, slideshowIndex) {
        showSlides(slideIndexes[slideshowIndex] = n, slideshowIndex);
    }

    function showSlides(n, slideshowIndex) {
        let slides = document.querySelectorAll(".slideshow-container")[slideshowIndex].querySelectorAll(".mySlides");
        let dots = document.querySelectorAll(".slideshow-container")[slideshowIndex].querySelectorAll(".dot");

        if (n > slides.length) slideIndexes[slideshowIndex] = 1;
        if (n < 1) slideIndexes[slideshowIndex] = slides.length;

        slides.forEach(slide => slide.style.display = "none");
        dots.forEach(dot => dot.classList.remove("active"));

        slides[slideIndexes[slideshowIndex] - 1].style.display = "block";
        dots[slideIndexes[slideshowIndex] - 1].classList.add("active");
    }
});
