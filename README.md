# alessandro.brighenti.XML_DOM
 
Membri del gruppo:
Alessandro Brighenti - brighenti.1783767@studenti.uniroma1.it

Repository:
https://github.com/BrigAle/alessandro.brighenti.XML-DOM

Descrizione del Progetto:
Il progetto si basa sull’esercizio sviluppato nel secondo Homework ma con XML-DOM.
Il sito web include diverse pagine in PHP, tra cui:
install.php: un file che consente di creare il database nel caso in cui non fosse già presente.
connection.php: un file utilizzato per stabilire la connessione al database ogni volta che è necessario effettuare operazioni.

Caratteristiche Principali del Sito:

- Sistema di registrazione e login:
    Gli utenti possono registrarsi e accedere al sito.
    Le password sono protette tramite hashing per garantire maggiore sicurezza.

- Funzione di prenotazione:
    Gli utenti possono prenotare visite tramite il sistema integrato.
    Il database, creato da install.php, include due utenti predefiniti.

-Aggiungere Visite:
    L'utente con il ruolo di admin (con la password predefinita "admin") ha il privilegio di aggiungere 
    nuove visite al database. Per accedere a queste funzionalità, l'utente deve inserire le credenziali di login (username e password) 
    nel form di accesso. Solo un utente autenticato come admin potrà accedere alla sezione di aggiunta delle visite.

- Visualizzazione e gestione delle prenotazioni:
    Gli utenti possono consultare le visite prenotate nella pagina dedicata.
    È possibile eliminare le prenotazioni effettuate direttamente da questa sezione.

Struttura del progetto:

-Pagine XHTML con PHP: contengono principalmente l'aspetto visivo, la struttura della pagina e l'interazione dell'utente

-Cartella risorse:
    Una cartella che contiene tutte le risorse statiche e i file di supporto per il sito. Al suo interno, troviamo:

        CSS: stile per l'aspetto grafico del sito
        immagini: cartella che contiene le immagini utilizzate nel sito

        PHP: La cartella PHP contiene i file di logica e di gestione per il backend del sito. 
        I file PHP in questa cartella si occupano delle operazioni sul database, come la gestione 
        delle sessioni utente, l'autenticazione, la prenotazione delle visite e l'eliminazione 
        delle prenotazioni. Inoltre, vengono utilizzate query MySQL per inserire, eliminare, 
        lettura dati nel database.


Validazione del sito:
I file sono stati validati utilizzando il sito W3C Validator (https://validator.w3.org/check). 
Le pagine Homepage.php, Contatti.php, info.php e galleria.php sono state modificate per essere conformi alla specifica HTML 1.0 Strict.
Per gli altri file, sono emersi alcuni errori, come ad esempio:
    Il metodo POST deve essere scritto in minuscolo, come post o get.
    Gli elementi label e input devono essere contenuti all'interno di uno degli elementi validi come: p, h1, h2, h3, h4, h5, h6, div, pre, address, fieldset o ins.
    I placeholder devono includere un valore per essere correttamente definiti.
    Deve essere incluso il tag di chiusura (/>) per gli elementi input.
    È necessario utilizzare il tag di chiusura per gli elementi br, ovvero <br />.
