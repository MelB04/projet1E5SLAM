<?php 

function updateContactController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres

    $idPersonne=$_GET['idContact'];
    $updateContact= labelOneContact($db,$idPersonne);
    
    var_dump($updateContact);
    var_dump($_GET['page']);
    var_dump($_GET['idContact']);

    echo $twig->render("updateContact.html.twig",['updateContact' => $updateContact]);
    

}
 
?>