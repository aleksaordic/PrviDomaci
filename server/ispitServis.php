<?php
include "posaljiPodatke.php";
$broker=Broker::getBroker();
if(isset($_GET["metoda"])){
   
    if($_GET["metoda"]=="vrati sve"){
        
        
        $broker->izvrsiUpit("select * from ispit");
    }if($_GET["metoda"]=="vrati od studenta"){
        
        $broker->izvrsiUpit("SELECT i.*, p.ocena AS 'ocena' FROM ispit i INNER JOIN polaganje p ON (p.ispit=i.id) where p.student=".$_GET['student']); // spajamo tabele *INNER JOIN*
    }
    posaljiGet($broker);
}

if(isset($_POST["metoda"])){
    if($_POST["metoda"]=="obrisi"){
        $broker->izvrsiUpit("delete from ispit where id=".$_POST["id"]);
    }else{
        $naziv=$_POST["naziv"];
        $semestar=$_POST["semestar"];
        if(!isset($naziv) || !isset($semestar) || trim($naziv)=="" || trim($semestar)==""){
            echo 'podaci nisu validni';
            exit;
        }
        if($_POST["metoda"]=="izmeni"){
            $broker->izvrsiUpit("update ispit set naziv='".$naziv."', semestar='".$semestar."' where id=".$_POST["id"]);
        }else{
            if($_POST["metoda"]=="dodaj"){
                $broker->izvrsiUpit("insert into ispit(naziv,semestar) values('".$naziv."','".$semestar."')");
            }
        }
    }


    posaljiPost($broker);
}


?>
