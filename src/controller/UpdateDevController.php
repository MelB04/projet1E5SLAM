<?php 

function updateDevController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $idDev=$_GET["id"];

    $oneDev=labelOneDev($db,$idDev);
    var_dump($oneDev);

    $personnes= getAllPersonnes($db);
    $indices= getAllIndices($db);

    if(isset($_POST['btnUpdDev'])){ 
        $Indice=$_POST['IDIndice'];
        $Personne=$_GET['id'];
        
        updateDev($db,$Indice,$Personne);

        echo $twig -> render("home.html.twig", []);
    }else{
       
        echo $twig->render("updateDev.html.twig",['updateDev' => $oneDev, 'indices' => $indices, 'personnes' => $personnes]);
        
    }
}


?>