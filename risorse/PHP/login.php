<?php 
    session_start();
    require_once 'connection.php';
    $connection = new mysqli($host, $user, $password, $db);
    
    // prendo i dati dal form e li salvo in variabili
    // real_escape_string in PHP è un metodo della classe mysqli
    // utilizzato per rendere sicuri i dati forniti dagli utenti
    // prima di utilizzarli in una query SQL. 
    // Questa funzione "esclude" caratteri speciali nei dati in ingresso, rendendoli innocui ed evitando vulnerabilità come l'SQL Injection.
    $username = $connection->real_escape_string($_POST['username']);
    $password = $connection->real_escape_string($_POST['password']);
    // controllo se il metodo di richiesta è POST
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // query per selezionare l'utente con username uguale a quello inserito nel form
        $queryL = "SELECT * FROM utente u WHERE u.username = '$username'";
        $result = $connection->query($queryL);
        // se il risultato non è negativo e il numero di record trovati dalla query è uguale a 1
        if($result){
            if(mysqli_num_rows($result) == 1){
                $record = $result->fetch_array(MYSQLI_ASSOC);
                // controllo se la password inserita nel form è uguale a quella nel database
                if(password_verify($password, $record['password'])){
                    // se la password è corretta allora setto le variabili di sessione
                    $_SESSION['username'] = $username;
                    $_SESSION['logged'] = 'true';
                    // setto la variabile di sessione id con l'id dell'utente loggato
                    $_SESSION['id'] = $record['id'];
                    // se l'utente ha ruolo 2 allora setto la variabile di sessione ruolo a 2 (per l'admin)
                    if($record['id_ruolo'] == 2){
                        $_SESSION['ruolo'] = 2;
                        header('Location: ../../Homepage.php');
                        exit(1);
                    }
                    header('Location: ../../Homepage.php');
                    exit(1);
                // se ci sono errori allora setto le variabili di sessione per mostrare gli errori          
                }else{
                    $_SESSION['error_password'] = 'true';
                    header('Location:../../loginPage.php');
                    exit(1);
                }
            }else{
                $_SESSION['error_username'] = 'true';
                header('Location:../../loginPage.php');
                exit(1);
            }
        }else{
            $_SESSION['error_users'] = 'true';
            header('Location:../../loginPage.php');
            exit(1);
        }
        $connection->close();
    }
?>
