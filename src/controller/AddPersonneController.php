<?php 
function addPersonneController($twig,$db){
    include_once '../src/model/ProductModel.php';

    if (isset($_POST['btnAddPersonne']) && (isset($_POST['PrenomPersonne'])) && (isset($_POST['NomPersonne']))) {
        $nom = htmlspecialchars($_POST['NomPersonne']);
        $prenom = htmlspecialchars($_POST['PrenomPersonne']);
        savePersonne($db,$nom,$prenom);
    }   

    echo $twig ->render ('addPersonne.html.twig',[]);
}
