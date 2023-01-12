<?php 

function updateDevController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $idDev=$_GET["id"];

    $oneDev=labelOneDev($db,$idDev);
    var_dump($oneDev);

    $personnes= getAllPersonnesDev($db);
    $indices= getAllIndice($db);

    if(isset($_POST['btnUpdDev'])){ 
        $Indice=$_POST['IDIndice'];
        $Personne=$_GET['id'];
        
        updateDev($db,$Indice,$Personne);

        echo $twig -> render("home.html.twig", []);
    }else{
       
        if ($oneDev == null){
            $_POST['devnull']=true;
            echo $twig->render("updateDev.html.twig",['devnull' => getDevnull()]);
        
        }else{
            echo $twig->render("updateDev.html.twig",['updateDev' => $oneDev, 'indices' => $indices, 'personnes' => $personnes]);
        }
    }
}

function getDevnull(){
    if (isset($_POST["devnull"])){
        if ($_POST["devnull"]){
            return true;

        }
    }else{
        return false;
    }
}


?>