<?php 

function updatePersonneController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $idPersonne=$_GET['id'];
    $updatePersonne= labelOnePersonne($db,$idPersonne);
    
    if(isset($_POST['btnUpdPersonne'])){ 
        $IDPersonne = $_GET['id']; 
        $nom = htmlspecialchars($_POST['NomPersonne']);
        $prenom = htmlspecialchars($_POST['PrenomPersonne']);
        
        updatePersonne($db,$IDPersonne,$nom,$prenom);

        echo $twig -> render("home.html.twig", []);
    }else{
        
        echo $twig->render("updatePersonne.html.twig",['updatePersonne' => $updatePersonne]);

    }
}
?>