<?php 

function homeController($twig,$db){
    include_once '../src/model/ProductModel.php';

    $contrats=getAllContrats($db);

    echo $twig -> render("home.html.twig", ['contrats' => $contrats]);
}

?>