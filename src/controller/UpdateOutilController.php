<?php 

    function updateOutilController($twig,$db){
        include_once '../src/model/ProductModel.php';  ##on inclut pour apres
        
        $idOutil=$_GET["id"];
        var_dump($idOutil);
        var_dump($_GET["page"]);

        $oneOutil=labelOneOutil($db,$idOutil);
        var_dump($oneOutil);

        if ($oneOutil == null){
            $_POST['outilnull']=true;
            echo $twig->render("updateOutil.html.twig",['outilnull' => getOutilnull()]);
        
        }else{
            echo $twig->render("updateOutil.html.twig",['Outil' => $oneOutil]);
        }
    }

    function getOutilnull(){
        if (isset($_POST["outilnull"])){
            if ($_POST["outilnull"]){
                return true;

            }
        }else{
            return false;
        }
    }


?>