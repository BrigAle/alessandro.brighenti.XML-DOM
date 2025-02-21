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
                <img src="risorse/immagini/c_porziano_01.jpg" alt="" class="immagine" />
                <p class="testo">
                    La Tenuta Presidenziale di Castelporziano, dista circa 25 Km dal centro di Roma e si estende su una
                    superficie di 60 Km2 (6039 ettari) comprendendo alcune storiche tenute di caccia quali “Trafusa,
                    Trafusina, Riserve Nuove e Capocotta”.
                    Si estende ormai quasi alla periferia della città fino al litorale romano, comprendendo circa 3,1 Km
                    di spiaggia ancora incontaminata.
                    Castelporziano è in parte delimitata dalla via Cristoforo Colombo, che collega la capitale ad Ostia,
                    dalla strada statale Pontina e dalla strada statale litoranea Ostia Torvaianica.
                </p>
                <img src="risorse/immagini/c_porziano_09.jpg" alt="" />
                <p>A Castelporziano sono presenti la maggior parte degli ecosistemi costieri tipici dell’ambiente
                    mediterraneo. Si incontrano, infatti, procedendo dal mare verso l’entroterra, un tratto di spiaggia
                    ancora integra, dune recenti sabbiose con le tipiche piante pioniere e colonizzatrici che svolgono
                    un’azione attiva di consolidamento delle sabbie, dune antiche stabilizzate con ampie zone umide
                    retrodunali ed aree a macchia bassa ed alta con le tipiche specie sempreverdi ed aromatiche; di
                    seguito si attraversa l’ambiente a lecceta, le pinete di pino domestico, il bosco misto planiziale
                    (bosco misto di pianura) di querce (tipico delle pianure costiere), la sughereta, i pascoli per gli
                    allevamenti del bestiame domestico e le aree per le coltivazioni estensive dei cereali.
                    La maggior parte dell’estensione è occupata dal bosco planiziale igrofilo (bosco di pianura legato
                    ad ambienti umidi), caratterizzato dalla presenza di querce sempreverdi e caducifoglie e da specie
                    più prettamente igrofile, in prossimità delle zone umide.
                    È questo uno degli ultimi lembi, ancora di elevata qualità ambientale, di quelle vaste foreste e dei
                    boschi che un tempo, nell’antichità, si estendevano lungo tutta la costa laziale.
                </p>
                <img src="risorse/immagini/c_porziano_10.jpg" alt="" />
                <p>
                    La particolarità di Castelporziano è soprattutto legata alla compenetrazione del querceto tipico del
                    clima mediterraneo e del querceto tipico del clima continentale. Tra le querce sempreverdi sono
                    ampiamente diffuse il leccio, la sughera e la quercia crenata, ibrido tra cerro e sughera. Tra le
                    querce caducifoglie si segnala il cerro, la farnia ed il farnetto, mentre nelle zone umide più
                    fresche si rinvengono il pioppo, il frassino ossifillo, l’acero, il carpino bianco e il carpino
                    orientale tipico degli ambienti costieri mediterranei.
                    Il sottobosco è particolarmente ricco degli arbusti propri della macchia mediterranea con piante
                    aromatiche e in prevalenza sempreverdi: corbezzolo, cisto, erica, ginepro, lentisco, mirto,
                    fillirea, alloro, alaterno e ginestra.
                    Il bosco (misto planiziale), tra gli ecosistemi più delicati da tutelare, si estende per circa 2300
                    ettari, gli ambienti a macchia mediterranea, bassa ed alta, ricoprono una superficie di circa 500
                    ettari, la lecceta occupa un’area di 261 ettari soprattutto nella zona retrodunale e il bosco di
                    sughera interessa un’area di circa 460 ettari. I boschi si alternano a radure e praterie naturali,
                    costituendo associazioni vegetali di grande varietà ambientale.
                    Le pinete di pino domestico, realizzate con rimboschimenti artificiali, si estendono per circa 750
                    ettari con finalità di consolidamento delle dune sabbiose ed a protezione dai venti marini nell’area
                    retrodunale, con caratteristiche produttive per la raccolta dei pinoli, con valenza naturalistica
                    associata al leccio ed alla macchia mediterranea e con aspetto monumentale soprattutto per le pinete
                    secolari. Il pino domestico, sebbene di introduzione artificiale, costituisce ormai un elemento
                    fondamentale del paesaggio italiano, introdotto dagli antichi romani anche per la produzione di
                    pinoli, che sono sempre stati oggetto di raccolta nel periodo invernale.
                    Negli ambienti meno accessibili la foresta è ricca di esemplari vetusti e di alberi monumentali. Un
                    recente censimento ha individuato 29 alberi monumentali tra i più significativi per dimensioni e
                    portamento, appartenenti a 7 specie diverse.
                </p>
                <img src="risorse/immagini/c_porziano_11.jpg" style="width: 100%;" alt="" />

                <p>
                    Dal punto di vista biologico ed ecosistemico sono di particolare interesse le “piscine”, specchi di
                    acqua naturale che testimoniano l’antica presenza di ambienti umidi, di boschi allagati e di paludi
                    che un tempo si estendevano a sud sino alla pianura pontina e a nord sino alla maremma.
                    Alla grande varietà della vegetazione corrisponde un’analoga ricchezza di specie animali.
                    I numerosi ungulati che vivono allo stato selvatico sono rappresentati principalmente da cinghiali,
                    daini e caprioli, mentre è modesta la presenza del cervo. Insieme agli ungulati la foresta è
                    popolata da numerosi altri mammiferi: la volpe, il riccio, fra i mustelidi la martora, la faina, la
                    puzzola e il tasso, tra i roditori l’istrice e tra i lagomorfi la lepre italica e il coniglio
                    selvatico.
                </p>
                <img src="risorse/immagini/c_porziano_13.jpg"
                    style="height: 200px; width: 300px; float: left; padding: 10px;" alt="" />
                <p style="clear: none;">
                    Di particolare interesse zoologico vanno segnalati il cinghiale, che presenta una delle popolazioni
                    più pure tra quelle originarie dell’Italia continentale, il capriolo attribuito alla sottospecie
                    italica (originario del centro-sud Italia e riconosciuto come unità tassonomica distinta dal
                    capriolo europeo) e la lepre italica.
                </p>
                <img src="risorse/immagini/c_porziano_12.jpg" style="height: 200px; width: 300px; float: left; padding: 10px; float: right;" alt="" />
                <p style="clear: none;">
                    La foresta di Castelporziano rappresenta anche un ottimo rifugio per numerose specie ornitiche, sia
                    stanziali che migratorie. Il querceto centenario offre un ambiente idoneo per picchi di varie
                    specie, ghiandaie e rapaci notturni come la civetta, l’allocco e il barbagianni; fra quelli diurni
                    la poiana, il gheppio e lo sparviero. Fra gli uccelli di passo si segnalano molte specie svernanti
                    come il colombaccio e la beccaccia e, attirati dalle zone umide, molti anatidi, limicoli e
                    trampolieri, mentre nel periodo primaverile l’avifauna si arricchisce di altre specie come il
                    rigogolo, la tortora, il nibbio bruno (nidificante con una colonia numerosa) e molte specie di
                    insettivori.
                    A Castelporziano è attiva una stazione di inanellamento e analisi dell’avifauna migratoria
                    finalizzata all’identificazione ed allo studio degli uccelli migratori.

                    Molto significativa è anche la presenza di alcuni rettili, tra cui la tartaruga palustre, alcuni
                    anfibi, numerose specie di insetti e crostacei acquatici (tipici delle “piscine”), altri insetti
                    legati al ciclo di decomposizione del legno morto (soprattutto grandi coleotteri associati agli
                    alberi vetusti) o infeudati sulla vegetazione mediterranea e dei sistemi spiaggia-duna.

                    Gli allevamenti degli animali domestici costituiscono una componente rilevante del paesaggio tipico
                    della campagna romana. Castelporziano, infatti, assicura la salvaguardia di equini e bovini di razza
                    maremmana, quasi in via di estinzione, allevati allo stato brado ed accuditi da esperti butteri,
                    secondo la tradizione secolare.

                    La selezione è assiduamente curata, tanto che gli esemplari della Tenuta spesso si classificano ai
                    primi posti nelle principali esposizioni e rassegne di settore.

                    Le zone coltivate, storicamente lavorate ed indirizzate per assicurare dei raccolti intensivi, sono
                    oggi considerate come parte integrante dell’ambiente e del paesaggio dell’agro romano. I 750 ettari
                    riservati a pascolo e colture non intensive assicurano la produzione di cereali e foraggi,
                    utilizzati per gli allevamenti zootecnici.

                    Nel corso degli ultimi anni si sono progressivamente intensificate le misure di salvaguardia, al
                    fine di tutelare il valore naturalistico di questo unico vero polmone verde in un territorio
                    densamente antropizzato ed urbanizzato, che ha assunto una rilevanza ambientale sempre crescente.

                    La Tenuta di Castelporziano, nata come riserva di caccia e riserva agricola, è andata
                    progressivamente perdendo queste specifiche destinazioni.

                    Già nel 1977 l’attività venatoria è stata vietata, nel 1985 è stata realizzata l’annessione
                    dell’area di Capocotta, circa 1000 ettari, salvata dalla speculazione edilizia, e successivamente,
                    nel 1999, la Tenuta è stata riconosciuta Riserva Naturale dello Stato e assoggettata ad un regime di
                    tutela secondo i criteri propri delle aree naturali protette. In linea con questi obiettivi, è stato
                    realizzato un Museo Naturalistico per favorire gli approfondimenti della didattica e dell’educazione
                    ambientale.

                    Al fine di tutelare con la massima attenzione i delicati equilibri degli ecosistemi naturali, è
                    stata istituita una Commissione Tecnico Scientifica, della quale sono state chiamati a far parte
                    esperti del mondo accademico e scientifico, con l’incarico di formulare indicazioni e proposte volte
                    a garantire una corretta ed equilibrata gestione del comprensorio.

                    Già dal 1995 è stato attivato un programma di monitoraggio ambientale, che, con la partecipazione e
                    l’impegno di numerosi enti ed istituti scientifici, consente di monitorare costantemente alcuni
                    parametri ambientali. Vengono rilevati gli agenti inquinanti, la consistenza organica dei suoli, i
                    livelli della falda freatica, le caratteristiche delle acque sotterranee e della salinità, lo stato
                    di conservazione del patrimonio forestale, la consistenza delle popolazioni faunistiche, con
                    censimenti primaverili ed autunnali, anche registrando attraverso le stazioni meteorologiche i
                    valori termo-pluviometrici in relazione ai cambiamenti climatici.

                    Castelporziano viene segnalata dal mondo scientifico come un’area unica di elevato valore
                    naturalistico per l’alto livello di biodiversità, in considerazione della complessità degli
                    ecosistemi forestali, della notevole ricchezza floristica (circa 1000 specie) e faunistica (oltre
                    3000 specie) e della presenza delle piscine naturali, ambienti umidi temporanei e permanenti. Tale
                    ricchezza biologica e la presenza di numerose specie e habitat di interesse comunitario hanno
                    consentito l’inserimento di Castelporziano nella rete Natura 2000, definita dalle direttive
                    comunitarie, attraverso l’individuazione di aree SIC (Siti di Importanza Comunitaria) e ZPS (Zona di
                    Protezione Speciale).</p>

                </div>
            </div>
        </div>
    

    <!-- div piè di pagina -->
    <div class="pdp">
        <p>&amp; 2024 Castelporziano.</p>
    </div>
</body>

</html>