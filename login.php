<html>
    <head>
        <title>GS Minori - Login</title>
        <link rel="stylesheet" href="login.css" type="text/css"/>
    </head>
    <body style="align-items: center; display: flex; flex-direction: column;">
        <main>
            <img src="logo.png" alt="Logo GS Minori" style="width: 40vw;" height="auto">
            <form method="post" action="login-manager.php" style="align-items: center; display: flex; flex-direction: column;">
                <p>
                <label for="email">Email</p><p>
                    <input type="text" name="email" id="email"/>
                </label>
                </p>
                <p>
                <label for="password">Password</p><p>
                    <input type="password" name="password" id="password"/>
                </label>
                </p>
                <p>
                <input type="submit" name="invia" value="Login"/>
                </p>
                <p> Nuovo utente? <a href="registrati.php">Registrati!</a></p>
            </form>

            
    </main>
    </body>
</html>