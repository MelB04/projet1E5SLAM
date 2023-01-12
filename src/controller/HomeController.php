<?php 

function homeController($twig,$db){
    include_once '../src/model/ProductModel.php';

    $contrats=getAllContrats($db);
    $entreprises=getAllEntreprises($db);
    
    $contacts=getAllContacts($db);
    #var_dump ($contacts);

    #var_dump ($entreprises);

    $outils=GetAllOutil($db);
    #var_dump ($outils);

    echo $twig -> render("home.html.twig", ['contrats' => $contrats, 'entreprises' =>$entreprises, 'contacts' => $contacts, "outils" => $outils]);
}

?>