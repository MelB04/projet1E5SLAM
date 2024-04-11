<?php 

function delContactController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
        
    if(isset($_GET['contact'])){
        $idPersonne=$_GET['contact'];
        delContact($db,$idPersonne);

        header("Location: index.php");
    }
}

?>