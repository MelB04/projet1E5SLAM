<?php
    function addOutilController($twig,$db){
        include_once '../src/model/ProductModel.php';
    
        if (isset($_POST['btnAddOutil']) && (isset($_POST['OutilLabel']))  && (isset($_POST['OutilVersion']))) {
            $libelle = htmlspecialchars($_POST['OutilLabel']);
            $version = htmlspecialchars($_POST['OutilVersion']);
            saveOutil($db,$libelle,$version);
        }   
    
        echo $twig ->render ('addOutil.html.twig',[]);
    }




?>