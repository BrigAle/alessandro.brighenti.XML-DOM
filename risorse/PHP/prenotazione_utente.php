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
    // Carico il file XML
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
    // Creo un nuovo nodo prenotazione e gli aggiungo i nodi figli id_utente e id_visita
    $prenotazione = $doc->createElement('prenotazione');
    $id_user = $doc->createElement('id_utente');
    $id_visit = $doc->createElement('id_visita');
    // Setto i valori dei nodi figli
    $id_user->nodeValue = $id_utente;
    $id_visit->nodeValue = $id_visita;
    // Aggiungo i nodi figli al nodo prenotazione
    $prenotazione->appendChild($id_user);
    $prenotazione->appendChild($id_visit);
    // Aggiungo l'attributo id al nodo prenotazione
    $prenotazioniEsistenti = $doc->getElementsByTagName('prenotazione');
    $idUltimaPrenotazione = 0;

    if ($prenotazioniEsistenti->length > 0) {
        $ultimaPrenotazione = $prenotazioniEsistenti->item($prenotazioniEsistenti->length - 1);
        if ($ultimaPrenotazione->hasAttribute('id')) {
            $idUltimaPrenotazione = (int)$ultimaPrenotazione->getAttribute('id');
        }
    }
    $prenotazione->setAttribute('id', $idUltimaPrenotazione + 1);
    // Aggiungo il nodo prenotazione al nodo prenotazioni
    $prenotazioni->appendChild($prenotazione);
    // Formatto in modo da renderlo piu' leggibile
    $doc->formatOutput = true;
    $xmlFormatted = $doc->saveXML();
    //inserisco il file xml formattato in "../XML/prenotazioni.xml"
    file_put_contents($xmlFile, $xmlFormatted);

    // eseguo una ricerca semplice per verificare se e' stata aggiunta la prenotazione
    // in caso positivo setto la variabile di sessione successP altrimenti setto la variabile di sessione errorP
    $xmlRicerca = simplexml_load_file($xmlFile);
    $idPrenotazioneAggiunta = $idUltimaPrenotazione + 1;
    $trovato = false;
    foreach ($xmlRicerca->prenotazione as $prenotazione) {
        if ((int)$idPrenotazioneAggiunta === (int)$prenotazione['id']) {
            $trovato = true;
            break; // esce dal ciclo foreach
        } 
    }
    if ($trovato) {
        $_SESSION['successP'] = "Prenotazione aggiunta con successo";
    } else {
        $_SESSION['errorP'] = "Errore di prenotazione";
    }
    header('Location: ../../prenotazione.php');
    exit;
}
