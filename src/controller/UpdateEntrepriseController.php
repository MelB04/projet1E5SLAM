<?php 

function updateEntrepriseController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $idEntreprise=$_GET["id"];
    var_dump($idEntreprise);
    var_dump($_GET["page"]);

    $oneEntreprise=labelOneEntreprise($db,$idEntreprise);
    var_dump($oneEntreprise);

    if ($oneEntreprise == null){
        $_POST['entreprisenull']=true;
        echo $twig->render("updateEntreprise.html.twig",['entreprisenull' => getentreprisenull()]);
     
    }else{
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