<?php 
function addContactController($twig,$db){
    include_once '../src/model/ProductModel.php';

    $personnes= getAllPersonnesPasdansContact($db);

    if (isset($_POST['btnAddContact']) && (isset($_POST['Personne']))) {
        $IDPersonne = $_POST['Personne'];
        saveContact($db,$IDPersonne);
        
        echo $twig ->render ('home.html.twig',[]);
    }
    
    if(!isset($_POST['btnAddContact'])){
        echo $twig ->render ('addContact.html.twig',["personnes" => $personnes]);
    }

}
