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

<body>
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
    <div class="titolo">
        <h1>Benvenuti a Castel Porziano</h1>
    </div>
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
            <div class="contenuto">
                <img src="risorse/immagini/c_porziano_01.jpg" alt="" class="immagine"/>
                <p class="testo">
                    La Tenuta Presidenziale di Castelporziano, dista circa 25 Km dal centro di Roma e si estende su una
                    superficie di 60 Km2 (6039 ettari) comprendendo alcune storiche tenute di caccia quali “Trafusa,
                    Trafusina, Riserve Nuove e Capocotta”.
                    Si estende ormai quasi alla periferia della città fino al litorale romano, comprendendo circa 3,1 Km
                    di spiaggia ancora incontaminata.
                    Castelporziano è in parte delimitata dalla via Cristoforo Colombo, che collega la capitale ad Ostia,
                    dalla strada statale Pontina e dalla strada statale litoranea Ostia Torvaianica.
                </p>
                <div class="colonne">
                    <div class="colonna">
                        <h2>Cortile interno</h2>
                        <img src="risorse/immagini/c_porziano_02.jpg" alt=""/>
                        <p>La storia di Castelporziano è legata ad un territorio vissuto dall’uomo sin dall’età antica
                            ed è
                            connessa alle memorie mitiche collegate alla nascita di Roma e all’Impero nel suo massimo
                            splendore. Il castello si forma in età medievale come castrum fortificato e si inserisce
                            nell’ambito di un
                            ampio sistema difensivo collocato sui crinali delle propagini più avanzate dei Colli Albani
                            verso il Tevere ed in connessione con il Castello di Decima. </p>

                    </div>
                    <div class="colonna">
                        <h2>Cortile Esterno</h2>
                        <img src="risorse/immagini/c_porziano_03.jpg" alt=""/>
                        <p> Già nel 1826 Castelporziano era considerata quale unica riserva di caccia nella campagna
                            romana e al concessionario, Vincenzo Grazioli, fu fatto obbligo di recintare l’intera
                            riserva.
                            Acquisì la “Tenuta di Castel Porziano detta volgarmente Porcigliano” assieme a
                            Tor Paterno il 20 settembre 1823 dalla marchesa Ottavia Guadagni, vedova del barone
                            Cerbero del Nero, per scudi 80.793 e baiocchi 90.
                            Grazioli avviò altresì una serie di lavori di restauro del castello.
                            Nel piccolo cortile interno, coronato da merlature, sono incastonati una serie di frammenti
                            antichi e lapidi iscritte.
                            Al centro del cortile è posto un dolio antico in terracotta. Il vaso serviva, in età romana,
                            a conservare le derrate alimentari, soprattutto granaglie.</p>
                    </div>
                </div>

                <div class="colonne">
                    <div class="colonna">
                        <h2>Salone d'accesso</h2>
                        <img src="risorse/immagini/c_porziano_04.jpg" alt=""/>
                        <p>È attraverso lo scalone dovuto al duca Pio Grazioli e all’architetto Antonio Sarti che si
                            accede al piano
                            nobile del castello.
                            Il piano nobile del castello conserva oggetti d’arredo provenienti dal Quirinale, dalle
                            principali regge
                            preunitarie e dagli acquisti effettuati dall’Amministrazione Sabauda. In rari casi sono
                            presenti oggetti
                            provenienti dalle antiche collezioni pontificie.
                        </p>
                    </div>
                    
                    <div class="colonna">
                        <h2 style="height: 23px;"></h2>
                        <img src="risorse/immagini/c_porziano_05.jpg" style="height: 400px; width: 300px; display: grid;" alt=""/>
                        <p style="clear: none;">Sulla parete di fondo dello scalone è collocata una grande tela dell’artista Gino Romiti (1881-1967) dal 
                            titolo Fondi marini.L’opera, datata 1959, fu commissionata al pittore dal Presidente della Repubblica 
                            Giovanni Gronchi per decorare una parete della villa del Gombo, parte dell’ex Tenuta Presidenziale di 
                            San Rossore (Pisa), la cui proprietà fu trasferita dal 1999 alla Regione Toscana.
                        </p>
                    </div>    
                </div>
                <div class="colonne">
                    <div class="colonna">
                        <h2>Galleria</h2>
                        <img src="risorse/immagini/c_porziano_06.jpg" alt=""/>
                        <p>Nella Galleria la storia dei Savoia viene enfatizzata tramite quattro belle tele di Massimo D’Azeglio, 
                            Della serie di dipinti facevano parte anche altre due tele che sono ancora nel Palazzo Reale di Torino.  
                            Il D’Azeglio, partendo dalla tradizione fiamminga e olandese della pittura di paesaggio e dalla scuola 
                            piemontese del tardo Settecento, sviluppa una ricerca propriamente ‘romantica’ sul tema, realizzando un 
                            nuovo modo di dipingere.
                            Fra i personaggi raffigurati nelle tele compare, in due di esse, Amedeo VI di Savoia detto il Conte Verde 
                            per la consuetudine di combattere nei tornei con armi e vessilli di colore verde, consuetudine che 
                            mantiene quando sale al trono. Con Amedeo VI lo stato sabaudo acquisisce egemonia a livello locale, 
                            grazie alla sua saggia politica e alle importanti imprese militari in Oriente, fra le quali spicca la liberazione 
                            di Giovanni V Paleologo imperatore bizantino dalle mani dei Bulgari, episodio raffigurato in uno dei 
                            dipinti. 
                            Guglielmo Bolomier de Poncin cancelliere di Savoia nella prima metà del XV secolo, è emblema del 
                            fedele servitore dello Stato sabaudo fino alla morte: egli osò accusare pubblicamente alcuni favoriti della 
                            duchessa Anna – sposa bella e volitiva del debole principe Ludovico di Savoia -, ed ella promosse contro 
                            di lui un processo per calunnia e per concussione. Dopo lunghe e appassionate vicende, il disgraziato fu 
                            condannato a morte e gettato con una pietra al collo nel lago di Ginevra, presso Chillon, alla presenza dei 
                            cortigiani che aveva giustamente accusati. 
                        </p>
                    </div>

                    <div class="colonna" style="display: grid;">
                        <h2 style="height: 23px;"></h2>
                        <img src="risorse/immagini/c_porziano_07.jpg" style="width: 100%; height: auto;" alt=""/>
                    </div>
                </div>

                <div class="colonne" style="grid-template-columns: 1fr">
                    <div class="colonna">
                          <h2>Studio del Presidente</h2>
                          <img src="risorse/immagini/c_porziano_08.jpg" class="pres" alt=""/>
                          <p>
                            Nella Sala della Repubblica Italiana alle pareti vi sono i ritratti dei 13 Capi di Stato, a cominciare da 
                            Alcide De Gasperi, che assume le funzioni di Capo provvisorio dello Stato tra il 13 e il 30 giugno 1946, 
                            e dal Capo provvisorio dello Stato Enrico De Nicola, il quale - dopo l’entrata in vigore della Costituzione 
                            il 1° gennaio 1948 - “esercita le attribuzioni di Presidente della Repubblica e ne assume il titolo”, fino 
                            all’attuale Presidente della Repubblica Sergio Mattarella.  
                            Davanti la finestra è esposta su un leggio una copia della Costituzione della Repubblica Italiana, 
                            firmata il 27 dicembre 1947 dal Capo provvisorio dello Stato, Enrico De Nicola, controfirmata dal 
                            Presidente dell’Assemblea Costituente, Umberto Terracini, dal Presidente del Consiglio dei Ministri, 
                            Alcide De Gasperi e con l’apposizione del visto da parte del Guardasigilli, Giuseppe Grassi. Queste illustri 
                            firme attestano, oltre alla autenticità della Costituzione Italiana, anche l’esito dell’intenso lavoro 
                            dell’Assemblea Costituente, eletta da tutti i cittadini, uomini e donne, il 2 giugno 1946 in occasione del 
                            Referendum per la forma istituzionale dello Stato; Assemblea Costituente che era formata da diversi e 
                            anche opposti partiti politici, che seppero giungere alla unità e condivisione di un Testo che rappresenta 
                            pienamente ancora oggi il fondamento della Repubblica Italiana e della vita civile di tutti noi.
                            Il 2 giugno 1946 si svolge in Italia il referendum per la scelta della forma istituzionale dello Stato, 
                            Monarchia o Repubblica, e per l’elezione dei membri dell’Assemblea Costituente che dovrà redigere il 
                            testo della nuova Costituzione, come previsto dal Decreto Legislativo Luogotenenziale 16 marzo 1946, 
                            n. 98.  
                            È il primo voto politico a suffragio universale, in cui tutti i cittadini sono chiamati alle urne comprese 
                            le donne, alle quali il diritto di voto è stato esteso con Decreto Legislativo Luogotenenziale 1° febbraio 
                            1945, n. 23. 
                          </p>  
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- div piè di pagina -->
    <div class="pdp">
        <p>&amp; 2024 Castelporziano.</p>
    </div>
</body>

</html>