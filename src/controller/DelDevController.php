<?php 

function delDevController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $devs= getAllDev($db);
    
    if(isset($_POST['dev']) && isset($_POST['btnDelDev'])){
        $idDev=$_POST['dev'];
        delDev($db,$idDev);

        header("Location: index.php");

    }else if (isset($_POST['btnDelPlusieursDevs'])){
        if (!empty($_POST['dev'])){
            foreach ($_POST['dev'] as $value){
                delDev($db,$value);
            }
            
        }
        header("Location: index.php");
    }else{
        echo $twig -> render("delDev.html.twig", ['devs' => $devs]);
    }
}

?>