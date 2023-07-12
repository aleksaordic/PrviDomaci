<?php

include "broker.php";                               
function posaljiGet($broker){
    $rezultat=$broker->getRezultat();
    $response=array();
   
    
    if(!$rezultat){                                 // !rezultat znaci da je "rezultat NULL", i PHP tumaci to NULL kao FALSE
        $response["status"]="greska";
        $response['error']=$broker->getError();
        
    }else{
        $response["status"]="ok";
        $response["data"]=array();
        while($red=$rezultat->fetch_object()){      // fetch_object() => iz nekog select-a uzima red po red dok ne vidi da nema sledece n-torke pa onda izlazi iz petlje 
            $response["data"][]=$red;               //$response["data"][] je niz, a kad kazemo "$response["data"][]=$red" znaci da na kraju tog niza stavljamo objekat $red
        }
    }
    echo json_encode($response);                   // json_encode pretvara vrednost koju dobija u String (koji ce biti u JSON formatu) 
                                                                                                         //---> moze se lepo videti na Inspect / Network / *fajl* / Preview
                                                                                                         //---> Koristi se za slanje kroz mrezu
}
function posaljiPost($broker)
{
    if(!$broker->getRezultat()){
        echo $broker->getError();
    }else{
        echo "ok";
    }
}

?>