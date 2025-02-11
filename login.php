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
		
</script>
    </head>
    <body style="align-items: center; display: flex; flex-direction: column;">
        <main>
            <img src="logo.png" alt="Logo GS Minori" style="width: 40vw;" height="auto">
            <div id="login_form" style="display:block;">
            <form method="post" action="login-manager.php" style="align-items: center; display: flex; flex-direction: column;">
                <p>
                <label for="email">
                    <input type="text" name="email" id="email" placeholder="Email"/>
                </label>
                </p>
                <p>
                <label for="password">
                    <input type="password" name="password" id="password" placeholder="Password"/>
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
            <form method="post" action="login-manager.php" style="align-items: center; display: flex; flex-direction: column;">
                <p>
                <label for="name">
                    <input type="text" name="name" id="name" placeholder="Nome"/>
                </label>
                </p>
                <p>
                <label for="surname">
                    <input type="text" name="surname" id="surname" placeholder="Cognome"/>
                </label>
                </p>
                <p>
                <label for="username">
                    <input type="text" name="username" id="username" placeholder="Username"/>
                </label>
                </p>
                <p>
                <label for="email">
                    <input type="text" name="email" id="email" placeholder="Email"/>
                </label>
                </p>
                <p>
                <label for="password">
                    <input type="password" name="password" id="password" placeholder="Password"/>
                </label>
                </p>
                <p>
                <label for="confirm_password">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Conferma password"/>
                </label>
                </p>
                <p>
                <input type="submit" name="sign_in" class="submit_button" value="Effettua la registrazione"/>
                </p>
                <p> Sei già registrato?</p>
                <p><input type="button" name="go_to_login" class="submit_button" value="Effettua il login!" onclick="login()"/></p>
            </form>
            </div>
    </main>
    </body>
</html>