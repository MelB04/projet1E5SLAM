<?php 

function updateContratController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $updateContrat= labelOneContrat($db,$_GET['id']);
    #var_dump($updateContrat);

    $contacts= getAllContacts($db);
    #var_dump($contacts);

    $entreprises = getAllEntreprises($db);
    #var_dump($entreprises);
    
    if(isset($_POST['btnUpdContrat'])){ ##determiner si le tableau est definit btnAddProduct nom du bouton on regarde s'il existe lors d'un envoi de formulaire
        $IDContrat = $_GET['id']; ##htmlspecialchars eviter d'executer du cote malvaillant
        $DateSignature = htmlspecialchars($_POST['DateSignature']);
        $CoutGlobal = htmlspecialchars($_POST['CoutGlobal']);
        $DateFin = htmlspecialchars($_POST['DateFin']);
        $DateDebut = htmlspecialchars($_POST['DateDebut']);
        if(empty($CoutGlobal)){
            $CoutGlobal=0.00;  
        }
        $Contact=$_POST['Contact'];
        $Entreprise=$_POST['Entreprise'];
        
        updateContrat($db,$IDContrat,$DateSignature,$CoutGlobal,$DateFin,$DateDebut,$Contact,$Entreprise);
        $contrats=getAllContrats($db);

        echo $twig -> render("home.html.twig", ['contrats' => $contrats]);
    }else{
        echo $twig->render("updateContrat.html.twig",['updateContrat' => $updateContrat, 'contacts' => $contacts, 'entreprises' => $entreprises]);
    }
}

?>