<?php 

function delContratController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $contrats= getAllContrats($db);
    #var_dump($contrats);
    
    if(isset($_POST['Contrat']) && isset($_POST['btnDelContrat'])){
        $idContrat=$_POST['Contrat'];
        delContrat($db,$idContrat);

        header("Location: index.php");

    }else if (isset($_POST['btnDelPlusieursContrats'])){
        var_dump($_POST['contrat']);
        if (!empty($_POST['contrat'])){
            foreach ($_POST['contrat'] as $value){
                delContrat($db,$value);
            }

        } 
        header("Location: index.php");
    }else{
        echo $twig -> render("delContrat.html.twig", ['contrats' => $contrats]);
    }

}

?>