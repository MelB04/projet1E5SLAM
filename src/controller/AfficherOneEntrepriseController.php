<?php 

function afficherOneEntrepriseController($twig,$db){
    include_once '../src/model/ProductModel.php';

    $idEntreprise = $_GET['idEntreprise']; 

    $OneEntreprise=afficherOneEntreprise($db,$idEntreprise);
    #var_dump($OneEntreprise);

    echo $twig -> render("afficherOneEntreprise.html.twig", ['entreprise' => $OneEntreprise]);
}

?>