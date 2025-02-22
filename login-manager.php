<html>
<head>
	<title>Gestione Login</title>
</head>
<body>
	<?php

require './db.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST['username']) && isset($_POST['password'])){
			$user =  $_POST['username'];
			$pass =  $_POST['password'];
			$hash = get_pwd($user,$db);
			if(!$hash){
				echo  "<script>alert('Utente non presente nel database');
					window.location.href = 'login.php';
					</script>";
			}
			else{
				if(password_verify($pass, $hash)){
					echo "<p>Login Eseguito con successo</p>";
					//Se il login è corretto, inizializziamo la sessione
					session_start();
					$_SESSION['username'] = $user;
					$_SESSION['nome'] = get_name($user, $db);
					$_SESSION['cognome'] = get_surname($user, $db);
					$_SESSION['mail'] = get_email($user, $db);

					// Serve a reindirizzare l'utente dalla pagina che si trovava prima
					if (isset($_GET['redirect'])) {
						$redirect_url = urldecode($_GET['redirect']);
						$redirect_url = str_replace('redirect=', '', $redirect_url);
					} else {
						$redirect_url = 'homepage.php';
						$redirect_url = str_replace('redirect=', '', $redirect_url);
					}

					echo "<script>alert('Login effettuato con successo');
					window.location.href = '$redirect_url';
					</script>";
				}
				else{
					echo "<script>alert('Username o password errati.')
						window.location.href = 'login.php';
					</script>";
				}
			}
		}
		elseif(isset($_POST['sign_up'])){
			$nome = $_POST['name'];
            $cognome = $_POST['surname'];
            $user = $_POST['username'];
            $mail = $_POST['email'];
            $pass = $_POST['pwd1'];
			insert_utente($nome, $cognome, $user, $mail, $pass);
		}
		else{
			echo "<script>alert('ERRORE: username o password non inseriti.');	
				window.location.href = 'login.php';
				</script>";
				exit();
		}
	}
	?>
	<?php
function get_pwd($user, $db){
		require './db.php';
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

function username_exist($user){
	require "./db.php";
	//CONNESSIONE AL DB
	$sql = "SELECT username FROM account WHERE username=$1";
	$prep = pg_prepare($db, "sqlUsername", $sql);

	$ret = pg_execute($db, "sqlUsername", array($user));
	// $ret sarà uguale a false in caso di fallimento nell'esecuzione del prepared statement

	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{

		if ($row = pg_fetch_assoc($ret)){
			return true;
		}
		else{
			return false;
		}
	}
	pg_close($db);
}

function insert_utente($nome, $cognome, $user, $mail, $pass){
	require "./db.php";
	//CONNESSIONE AL DB

	if(username_exist($user)){
		echo "<script>alert('User già presente nel sistema');
			window.location.href = 'login.php';
			</script>";
		return;
	}
	if(mail_exists($mail,$db)){
		echo "<script>alert('Email già presente nel sistema');
			window.location.href = 'login.php';
			</script>";
		return;
	}

	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "INSERT INTO account(nome, cognome, username, email, password) VALUES($1, $2, $3, $4, $5)";
	$prep = pg_prepare($db, "insertUser", $sql);
	$ret = pg_execute($db, "insertUser", array($nome, $cognome, $user, $mail, $hash));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		echo "<script>alert('Utente registrato con successo! Effettua il login.');
				window.location.href = 'login.php';
				</script>";
		return true;
	}
	pg_close($db);
}

function mail_exists($mail, $db){
	require "./db.php";
	$sql = "SELECT email FROM account WHERE email = $1";
	$prep = pg_prepare($db, "sqlMail", $sql);
	$ret = pg_execute($db, "sqlMail", array($mail));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		if ($row = pg_fetch_assoc($ret)){
			return true;
		}
		else{
			return false;
		}
	}
	pg_close($db);
}

function get_name($user, $db){
	require './db.php';
	$sql = "SELECT nome FROM account WHERE username=$1;";
	$prep = pg_prepare($db, "sqlNome", $sql);
	$ret = pg_execute($db, "sqlNome", array($user));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		if ($row = pg_fetch_assoc($ret)){
			$nome = $row['nome'];
			return $nome;
		}
		else{
			return false;
		}
   }
	pg_close($db);
}
function get_surname($user, $db){
	require './db.php';
	$sql = "SELECT cognome FROM account WHERE username=$1;";
	$prep = pg_prepare($db, "sqlCognome", $sql);
	$ret = pg_execute($db, "sqlCognome", array($user));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		if ($row = pg_fetch_assoc($ret)){
			$cognome = $row['cognome'];
			return $cognome;
		}
		else{
			return false;
		}
   }
	pg_close($db);
}
function get_email($user, $db){
	require './db.php';
	$sql = "SELECT email FROM account WHERE username=$1;";
	$prep = pg_prepare($db, "sqlGetMail", $sql);
	$ret = pg_execute($db, "sqlGetMail", array($user));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		if ($row = pg_fetch_assoc($ret)){
			$mail = $row['email'];
			return $mail;
		}
		else{
			return false;
		}
   }
	pg_close($db);
}
?>
</body>
</html>


