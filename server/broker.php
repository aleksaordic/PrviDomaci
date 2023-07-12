<?php
class Broker{

    private $rezultat;
    public $mysqli;
    private static $broker;
   
    
    public function getError(){
        return $this->mysqli->error;
    }
    public function getRezultat(){
        return $this->rezultat;
    }


    private function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "", "student");
        $this->mysqli->set_charset("utf8");
    }


    // singleton -> broker se ne moze eksplicitno kreirati, vec se stalno poziva funkcijom getBroker()
    // Uvek tokom izvrsavanja  moze se imati najvise jedan broker
    public static function getBroker(){
        if(!isset($broker)){ 
            $broker=new Broker();
        }
        return $broker;
    }
    public function izvrsiUpit($upit){
        $this->rezultat= $this->mysqli->query($upit);
    }
  
}













// unutar jednog fajla mozes imate vise php blokova
// moze php da se pise u okviru HTML-a
// definisanje promenljivih i atributa u PHP-u se definise sa $
// spajanje stringova je sa . a ne sa +
// "$_" su superglobalne promenljive, mozemo im pristupiti iz bilo kog fajla, nigde ih nismo kreirali (najpoznatije $_POST, $_GET)
// echo je ispis tj odgovor

// include i requere se razlikuju:
    // include -> ako se desi greska, kod nastavlja da se izvrsava
    // require -> ako se desi greska, kod se na dalje NE izvrsava

    ?>