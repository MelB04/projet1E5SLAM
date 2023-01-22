<?php 

function updateEntrepriseController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $idEntreprise=$_GET["idEntreprise"];
    var_dump($idEntreprise);
    var_dump($_GET["page"]);

    $oneEntreprise=labelOneEntreprise($db,$idEntreprise);
    var_dump($oneEntreprise);

    echo $twig->render("updateEntreprise.html.twig",['nomEntreprise' => $oneEntreprise]);
    
}


?>