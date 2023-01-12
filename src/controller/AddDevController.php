<?php 

function addDevController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $indices=getAllIndices($db);
    $personnes= getAllPersonnes($db);
    
    if((isset($_POST['IDPersonne'])) && (isset($_POST['IDIndice'])) && (isset($_POST['btnAddDev']))){ 
        $IDIndice=$_POST['IDIndice'];
        $IDPersonne=$_POST['IDPersonne'];
        saveDev($db,$IDPersonne,$IDIndice);
        
    }
    echo $twig -> render("addDev.html.twig", ['indices' => $indices,"personnes" => $personnes]);

}
?>