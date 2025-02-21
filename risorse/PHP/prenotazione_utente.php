<?php
session_start();
require_once 'connection.php';
$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
    die("Connessione fallita: " . $connection->connect_error);
}

// Salva la prenotazione
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupero l'id dell'utente dalla variabile di sessione 
    $id_utente = $_SESSION['id'];
    // Recupero l'id della visita dalla richiesta post 
    $id_visita = $_POST['id_visita'];
    // $queryP = "INSERT INTO prenotazione (id_utente, id_visita) VALUES ('$id_utente', '$id_visita')";
    $xmlFile = "../XML/prenotazioni.xml";
    if (!file_exists($xmlFile)) {
        die("Errore: Il file XML non esiste.");
    }
    $xmlString = "";
    foreach (file($xmlFile) as $nodo) {
        $xmlString .= trim($nodo);
    }
    $doc = new DOMDocument();
    $doc->loadXML($xmlString);

    $prenotazioni = $doc->documentElement;
    $prenotazione = $doc->createElement('prenotazione');

    $id_user = $doc->createElement('id_utente');
    $id_visit = $doc->createElement('id_visita');

    $id_user->nodeValue = $id_utente;
    $id_visit->nodeValue = $id_visita;

    $prenotazione->appendChild($id_user);
    $prenotazione->appendChild($id_visit);

    $prenotazioniEsistenti = $doc->getElementsByTagName('prenotazione');
    $idUltimaPrenotazione = 0;

    if($prenotazioniEsistenti->length>0){
        $ultimaPrenotazione = $prenotazioniEsistenti->item($prenotazioniEsistenti->length-1);
        if($ultimaPrenotazione->hasAttribute('id')){
            $idUltimaPrenotazione = (int)$ultimaPrenotazione->getAttribute('id');
        }
    }
    $prenotazione->setAttribute('id',$idUltimaPrenotazione+1);

    $prenotazioni->appendChild($prenotazione);
    $doc->formatOutput = true;

    $xmlFormatted = $doc->saveXML();

    file_put_contents($xmlFile,$xmlFormatted);

    header('Location: ../../prenotazione.php');
    exit;
}

