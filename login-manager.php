<html>
<head>
	<title>Gestione Login</title>
</head>
<body>
	<?php


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($_POST['username'] && $_POST['password']){
			$user =  $_POST['username'];
			$pass =  $_POST['password'];
			//chiama la funzione get_pwd che controlla
			//se username esiste nel DB. Se esiste, restituisce la password (hash), altrimenti restituisce false.
			$hash = get_pwd($user,$db);
			if(!$hash){
				echo "<p> L'utente $user non esiste. <a href=\"login.php\">Riprova</a></p>";
			}
			else{
				if(password_verify($pass, $hash)){
					echo "<p>Login Eseguito con successo</p>";
					//Se il login è corretto, inizializziamo la sessione
					session_start();
					$_SESSION['username']=$user;
					echo "<p><a href=\"homepage.php\">Accedi</a> al contenuto riservato solo agli utenti registrati<p>";
				}
				else{
					echo 'Username o password errati. <a href="login.php">Riprova</a>';
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
			echo "<p>ERRORE: username o password non inseriti <a href=\"login.php\">Riprova</a></p>";
			exit();
		}
	}
	?>
</body>
</html>

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
	//echo "Connessione al database riuscita<br/>";
	$sql = "SELECT username FROM account WHERE username=$1";
	$prep = pg_prepare($db, "sqlUsername", $sql);
	// $prep sarà uguale a false in caso di fallimento nella creazione del prepared statement

	$ret = pg_execute($db, "sqlUsername", array($user));
	// $ret sarà uguale a false in caso di fallimento nell'esecuzione del prepared statement

	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		// $row sarà uguale a false se non sono state restituite righe della tabella
		// a seguito dell'esecizone del prepared statement.
		// Nelle specifico, è false se la tabella non contiene un record con username uguale a $user
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
		echo "<script><alert>User già presente nel sistema</alert></script>";
		return;
	}
	if(mail_exists($mail,$db)){
		echo "<script><alert>Email già presente nel sistema</alert></script>";
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
		echo "<script><alert> Utente registrato con successo! Effettua il login.";
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
?>
