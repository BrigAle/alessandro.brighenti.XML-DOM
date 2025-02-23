<?php
session_start();
require_once 'connection.php';

$connection = new mysqli($host, $user, $password, $db);
if ($connection->connect_error) {
    die("Connessione al database fallita: " . $connection->connect_error);
}

if (isset($_POST['id_prenotazione'])) {
    $id_daEliminare = trim($_POST['id_prenotazione']); // Pulizia input
    $xmlFile = "../XML/prenotazioni.xml";

    if (!file_exists($xmlFile)) {
        die("Errore: il file XML delle prenotazioni non esiste");
    }

    $doc = new DOMDocument();
    $doc->preserveWhiteSpace = false;
    $doc->formatOutput = true;
    $doc->load($xmlFile);

    $prenotazioni = $doc->documentElement;
    $elencoPrenotazioni = $doc->getElementsByTagName('prenotazione');
    $id = 0;
    $eliminato = false; // Inizializzazione variabile
    // ricerca del nodo prenotazione da eliminare
    foreach ($elencoPrenotazioni as $prenotazione) {
        if($prenotazione->hasAttribute('id')) {
            $id = $prenotazione->getAttribute('id');
            if ((int)$id === (int)$id_daEliminare) {  
                $prenotazioni->removeChild($prenotazione);
                $doc->save($xmlFile); // Usa il percorso corretto
                $eliminato = true;
                break;
            }
        }
    }
    $_SESSION['delete'] = "Prenotazione eliminata con successo.";
    header("Location: ../../prenotazioniEffettuate.php");
    exit();
} else {
    $_SESSION['delete'] = "Errore: ID prenotazione non ricevuto.";
    header("Location: ../../prenotazioniEffettuate.php");
    exit();
}
?>