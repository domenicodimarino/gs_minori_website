<html>
    <head>
        <title>GS Minori - Login</title>
        <link rel="stylesheet" href="login.css" type="text/css"/>
        <script language="javascript" type="text/javascript">

            function registrazione(){
                document.getElementById("login_form").style.display = "none";
                document.getElementById("registration_form").style.display = "block";
            }
            function login(){
                document.getElementById("login_form").style.display = "block";
                document.getElementById("registration_form").style.display = "none";
            }
            function check_signup_data(elementoModulo) {
                if (elementoModulo.name.value == "") {
                    alert("Devi inserire un nome");
                    elementoModulo.name.focus();
                    return false;
                }
                if (elementoModulo.password.value == "") {
                    alert("Devi inserire una password");
                    elementoModulo.password.focus();
                    return false;
                }
                if (elementoModulo.password.value != elementoModulo.confirm_password.value) {
                    alert("Le due password non corrispondono");
                    elementoModulo.password.focus();
                    elementoModulo.password.select();
                    return false;
                }
                return true;
            }	
        </script>
    </head>
    <body style="align-items: center; display: flex; flex-direction: column;">
    <?php
	if(isset($_POST['name']))
		$nome = $_POST['name'];
	else
		$nome = "";
    
    if(isset($_POST['surname']))
		$cognome = $_POST['surname'];
	else
		$cognome = "";

	if(isset($_POST['username']))
		$user = $_POST['username'];
	else
		$user = "";

    if(isset($_POST['email']))
		$email = $_POST['email'];
	else
		$email = "";

    if(isset($_POST['password']))
		$pass = $_POST['password'];
	else
		$pass = "";
	if(isset($_POST['confirm_password']))
		$repassword = $_POST['confirm_password'];
	else
		$repassword = "";

?>
        <main style="align-items: center; display: flex; flex-direction: column;">
            <a href="homepage.php"><img src="logo.png" alt="Logo GS Minori" style="width: 40vw;" height="auto"></a>
            <div id="login_form" style="display:block;">
            <form method="post" action=<?php echo $_SERVER['PHP_SELF']?> style="align-items: center; display: flex; flex-direction: column;">
                <p>
                <label for="email">
                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email?>"/>
                </label>
                </p>
                <p>
                <label for="password">
                    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $pass?>"/>
                </label>
                </p>
                <p>
                <input type="submit" name="login" class="submit_button" value="Login"/>
                </p>
                <p> Nuovo utente?</p>
                <p><input type="button" name="go_to_sign_up" class="submit_button" value="Registrati!" onclick="registrazione()"/></p>
            </form>
            </div>
            
            <div id="registration_form" style="display:none;">
            <form method="post" action=<?php echo $_SERVER['PHP_SELF'] ?> style="align-items: center; display: flex; flex-direction: column;" onsubmit="return check_signup_data(this)">
                <p>
                <label for="name">
                    <input type="text" name="name" id="name" placeholder="Nome" value="<?php echo $name?>"/>
                </label>
                </p>
                <p>
                <label for="surname">
                    <input type="text" name="surname" id="surname" placeholder="Cognome" value="<?php echo $surname?>"/>
                </label>
                </p>
                <p>
                <label for="username">
                    <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username?>"/>
                </label>
                </p>
                <p>
                <label for="email">
                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email?>"/>
                </label>
                </p>
                <p>
                <label for="password">
                    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $pass?>"/>
                </label>
                </p>
                <p>
                <label for="confirm_password">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Conferma password" value="<?php echo $repassword?>"/>
                </label>
                </p>
                <p>
                <input type="submit" name="sign_in" class="submit_button" value="Effettua la registrazione"/>
                </p>
                <p> Sei già registrato?</p>
                <p><input type="button" name="go_to_login" class="submit_button" value="Effettua il login!" onclick="login()"/></p>
            </form>
            </div>
            <a href="homepage.php"><button>Torna alla homepage</button></a>
    </main>
    </body>
</html>