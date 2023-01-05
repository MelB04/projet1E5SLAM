<?php 

function delContratController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $contrats= getAllContrats($db);
    #var_dump($contrats);
    
    if(isset($_POST['Contrat']) && isset($_POST['btnDelContrat'])){ ##determiner si le tableau est definit btnAddProduct nom du bouton on regarde s'il existe lors d'un envoi de formulaire
        $idContrat=$_POST['Contrat'];
        delContrat($db,$idContrat);
        $contrats=getAllContrats($db);

        echo $twig -> render("home.html.twig", ['contrats' => $contrats]);
    }else{
        echo $twig -> render("delContrat.html.twig", ['contrats' => $contrats]);
    }

}

?>