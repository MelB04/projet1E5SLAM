<?php 

function updateEntrepriseController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    var_dump($_POST);
    $idEntreprise=$_GET["id"];
    

    $oneEntreprise=labelOneEntreprise($db,$idEntreprise);

    if ($oneEntreprise == null){
        $_POST['entreprisenull']=true;
        echo $twig->render("updateEntreprise.html.twig",['entreprisenull' => getentreprisenull()]);
     
    }else{
        if (isset($_POST["btnEntreprise"])){
            
            updateOneEntreprise($db, $idEntreprise, $_POST["EntrepriseLabel"]);
    }
        echo $twig->render("updateEntreprise.html.twig",['nomEntreprise' => $oneEntreprise]);
    }
}

function getentreprisenull(){
    if (isset($_POST["entreprisenull"])){
        if ($_POST["entreprisenull"]){
            return true;

        }
    }else{
        return false;
    }
}


?>