<?php

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	/*
		In questa soluzione l'elemento $_SESSION["username"] è popolato
		con l'username dell'utente solo se l'autenticazione è avvenuta con successo
	*/

	if(isset($_SESSION["username"])){
		$user_name = $_SESSION["username"];
        echo "<script>const login_button = document.getElementsByClassName('login-btn')[0];
            login_button.id = 'logged';
			login_button.innerHTML = '<img src=\"photo/photo_header/user.png\" alt=\"userphoto\"> $user_name';
			login_button.removeAttribute('href');
			const dropdownMenus = document.querySelectorAll('.dropdown');
            const lastDropdownMenu = dropdownMenus[dropdownMenus.length - 1];
			lastDropdownMenu.id = 'logged';
            </script>
        ";
    }
?>