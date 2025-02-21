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

<body style="overflow:hidden">
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
                            if(!isset($_SESSION['username'])){
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

            <div class="contenuto-form">

                <form action="risorse/PHP/login.php" method="POST" class="login-form">
                    <h2>Login</h2>

                    <label for="username" class="form-label"></label>
                    <input type="text" name="username" id="username" placeholder="Username" class="form-input" required>
                   

                    <label for="password" class="form-label"></label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-input" required>
                    <?php
                    if (isset($_SESSION['error_username']) && $_SESSION['error_username'] == true) {
                         echo "<h3>Utente non registrato</h3>";
                         unset($_SESSION['error_username']);
                    }
                    if (isset($_SESSION['error_password']) && $_SESSION['error_password'] == true) {
                        echo "<h3>Password errata</h3>";
                        unset($_SESSION['error_password']);
                    }
                    if (isset($_SESSION['error_users']) && $_SESSION['error_users'] == true) {
                        echo "<h3>Errore nel recupero degli utenti</h3>";
                        unset($_SESSION['error_users']);
                    }
                    ?>
                    <input type="submit" value="Login" class="form-submit" style = "width:110%">
                    <h3 style = " color: green">Non sei ancora registrato?<br><a href="loginPage.php"> Registrati qui</a></h3>
                </form>
                
            </div>
        </div>
    </div>
</body>