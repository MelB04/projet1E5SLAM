<?php 

function updateEntrepriseController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $idEntreprise=$_GET["id"];
    var_dump($idEntreprise);
    var_dump($_GET["page"]);

    $oneEntreprise=labelOneEntreprise($db,$idEntreprise);
    var_dump($oneEntreprise);

<<<<<<< HEAD
    if ($oneEntreprise == null){
        $_POST['entreprisenull']=true;
        echo $twig->render("updateEntreprise.html.twig",['entreprisenull' => getentreprisenull()]);
     
    }else{
        echo $twig->render("updateEntreprise.html.twig",['nomEntreprise' => $oneEntreprise]);
    }
}

function getentreprisenull(){
    if (isset($_POST["entreprisenull"])){
        if ($_POST["entreprisenull"]){
            return true;
=======
    $entreprises = getAllEntreprises($db);
    #var_dump($entreprises);

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
        $contrats=getAllContrats($db);
>>>>>>> 43be76401aa69f2a783da3538ade77826ea3d9da

        }
    }else{
        return false;
    }
}


?>