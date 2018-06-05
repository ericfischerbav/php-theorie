<?php 
// Beispiel: Benutzer registriert sich

include "class.php";

$name = "Gerhard"; // angenommen es ist per POST übermittelt worden, normalerweise etwas wie $_POST["name"]
$pw = "123456"; // angenommen es ist per POST übermittelt worden

$benutzer_objekt = new Benutzer($name);
$benutzer_objekt->set_passwort($pw);

$benutzer_objekt->benutzer_speichern();
?>