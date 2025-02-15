<html>
    <head>
        <title>GS Minori - Sito ufficiale</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>
        <?php include 'header.html'?>
        <main>
             <!-- Controllo utente loggato -->
        
        
        <?php 
        //DISATTIVATO PER TESTING

            /*
            session_start();

                L'elemento $_SESSION["username"] è popolato
                con l'username dell'utente solo se l'autenticazione è avvenuta con successo

            if(!isset($_SESSION["username"])){
                $current_url = urlencode($_SERVER['REQUEST_URI']);
                header("Location: login.php?redirect=$current_url");
                exit();
            }
            else{
                $user = $_SESSION["username"];
            }
                
            ?>*/
        ?>

        <!-- Gestione match in array associativo -->
        <?php 
            $match["1"]="GS Minori - Farmacia Greco Portici 2000, 05 Marzo 2025 21:15";
			$match["2"]="GS Minori - Sammaritana Basket e Sport, 09 Marzo 2025 19:00";
			$match["3"]="GS Minori - DIESEL TECNICA SALA CONSILINA, 12 Marzo 2025 21:00";
            $match["4"]="GS Minori - CUS NAPOLI, 16 Marzo 2025 20:30";
            if(!isset($_GET['matchID'])){
				echo "Non hai selezionato nessun match.";
			}
			elseif(!array_key_exists($_GET['matchID'], $match)){
				echo "Il match selezionato non esiste.";
			}
			else {
				$matchID = $_GET['matchID'];
			}
        ?>

        <?php 
            $sector["1"]="Tribuna ovest alta esterna";
            $sector["2"]="Tribuna ovest alta interna";
            $sector["3"]="Parterre ovest esterno";
            $sector["4"]="Parterre ovest interno";
            $sector["5"]="Parterre ovest centrale";
            $sector["6"]="Parterre ovest centralissimo";
            $sector["7"]="Tribuna est alta esterna";
            $sector["8"]="Tribuna est alta interna";
            $sector["9"]="Parterre est esterno";
            $sector["10"]="Parterre est interno";
            $sector["11"]="Curva nord";
            $sector["12"]="Curva sud";

            $sector_price["1"]=10;
            $sector_price["2"]=15;
            $sector_price["3"]=20;
            $sector_price["4"]=25;
            $sector_price["5"]=30;
            $sector_price["6"]=35;
            $sector_price["7"]=10;
            $sector_price["8"]=15;
            $sector_price["9"]=20;
            $sector_price["10"]=25;
            $sector_price["11"]=5;
            $sector_price["12"]=5;
        ?>

        <!-- Gestione pagina dopo conferma -->
        <?php 
            if(isset($_POST['numero_biglietti'])){
                $numero_biglietti = $_POST['numero_biglietti'];
                if($numero_biglietti > 0){
                    $total_price = 0;
                    for($i = 1; $i <= 12; $i++){
                        $total_price += $sector_price[$i] * $_POST['numero_biglietti'][$i];
                    }
                }
                
            }
        ?>
        </main>
        <?php include 'footer.html'?>
    </body>
    
</html>