document.addEventListener('DOMContentLoaded', function() {
    var usernameInput = document.getElementById('username');
    var submitBtn = document.getElementById('submitBtn');

    // Controllo iniziale per abilitare/disabilitare il pulsante di invio
    if (usernameInput.value.length >= 3) {
        submitBtn.disabled = false;
    } else {
        submitBtn.disabled = true;
    }

    // Listener per l'input del campo username
    usernameInput.addEventListener('input', function() {
        var username = this.value;
        if (username.length >= 3) {
            submitBtn.disabled = false;
        } else {
            submitBtn.disabled = true;
        }
    });

    document.getElementById('postForm').addEventListener('submit', function(event) {
        var username = document.getElementById('username').value;
        if (username.length < 3) {
            event.preventDefault();
            alert('Inserire nome utente');
        }
    });

    var dropZone = document.getElementById('dropZone');
    var imageInput = document.getElementById('image');

    dropZone.addEventListener('dragover', function(event) {
        event.preventDefault();
        dropZone.style.backgroundColor = '#e0e0e0';
    });

    dropZone.addEventListener('dragleave', function(event) {
        event.preventDefault();
        dropZone.style.backgroundColor = '#ffffff';
    });

    dropZone.addEventListener('drop', function(event) {
        event.preventDefault();
        dropZone.style.backgroundColor = '#ffffff';
        var files = event.dataTransfer.files;
        if (files.length > 0) {
            imageInput.files = files;
        }
    });
});