<?php
session_start();
require_once 'risorse/PHP/connection.php';
$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
    die("Connessione fallita: " . $connection->connect_error);
}
$xmlFile1 = "risorse/XML/prenotazioni.xml";
if (!file_exists($xmlFile1)) {
    die("Errore: il file XML delle prenotazioni non esiste.");
}
$xmlPrenotazioni=simplexml_load_file($xmlFile1);

$xmlFile2 = "risorse/XML/visite.xml";
if (!file_exists($xmlFile2)) {
    die("Errore: il file XML delle visite non esiste");
}
$xmlVisite = simplexml_load_file($xmlFile2);

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
            <div class="contenuto" style="font-family:Arial, Helvetica, sans-serif; background-color:lightgreen">
                <?php if (isset($_SESSION['username']) && isset($_SESSION['logged']) && $_SESSION['logged'] == true):
                    
                    $numPrenotazioni=0;
                    $id = (int)$_SESSION['id'];
                    foreach($xmlPrenotazioni as $prenotazione1){
                        $idP = (int)$prenotazione1->id_utente;
                        if($id===$idP)
                            $numPrenotazioni++;
                    }
                    if ($numPrenotazioni > 0):
                        if (isset($_SESSION['delete'])) {
                            echo "<h2>" . $_SESSION['delete'] . "</h2>";
                            unset($_SESSION['delete']);
                        }
                        //ciclo per stampare i dati
                        echo "<div class=\"box_prenotazione\">";
                        foreach ($xmlPrenotazioni as $prenotazione):
                            $id_utente = (int)$prenotazione->id_utente;
                            $id_visita = (int)$prenotazione->id_visita;
                            $id_prenotazione = (int)$prenotazione->attributes()->id;
                            foreach ($xmlVisite as $visita):
                                $idV = (int)$visita->attributes()->id;
                                if ($idV == $id_visita && $id_utente == $_SESSION['id']):
                                    $nome = (string)$visita->nome;
                                    $data = (string)$visita->data;
                                    $ora = (string)$visita->ora;
                                ?>

                                <div class="contenuto_prenotazione">
                                    <p>Nome visita: <?= $nome; ?></p>
                                    <p>Data: <?= $data; ?></p>
                                    <p>Ora: <?= $ora; ?></p>
                                    <!--    Creo un form con un campo hidden che invia l'ID della prenotazione al file eliminaPrenotazione.php 
                                                quando l'utente clicca su "Elimina".  -->
                                    <form action="risorse/PHP/eliminaPrenotazione.php" method="POST">
                                        <input type="hidden" name="id_prenotazione" value="<?= $id_prenotazione; ?>">
                                        <input type="submit" value="Elimina prenotazione">
                                    </form>
                                </div>
                <?php
                               endif;
                            endforeach;
                        endforeach;
                        echo "</div>";
                    else:
                        echo "<h3>Non ci sono prenotazioni.</h3>";
                    endif;
                else:
                    echo "<h3> Devi effettuare il login per visualizzare le prenotazioni. </h3>";
                endif;
                ?>
            </div>
        </div>
    </div>
    <!-- div piè di pagina -->
    <!-- <div class="pdp">
        <p>&amp; 2024 Castelporziano.</p>
    </div> -->
</body>

</html>