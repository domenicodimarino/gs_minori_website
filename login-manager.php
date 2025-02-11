<html>
<head>
	<title>Gestione Login</title>
</head>
<body>
	<?php


		if($_POST['username'] || $_POST['password']){
			$user =  $_POST['username'];
			$pass =  $_POST['password'];
			//chiama la funzione get_pwd che controlla
			//se username esiste nel DB. Se esiste, restituisce la password (hash), altrimenti restituisce false.
			$hash = get_pwd($user,$db);
			if(!$hash){
				echo "<p> L'utente $user non esiste. <a href=\"login.html\">Riprova</a></p>";
			}
			else{
				if(password_verify($pass, $hash)){
					echo "<p>Login Eseguito con successo</p>";
					//Se il login è corretto, inizializziamo la sessione
					session_start();
					$_SESSION['username']=$user;
					echo "<p><a href=\"reserved.php\">Accedi</a> al contenuto riservato solo agli utenti registrati<p>";
				}
				else{
					echo 'Username o password errati. <a href="login.html">Riprova</a>';
				}
			}
		}
		else{
			echo "<p>ERRORE: username o password non inseriti <a href=\"login.html\">Riprova</a></p>";
			exit();
		}
	?>
</body>
</html>

<?php
function get_pwd($user, $db){
		require 'db.php';
		$sql = "SELECT password FROM account WHERE username=$1;";
		$prep = pg_prepare($db, "sqlPassword", $sql);
		$ret = pg_execute($db, "sqlPassword", array($user));
		if(!$ret) {
			echo "ERRORE QUERY: " . pg_last_error($db);
			return false;
		}
		else{
			if ($row = pg_fetch_assoc($ret)){
				$pass = $row['password'];
				return $pass;
			}
			else{
				return false;
			}
   	}
		pg_close($db);
}
?>
