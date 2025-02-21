<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();
        require_once 'connection.php';

        // connessione al database
        $connection = new mysqli($host, $user, $password, $db);

        // prendo i dati dal form con real escape string per evitare sql injection
        $username = $connection->real_escape_string($_POST['username']);
        $email = $connection->real_escape_string($_POST['email']);
        $password = $connection->real_escape_string($_POST['password']);
        $password2 = $connection->real_escape_string($_POST['password2']);

        $hashPassword = password_hash($password,PASSWORD_DEFAULT);

        $check_user = "SELECT * FROM utente WHERE username ='$username';";
        $result_user = mysqli_query($connection, $check_user);

        // myqli_num_rows ritorna il numero di righe corrispondenti al numero di record trovati
        // se il numero dei record trovati è maggiore di 0, l'utente già esiste
        if(mysqli_num_rows($result_user) > 0){
            $_SESSION['error_user'] = 'true'; // Setta la variabile di sessione errore_user a true
            header('location:../../registerPage.php?errore=user'); // Reindirizza alla pagina di registrazione con errore
            exit(1); // Esce con codice di errore
        }

        $check_email = "SELECT * FROM utente WHERE email ='$email';";
        $result_email = mysqli_query($connection, $check_email);

        // come sopra, se l'email è già presente nel database, l'utente esiste già
        if(mysqli_num_rows($result_email) > 0){
            $_SESSION['error_email'] = 'true';
            header('location:../../registerPage.php?error=email');
            exit(1);
        }
        // controllo se le password coincidono
        if($password !== $password2){
            $_SESSION['error_password'] = 'true';
            header('location:../../registerPage.php?error=password');
            exit(1);
        }
        // se tutto è andato a buon fine, inserisco l'utente nel database
        $queryR = "INSERT INTO utente (username, email, password) VALUES ('$username','$email','$hashPassword');";
        $result = mysqli_query($connection, $queryR);
        if($result){
            $_SESSION['successP'] = 'true';
            header('location:../../registerPage.php');
            exit(0);
        }else{
            $_SESSION['successP'] = 'false';
            header('location: ../../registerPage.php');
            exit(1);
        }
}