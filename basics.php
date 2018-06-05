<?php 
; // Ein Semikolon beendet einen Befehl. Das hier ist der einfachste Befehl: Er tut gar nichts, ist allerdings korrekt.

{
  // Ein Block darf immer geschrieben werden, hat so aber keinen Nutzen. Relevant wird das bei if/while etc.
}
?>

<div <?php echo 'id="hallo"'; // PHP-Blöcke dürfen überall im Dokument stehen, auch um HTML-Attribute zu erzeugen. ?>>

<?php 
// Variablen

// keine Datentypen
$var1 = "hallo";
/*
 * Variablen sind im kompletten Dokument nach ihrer
 * Deklaration gültig.
 */
?>

<?php 
// Kontrollstrukturen
$a = 3;

if($a == 1 /* hier muss ein logischer Ausdruck stehen*/) {
    // wird nur ausgeführt, wenn der Ausdruck wahr ist
} elseif($a <= 3) {
    // zusätzliche Bedingung
} else {
  // wird nur ausgeführt, wenn kein vorheriger Block ausgeführt wurde
}

while($a <= 5) {
    // solange $a kleiner gleich 5 ist, tue das
}

for($i = 0 /* Variable einführen*/; $i == 5 /* Abbruchbedingung */; $i++ /* wird bei jeder Iteration ausgeführt */) {
    
}

foreach($array /* Array */ as $element /* Variable für das Element, das in einem Durchlauf betrachtet wird */) {
    
}

?>

<?php 
// Arrays

// Array erstellen
$array = array();

// Element hinzufügen (hinten anhängen)
$array[] = "Alpha";

// Element an Index hinzufügen
$array[4] = "Hallo";

// Element lesen
echo $array[0]; // Wichtig: Index muss angegeben werden

// assiotiativen Array (!)
$as_ar = array();

$as_ar["greeting"] = "Hallo";

$as_ar2 = array("greeting" /* Key */ => "Hallo" /* Value */, "end" => "Tschüss");

echo $as_ar2["greeting"]; // zum lesen Key angeben

// spezielle Arrays

/*
 * angenommen, Formular hat folgendes Feld:
 * <input type="text" name="greeting" />
 * 
 * name => KEY
 * Benutzereingabe => VALUE
 */

/*
 *  Enthält die Daten, die mit method="get" gesendet wurden. Wurden die Daten
 *  mit method="post" gesendet, dann steht hier nichts drin.
 *  
 *  Manuell sollte hier nichts zugewiesen werden.
 */
$_GET["greeting"];

/*
 *  Enthält die Daten, die mit method="post" gesendet wurden. Wurden die Daten
 *  mit method="get" gesendet, dann steht hier nichts drin.
 *  
 *  Manuell sollte hier nichts zugewiesen werden.
 */
$_POST["greeting"];

// manuelle Zuweisung
$_SESSION["user"] = "alfred";

?>

<?php 
// SESSION
/*
 * Die Session speichert Daten über verschiedene PHP-Dateien hinweg.
 * Dafür werden Cookies auf dem Gerät des Anwenders gespeichert. Will man
 * Daten nur zwischen zwei Seiten austauschen, ist es sinnvoller, sie mit POST
 * oder GET zu übermitteln (<input type="hidden" value="..." />). Hauptanwendung
 * ist hier z.B. der Login.
 */

// Erzeugt Session oder ruft die vorhandene ab
session_start(); // ohne session_start() kein $_SESSION --> Muss auf jeder Seite neu gemacht werden

echo $_SESSION["var"];

// Session wegwerfen --> Alles, was in Session gespeichert war geht verloren
session_destroy(); // --> nur ein Mal beim Logout

?>

<?php 
// Funktionen
/*
 * Funktionen dienen dazu, Redundanz im Code zu vermeiden. Soll ein bestimmter Code 5x
 * ausgeführt werden, kann man hierfür eine Funktion deklarieren, die dann nur noch aufgerufen wird,
 * anstatt den Code 5x zu kopieren.
 */

// Deklaration
function say_hello($parameter1 /* keinen Default, immer am Anfang */, $parameter2 = "Gerhard" /* hat Default, muss beim Aufruf nicht angegeben werden */) {
    echo $parameter1 + " " + $parameter2;
}

// Funktion aufrufen
say_hello("Hallo", "Kathleen");
// oder auch, wegen default
say_hello("Hallo");

// Aufruf überall möglich
variable();

// Gültigkeit von Variablen in einer Funktion
function variable() {
    $var = 1; // innerhalb einer Funktion deklariert --> nur innerhalb gültig, gleiches gilt für Parameter
    // auch externe Variablen können ohne weiteres nicht in der Funktion verwendet werden
    // nutze die globale, "außerhalb deklarierte Variable".
    global $connection;
    // Falls ein Ergebnis aus der Funktion verwendet werden soll,
    // müssen wir den zurückgeben
    return $var;
}
?>

<?php 
// Datenbankzugriffe

// Datenbankverbindung aufbauen
$connection /* Rückgabe: Objekt vom Typ Connection (oder false falls keine Verbindung möglich) */ = mysqli_connect("localhost" /* Host */, "root" /* User */, "1234567" /* Passwort */, /* Optional: noch Datenbankname*/ "chat");
// Datenbank auswählen
mysqli_selectdb($connection, "webdb");

$select = "SELECT * FROM benutzer"; // nur String, es wird noch nichts ausgeführt

// mit mysqli_query wird jeder SQL ausgeführt
$result /* Rückgabe: Objekt vom Typ Result oder false falls Fehler oder nichts gefunden */ = mysqli_query($connection /* DB-Verbindung */, $select /* SQL-Befehl als String */);

// ist ein Fehler passiert?
if($result == false) /* ist kein Fehler passiert: if($result != false) */ {
    // ...
} else {
    // Ergebnisse aus der Datenbank auswerten (eine Zeile)
    $row /* Rückgabe: assiotiativer Array (!) */ = mysqli_fetch_assoc($result); // holt einzelne Zeile aus Result
    // angenommen benutzer-Tabelle hat Attribute    | Name | Alter | Passwort | Geschlecht |
    // Inhalt von $row                              | Nina | 20    | 1234556  | weiblich   |
    // einzelnen Wert abfragen --> mit Spaltenname
    echo $row["Geschlecht"];
    
    // mit mehreren Zeilen aus der Datenbank
    while($row = mysqli_fetch_assoc($result)) { // Übersetzt: Solange du Zeilen im Result findest, führe folgendes aus
        echo $row["name"];
    }
}

?>

<?php 
// Besonderes
header("Location: naechste-seite.php");
exit();

// prüfen, ob eine Variable gesetzt ist
if(isset($_POST["b1"])) {
    //...
}
?>