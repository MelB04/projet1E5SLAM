<?php 

function updateContratController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    $updateContrat= labelOneContrat($db,$_GET['id']);
    $contacts= getAllContacts($db);
    $entreprises = getAllEntreprises($db);
    
    if(isset($_POST['btnUpdContrat'])){ 
        $IDContrat = $_GET['id']; 
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
        header("Location: index.php");
    }else{
        echo $twig->render("updateContrat.html.twig",
            ['updateContrat' => $updateContrat, 
            'contacts' => $contacts, 
            'entreprises' => $entreprises]);  
    }
}
