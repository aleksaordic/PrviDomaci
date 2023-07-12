<?php
include "posaljiPodatke.php";
$broker=Broker::getBroker();            // Staticke metode se pozivaju kao "Klasa::statickaMetoda()"



if(isset($_GET["metoda"])){
   
    if($_GET["metoda"]=="vratiSve"){
        
        $broker->izvrsiUpit("select * from student");           // PARALELA SA JAVOM: umesto tacke . se koristi strelica -> 
    }
    posaljiGet($broker);
}
                                                                // POST i GET su superglobalne promenljive (PHP ih sam kreira)
                                                                // POST -> ima telo zahteva
                                                                // GET  -> Unutar nje se nalaze svi podaci koje je korisnik preneo iz URL-a, nema telo zahteva (ima ?)
if(isset($_POST["metoda"])){
    if($_POST["metoda"]=="obrisi"){
        $broker->izvrsiUpit("delete from student where id=".$_POST["id"]);
    }else{
       if($_POST["metoda"]=="izmeni" ||$_POST["metoda"]=="dodaj" ){
        $ime=$_POST["ime"];
        $prezime=$_POST["prezime"];
        $indeks=$_POST["indeks"];
        if(!validanStudent($ime, $prezime, $indeks)){
            echo 'podaci nisu validni';
            exit;
        }
        if($_POST["metoda"]=="izmeni"){
            $broker->izvrsiUpit("update student set ime='".$ime."', prezime='".$prezime."', indeks='".$indeks."' where id=".$_POST["id"]);
        }else{
            if($_POST["metoda"]=="dodaj"){
                $broker->izvrsiUpit("insert into student(ime,prezime,indeks) values('".$ime."','".$prezime."','".$indeks."')");
            }
        }
       }
    }
    
    if($_POST["metoda"]=="dodajVezu"){
        $ocena=$_POST["ocena"];
        $ocenaNum=intval($ocena);
        if(!$ocenaNum || $ocenaNum<6 || $ocenaNum>10){
            echo "ocena nije validna";
            exit;
        }
        $broker->izvrsiUpit("insert into polaganje (student,ispit,ocena) values (".$_POST["student"].",".$_POST["ispit"].",".$_POST["ocena"].") ");
    }
    if($_POST["metoda"]=="obrisiVezu"){
        $broker->izvrsiUpit("delete from polaganje where student=".$_POST["student"]." and ispit=".$_POST["ispit"]);
    }
    posaljiPost($broker);
}

function validanStudent($ime, $prezime, $index)
{
    return preg_match('/^[A-Z][a-z]*$/', $ime) && preg_match('/^[A-Z][a-z]*$/', $prezime) && preg_match('/^[0-9]{4}\/[0-9]{4}$/', $index);
}



?>