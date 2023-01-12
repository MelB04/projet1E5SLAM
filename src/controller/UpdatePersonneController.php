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

        if ($updatePersonne == NULL){
            $_POST['personnenull']=true;
            echo $twig->render("updatePersonne.html.twig",['personnenull' => getErrorPersonnenull()]);

        }else{
            echo $twig->render("updatePersonne.html.twig",['updatePersonne' => $updatePersonne]);
        }

    }
}

function getErrorPersonnenull() {
    if (isset($_POST['personnenull'])){
        if ($_POST['personnenull']){
            return true;
        }
    } else return false;
}
?>