<?php 

function updateIndiceController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $idIndice=$_GET["id"];
    #var_dump($idIndice);

    $oneIndice=labelOneIndice($db,$idIndice);
    #var_dump($oneIndice);

    echo $twig->render("updateIndice.html.twig",['updateIndice' => $oneIndice]);
    
}

 
?>