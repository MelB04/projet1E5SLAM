<?php 

function homeController($twig,$db){
    include_once '../src/model/ProductModel.php';

    $contrats=getAllContrats($db);
    $entreprises=getAllEntreprises($db);
    $Indices=getAllIndices($db);

    $contacts=getAllContacts($db);
    #var_dump ($contacts);
    #var_dump ($Indices);
    #var_dump ($entreprises);


    echo $twig -> render("home.html.twig", ['contrats' => $contrats, 'entreprises' =>$entreprises, 'contacts' => $contacts, 'Indices' =>$Indices]);
}

?>