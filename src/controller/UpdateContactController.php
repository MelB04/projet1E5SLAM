<?php 

function updateContactController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres

    var_dump($_GET['id']);

    echo $twig->render("updateContact.html.twig",[]);
}  
?>