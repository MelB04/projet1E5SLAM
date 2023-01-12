<?php 

function homeController($twig,$db){
    include_once '../src/model/ProductModel.php';

    $contrats=getAllContrats($db);

    $entreprises=getAllEntreprises($db);

    var_dump ($entreprises);

    echo $twig -> render("home.html.twig", ['contrats' => $contrats, 'entreprises' =>$entreprises]);
}

?>