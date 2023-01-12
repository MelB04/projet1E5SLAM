<?php 
function addIndiceController($twig,$db){
    include_once '../src/model/ProductModel.php';

    if (isset($_POST['btnAddIndice']) && (isset($_POST['Indice']))) {
        $Indice = htmlspecialchars($_POST['Indice']);
        saveIndice($db,$Indice);
    }   
    
    echo $twig ->render ('addIndice.html.twig',[]);
}