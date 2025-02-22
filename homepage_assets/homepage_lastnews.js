function caricaNews() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'news.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            if (data.length > 0) {
                var latestNews = data[0]; // Assuming the latest news is the first item in the array
                var newsHtml = `
                    <article>
                        <img src="${latestNews.immagine}" alt="${latestNews.titolo}">
                        <section class="descrizione-articolo">
                            <h2>${latestNews.titolo}</h2>
                            <p>${latestNews.descrizione}</p>
                            <p><small>Pubblicato il: ${new Date(latestNews.data_pubblicazione).toLocaleDateString()}</small></p>
                            <h3>Per saperne di più, vai alla sezione News cliccando qui sotto!</h3>
                            <!-- News Card -->
                            <div class="home-links">
                            <div class="home-card">
                                <div class="card-icon"><i class="fa-solid fa-newspaper"></i></div>
                                <div class="card-title">News</div>
                                <div class="card-preview">
                                    Ultime notizie,<br>
                                    Photo Gallery e Video.
                                </div>
                                <a href="news_new.php" class="card-link">Vai a News</a>
                            </div>
                            </div>
                        </section>
                    </article>
                `;
                document.querySelector('.news-articles').innerHTML = newsHtml;
            }
        }
    };
    xhr.send();
}

document.addEventListener('DOMContentLoaded', function() {
    caricaNews();
});