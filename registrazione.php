<?php
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

function insert_utente($nome, $user, $pass){
	require "./db.php";
	//CONNESSIONE AL DB
		//echo "Connessione al database riuscita<br/>";
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "INSERT INTO account(nome, username, password) VALUES($1, $2, $3)";
	$prep = pg_prepare($db, "insertUser", $sql);
	$ret = pg_execute($db, "insertUser", array($nome, $user, $hash));
	if(!$ret) {
		echo "ERRORE QUERY: " . pg_last_error($db);
		return false;
	}
	else{
		return true;
	}
	pg_close($db);
}
?>
