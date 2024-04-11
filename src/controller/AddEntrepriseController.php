<?php 
function addEntrepriseController($twig,$db){
    include_once '../src/model/ProductModel.php';

    if (isset($_POST['btnAddEntreprise']) && (isset($_POST['EntrepriseLabel']))) {
        $nom = htmlspecialchars($_POST['EntrepriseLabel']);
        saveEntreprise($db,$nom);

        header("Location: index.php?page=addEntreprise");
    }   

    echo $twig ->render ('addEntreprise.html.twig',[]);
}
