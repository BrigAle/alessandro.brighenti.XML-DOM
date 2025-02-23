<?php
session_start();
require_once 'connection.php';
$connection = new mysqli('localhost', 'root', '', 'database_homework2');

if ($connection->connect_error) {
    die("Connessione fallita: " . $connection->connect_error);
}

// Controlla se la richiesta è POST e se l'utente è autorizzato
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['ruolo']) && $_SESSION['ruolo'] == 2) {

    // Recupero dati dal form
    $data_visita = $_POST['data_visita'];
    $tipologia_visita = $_POST['tipologia_visita'];
    $ora_visita = $_POST['ora_visita'];

    // Carica l'XML
    $xmlFile = "../XML/visite.xml";

    if (!file_exists($xmlFile)) {
        die("Errore: Il file XML non esiste.");
    }
    // Creo una stringa vuota
    $xmlString="";
    // Elimino gli spazi bianchi e le nuove righe
    foreach(file($xmlFile) as $nodo){
        $xmlString.=trim($nodo);
    }
    
    $doc = new DOMDocument(); // Creo un nuovo oggetto DOM
    $doc->loadXML($xmlString); // Carico il file XML nella variabile $doc

    $visite = $doc->documentElement; // Elemento root <visite>
    $visita = $doc->createElement('visita'); // Creo un nuovo elemento <visita>

    // Creo gli elementi figli di <visita>
    $nome = $doc->createElement('nome');
    $data = $doc->createElement('data');
    $ora = $doc->createElement('ora');
    // Assegno i valori presi dal form ai nodi figli
    $nome->nodeValue = $tipologia_visita;
    $data->nodeValue = $data_visita;
    $ora->nodeValue = $ora_visita;

    // Aggiungo in ordine gli elementi a <visita>
    $visita->appendChild($nome);
    $visita->appendChild($data);
    $visita->appendChild($ora);

    // Recupero l'ultimo ID delle visite
    // Se non ci sono visite, l'ID sarà 0
    // Altrimenti, l'ID sarà l'ultimo ID + 1

    // Recupero tutte le visite esistenti
    $visiteEsistenti = $doc->getElementsByTagName('visita');
    $idUltimaVisita = 0; // Default se non ci sono visite

    // Se ci sono visite, recupero l'ID dell'ultima visita. . .
    if ($visiteEsistenti->length > 0) {
        $ultimaVisita = $visiteEsistenti->item($visiteEsistenti->length - 1);
        if ($ultimaVisita->hasAttribute('id')) {
            $idUltimaVisita = (int)$ultimaVisita->getAttribute('id');
        }
    }
    //. . .e Incremento di 1
    $visita->setAttribute('id', $idUltimaVisita + 1);

    //  Aggiungo la nuova visita in fondo al file XML
    $visite->appendChild($visita);
    //  Formatto il file XML in modo leggibile
    $doc->formatOutput = true;

    // Salvo e formatto il file 
    $xmlFormatted = $doc->saveXML();
    // Scrivo il contenuto nel file XML
    file_put_contents($xmlFile, $xmlFormatted);

    // eseguo una ricerca semplice per verificare se e' stata aggiunta la visita
    $xmlRicerca = simplexml_load_file($xmlFile);
    $idVisitaAggiunta = $idUltimaVisita + 1;
    $_SESSION['visitaAggiunta']=false;
    foreach($xmlRicerca->visita as $visita){
        if((int)$idVisitaAggiunta===(int)$visita['id']){
            $_SESSION['visitaAggiunta']=true;
            break;
        }
    }
    
    // ritorno al form
    header('Location: ../../aggiungiVisita.php');
    exit;
}
