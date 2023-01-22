<?php 

    function updateOutilController($twig,$db){
        include_once '../src/model/ProductModel.php';  ##on inclut pour apres
        
        $idOutil=$_GET["id"];
        var_dump($idOutil);
        var_dump($_GET["page"]);

        $oneOutil=labelOneOutil($db,$idOutil);
        var_dump($oneOutil);

        echo $twig->render("updateOutil.html.twig",['Outil' => $oneOutil]);
        
    }


?>