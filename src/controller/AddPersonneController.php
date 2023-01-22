<?php 
function addPersonneController($twig,$db){
    include_once '../src/model/ProductModel.php';


    if((isset($_POST['btnAddPersonne']) && (isset($_POST['PrenomPersonne'])) && (isset($_POST['NomPersonne'])))){ 
        if((!empty($_POST['PrenomPersonne'])) && (!empty($_POST['NomPersonne']))){
            $nom = htmlspecialchars($_POST['NomPersonne']);
            $prenom = htmlspecialchars($_POST['PrenomPersonne']);
            savePersonne($db,$nom,$prenom);
        }else{
            if(isset($_POST['btnAddPersonne'])==true){
                echo '<script language="Javascript">
                    alert ("Tu as oublié de saisir un ou des champs." )
                    </script>';
            }
        }  
    }
    echo $twig ->render ('addPersonne.html.twig',[]);
}
