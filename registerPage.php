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
                            echo "<li><a href=\"prenotazione.php\">Prenotazione</a></li>";
                            if (isset($_SESSION['ruolo']) && $_SESSION['ruolo'] == 2) {
                                echo "<li><a href=\"aggiungiVisita.php\">Aggiungi visita</a></li>";
                            }
                            echo "<li><a href=\"risorse/PHP/logout.php\">Logout</a></li>";  
                        }else{
                            echo "<li><a href=\"registerPage.php\">Registrati</a></li>";
                        }
                        ?>

                    </ul>
                </div>
            </div>

            <!-- form di registrazione -->
            <div class="contenuto-form">
                <form action="risorse/PHP/register.php" method="POST" class="login-form">
                        <h2>Registrati</h2>
                        <!-- Controllo se esistono le variabili di sessione relative agli errori e, se impostate a true,
                         viene stampato un messaggio di errore corrispondente. -->
                        <?php
                        
                        if(isset($_SESSION['successP']) && $_SESSION['successP'] == true){
                            echo "<h3 style=\"color: green;\" > Registrazione avvenuta con successo </h3>";
                            unset($_SESSION['successP']);
                        }elseif(isset($_SESSION['successP']) && $_SESSION['successP'] == false){
                            echo "<h3> Errore durante l'invio dei dati nel database </h3>";
                            unset($_SESSION['successP']);
                        }
                        if (isset($_SESSION['error_email']) &&  $_SESSION['error_email'] == true) {
                            echo "<h3 class=\"errore\"> Email gia' esistente</h3>";
                            unset($_SESSION['error_email']);
                        }
                        if (isset($_SESSION['error_password']) && $_SESSION['error_password'] == true) {
                            echo "<h3> Le password non coincidono</h3>";
                            unset($_SESSION['error_password']);
                        }

                        ?>

                        <label for="username" class="form-label"></label>
                        <input type="text" name="username" id="username" class="form-input" placeholder="Username" required>
                        

                        <label for="password" class="form-label"></label>
                        <input type="password" name="password" id="password" class="form-input" placeholder="Password" required>
                        <label for="password2" class="form-label"></label>
                        <input type="password" name="password2" id="password2" class="form-input" placeholder="Conferma Password" required>
                        <?php
                        if (isset($_SESSION['error_user']) && $_SESSION['error_user'] == true) {
                            echo "<h3> Username gia' esistente</h3>";
                            unset($_SESSION['error_user']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['error_password']) && $_SESSION['error_password'] == true) {
                            echo "<h3> Le password non coincidono</h3>";
                            unset($_SESSION['error_password']);
                        }
                        ?>
                        
                        <label for="email" class="form-label"></label>
                        <input type="email" name="email" id="email" class="form-input" placeholder="E-mail" required>
                        <?php
                        if (isset($_SESSION['error_email']) &&  $_SESSION['error_email'] == true) {
                            echo "<h3 class=\"errore\"> Email gia' esistente</h3>";
                            unset($_SESSION['error_email']);
                        }
                        ?>
                        <input type="submit" value="Registrati" class="form-submit" style="width: 112%;">
                        <h3 style = " color: green">Già registrato?<br><a href="loginPage.php"> Entra qui</a></h3>
                    
                </form>

            </div>

        </div>

    </div>

</body>