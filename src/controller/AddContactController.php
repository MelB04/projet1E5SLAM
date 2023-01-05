<?php 
function addContactController($twig,$db){
    include_once '../src/model/ProductModel.php';

    $personnes= getAllPersonnes($db);

    if (isset($_POST['btnAddContact']) && (isset($_POST['Personne']))) {
        $IDPersonne = $_POST['Personne'];
        saveContact($db,$IDPersonne);
    }   

    echo $twig ->render ('addContact.html.twig',["personnes" => $personnes]);
}
