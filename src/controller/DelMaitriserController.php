<?php 

function delMaitriserController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
        
    $idPersonne=$_SESSION['auth']['id'];
    $code=$_GET['idCode'];
    delMaitriser($db,$idPersonne,$code);

    header("Location: index.php?page=profil");

}

?>