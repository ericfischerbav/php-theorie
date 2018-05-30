<?php

class Benutzer {
	public $name = "";
	/*
	* Es macht Sinn, in bestimmten Fällen einige Variablen vor einem
	* externen Zugriff zu schützen, vor allem vor einem schreibenden.
	* Z.B. darf eine ID nicht verändert werden.
	*/
	private $passwort = "";
	
	/*
	* Der Konstruktor wird immer aufgerufen, wenn ein Objekt erstellt wird.
	* Der Standard-Konstruktor enthält keine Parameter, andere können
	* Parameter enthalten.
	*/
	public __construct() {}
	
	public __construct($name) {
		$this->name = $name;
	}
	
	/*
	* Damit man dennoch eine solche Variable lesen kann,
	* benötigt man eine Getter.
	*/
	public function get_passwort() {
		return $this->passwort;
	}
	
	/*
	* Im Gegensatz zu einem direkten Zugriff können wir hier
	* Bedingungen stellen, also z.B., dass das PW gehasht werden soll.
	*/
	public function set_passwort($passwort) {
		$hash = md5($passwort);
		$this->passwort = $hash;
	}
}

/*
* Hier wird ein Objekt aus der Klasse erzeugt. Enthält der Konstruktor Übergabe-
* parameter, müssen die hier mit eingegeben werden.
*/
$benutzer = new Benutzer();

/*
* Auf PUBLIC Variablen können wir direkt zugreifen. Sowohl lesend als auch
* schreibend.
*/
$benutzer->name = "Eric";

// das geht nicht!
$benutzer->get_passwort() = "12345";
// richtig:
$benutzer->set_passwort("1234");

?>