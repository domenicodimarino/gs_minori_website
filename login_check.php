<?php
    session_start();
	/*
		In questa soluzione l'elemento $_SESSION["username"] è popolato
		con l'username dell'utente solo se l'autenticazione è avvenuta con successo
	*/

	if(!isset($_SESSION["username"])){
		echo "echo prova per utenti non loggati";
	}
	else{
		$user = $_SESSION["username"];
		echo "<p> Benvenuto $user!</p>";
        echo "<script>const login_button = document.getElementsByClassName('login-btn')[0];
            login_button.id = 'logged';
			const dropdownMenus = document.querySelectorAll('.dropdown');
            const lastDropdownMenu = dropdownMenus[dropdownMenus.length - 1];
			lastDropdownMenu.id = 'logged';
            </script>
        ";
    }
?>