//! bottone up
    // Mostra il bottone "up" quando ci si sposta verso il basso
    window.onscroll = function() {
        const button = document.getElementById('scrollToTop');
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
    };

    // Scorri verso l'alto quando il bottone viene cliccato
    document.getElementById('scrollToTop').addEventListener('click', function(event) {
        event.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });  