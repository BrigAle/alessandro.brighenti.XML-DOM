<?php
// valido i file xml tramite le regole nel file xsd
$docP = new DOMDocument();
$docP->load('../XML/prenotazioni.xml');

if ($docP->schemaValidate('../XML/prenotazioni.xsd')) {
    echo 'Il file prenotazioni è valido';
} else {
    echo 'Il file prenotazioni non è valido';
}
echo "<br>";
$docV = new DOMDocument();
$docV->load('../XML/visite.xml');
if($docV->schemaValidate('../XML/visite.xsd')){
    echo 'il file visite è valido';
}
else{
    echo 'il file visite non è valido';
}
?>