<?php
require_once('risorse/PHP/connection.php');

// connessione al server
$connection = new mysqli($host, $user, $password);
if ($connection->connect_error) {
    exit("Connessione al server fallita: " . $connection->connect_error);
}
// creo database
$sql_db = "CREATE DATABASE IF NOT EXISTS $db";
if ($connection->query($sql_db) === FALSE) {
    echo "Errore nella creazione del database " . $connection->error;
}
// connessione al database
$connection = new mysqli($host, $user, $password, $db);
if ($connection->connect_error) {
    exit("Connessione al database fallita: " . $connection->connect_error);
}

// creo tabella utente
// id ruolo = 1 per ogni utente normale 
// id ruolo = 2 solo per l'admin creato in fase di installazione del database
$sql_table_utente = "CREATE TABLE IF NOT EXISTS utente(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        id_ruolo INT(6) UNSIGNED NOT NULL DEFAULT 1, 
        password VARCHAR(255) NOT NULL,
        UNIQUE (username, email)
    );";
if ($connection->query($sql_table_utente) === FALSE) {
    echo "Errore nella creazione della tabella " . $connection->error;
}

// inserisco utente admin con hashing della password
$check_admin = "SELECT * FROM utente WHERE username = 'admin';";
$result_admin = mysqli_query($connection, $check_admin);
if (!mysqli_num_rows($result_admin) > 0) {

    $pwd_admin = password_hash('admin', PASSWORD_DEFAULT);
    $sql_admin = "INSERT INTO utente (username, email, password, id_ruolo) VALUES ('admin',' admin@gmail.it','" . $pwd_admin . "', 2);";

    if ($connection->query($sql_admin) === FALSE) {
        echo "Errore nell'inserimento dell'utente admin " . $connection->error;
    }
}


// inserisco utente brigale con hashing della password
$check_brigale = "SELECT * FROM utente WHERE username = 'brigale';";
$result_utente = mysqli_query($connection, $check_brigale);
if (!mysqli_num_rows($result_utente) > 0) {
    $pwd_brigale = password_hash('ale', PASSWORD_DEFAULT);
    $sql_brigale = "INSERT INTO utente (username, email, password) VALUES ('brigale','brigale@gmail.com','" . $pwd_brigale . "');";
    if ($connection->query($sql_brigale) === FALSE) {
        echo "Errore nell'inserimento dell'utente admin " . $connection->error;
    }
}
// chiudo la connessione e reindirizzo alla homepage
$connection->close();
header('location: Homepage.php');
exit(1);

?>
