<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Castel Porziano </title>
    <meta name="author" content="Brighenti" />
    <link rel="shortcut icon" href="risorse\immagini\stendardo.ico" type="image/x-ico" />
    <link rel="stylesheet" href="risorse\CSS\style.css" type="text/css" />
</head>

<body style="overflow: hidden;">
    <!-- div menu -->
    <div class="menu">
        <a href="Homepage.php">HomePage</a>
        <a href="Info.php">Informazioni</a>
        <a href="Contatti.php">Contatti</a>
        <a href="Galleria.php">Galleria</a>
        <a href="Login.php">Login</a>
        <a href="Logout.php">Logout</a>
    </div>
    <!-- div titolo principale -->
    <!-- <div class="titolo">
        <h1>Benvenuti a Castel Porziano</h1>
    </div> -->
    <!-- div contenuto -->
    <div class="wrapper">
        <div class="container">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="stickydiv">
                    <!-- <h2>Menu</h2> -->
                    <ul>
                        <li><a href="Homepage.php">HomePage</a></li>
                        <li><a href="Info.php">Informazioni</a></li>
                        <li><a href="Contatti.php">Contatti</a></li>
                        <li><a href="Galleria.php">Galleria</a></li>
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<li><a href=\"loginPage.php\">Login</a></li>";
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['username']) && $_SESSION['logged'] == true) {
                            echo "<li><a href=\"prenotazione.php\">Prenota Visita</a></li>";
                            echo "<li><a href=\"prenotazioniEffettuate.php\">Visualizza Prenotazioni</a></li>";
                            if (isset($_SESSION['ruolo']) && $_SESSION['ruolo'] == 2) {
                                echo "<li><a href=\"aggiungiVisita.php\">Aggiungi visita</a></li>";
                            }
                            echo "<li><a href=\"risorse/PHP/logout.php\">Logout</a></li>";
                        } else {
                            echo "<li><a href=\"registerPage.php\">Registrati</a></li>";
                        }
                        ?>

                    </ul>
                </div>
            </div>

            <!-- Contenuto principale -->

            <div class="contenuto" style="background-color: lightgreen;">

                <!-- Inserisco un controllo in PHP per verificare se l'utente amministratore è loggato, 
                        al fine di impedire l'accesso alla pagina senza i giusti permessi. -->
                <?php
                    if (isset($_SESSION['ruolo']) && $_SESSION['ruolo'] == 2):
                ?>
                    <form method="POST" action="risorse/PHP/aggiungiVisita_admin.php" class="login-form">
                    <h2>Aggiungi Visita</h2>
                        <label for="data_visita" class="form-label">Data della Visita:</label>
                        <input type="date" id="data_visita" name="data_visita" required class="form-input">

                        <label for="ora_visita" class="form-label">Ora della Visita:</label>
                        <input type="time" id="ora_visita" name="ora_visita" required class="form-input">

                        <label for="tipologia_visita" class="form-label">Tipologia:</label>
                        <select id="tipologia_visita" name="tipologia_visita" required class="form-select">
                            <option value="Archeologico">Archeologico</option>
                            <option value="Storico-Artistico">Storico-Artistico</option>
                            <option value="Naturalistico">Naturalistico</option>
                        </select>
                        
                        <button type="submit" class="form-submit">Aggiungi Visita</button>
                    <?php
                        if(isset($_SESSION['visitaAggiunta']) && $_SESSION['visitaAggiunta'] == 'true'){
                            echo "<h3 style='color: green;'>Visita aggiunta con successo</h3>";
                            unset($_SESSION['visitaAggiunta']);
                        }elseif(isset($_SESSION['visitaAggiunta']) && $_SESSION['visitaAggiunta'] == 'false'){
                            echo "<h3 style='color: red;'>Visita aggiunta con successo</h3>";
                            unset($_SESSION['visitaAggiunta']);
                        }
                    ?>
                    </form>
                <?php
                    else: echo "<h2>Non hai i permessi per accedere a questa pagina</h2>";
                    endif;
                ?>

            </div>
        </div>
    </div>
    <!-- div piè di pagina -->
    <div class="pdp">
        <p>&amp; 2024 Castelporziano.</p>
    </div>
</body>

</html>