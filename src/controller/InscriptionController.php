<?php

function inscriptionController($twig,$db){
    include_once '../src/model/ProductModel.php';
    var_dump($_POST);

    if (isset($_SESSION['auth'])) {
        header('Location: index.php');
    }

    if (isset($_POST['btnAddUser']) && (isset($_POST['nomLabel'])) && (isset($_POST["prenomLabel"])) && (isset($_POST["loginLabel"])) && (isset($_POST["passwordLabel"]))) {
        
        $nom = htmlspecialchars($_POST['nomLabel']);
        $prenom = htmlspecialchars($_POST['prenomLabel']);
        $email = htmlspecialchars($_POST['loginLabel']);
        $password = htmlspecialchars($_POST['passwordLabel']);
        $idRole = 1;
        creeUser($db,$nom,$prenom,$email,$password,$idRole);
    } 

echo $twig -> render("inscription.html.twig", []);
}

    
   