<?php 

function updateOutilController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    var_dump($_POST);
    $idOutil=$_GET["id"];
    $change=labelOneOutil($db,$idOutil);
    

    $oneOutil=labelOneOutil($db,$idOutil);

    if ($oneOutil == null){
        $_POST['outilnull']=true;
        echo $twig->render("updateOutil.html.twig",['outilnull' => getoutilnull()]);
     
    }else{
        if (isset($_POST["btnUpdOutil"])){
            $code=$_GET["id" ];
            $label=$_POST["OutilLabel" ];
            $version=$_POST["OutilVersion" ];
            updateOneOutil($db, $code,$label, $version);
    }
        echo $twig->render("updateOutil.html.twig",['Outil' => $oneOutil]);
    }
}

function getoutilnull(){
    if (isset($_POST["outilnull"])){
        if ($_POST["outilnull"]){
            return true;

        }
    }else{
        return false;
    }
}



?>