<?php 

function updateIndiceController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $idIndice=$_GET["id"];
    var_dump($idIndice);

    $oneIndice=labelOneIndice($db,$idIndice);
    var_dump($oneIndice);

    if ($oneIndice == null){
        $_POST['indicenull']=true;
        echo $twig->render("updateIndice.html.twig",['indicenull' => geterrorIndicenull()]);     
    }else{
        echo $twig->render("updateIndice.html.twig",['updateIndice' => $oneIndice]);
    }
}

function geterrorIndicenull(){
    if (isset($_POST["indicenull"])){
        if ($_POST["indicenull"]){
            return true;
        }
    }else{
        return false;
    }
}
 
?>