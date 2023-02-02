<?php 

function delPersonneController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $personnes= getAllPersonnes($db);
    
    if(isset($_POST['personne']) && isset($_POST['btnDelPersonne'])){
        $idPersonne=$_POST['personne'];
        delPersonne($db,$idPersonne);

        echo $twig -> render("home.html.twig", []);

    }else if (isset($_POST['btnDelPlusieursPersonnes'])){
        if (!empty($_POST['personne']))
            foreach ($_POST['personne'] as $value){
                delPersonne($db,$value);
            }
                  
        echo $twig -> render("home.html.twig", []);
            
    }else{
        echo $twig -> render("delPersonne.html.twig", ['personnes' => $personnes]);
    }
}

?>