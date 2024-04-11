<?php 

function delPersonneController($twig,$db,$emailmdp){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    include_once '../src/model/MailModel.php';  ##on inclut pour apres
    
    $personnes= getAllPersonnes($db);

    if(isset($_POST['personne']) && isset($_POST['btnDelPersonne'])){
        $idPersonne=$_POST['personne'];

        $personne=labelOnePersonne($db,$idPersonne);
        #var_dump($personne);

        $email = new Mail(); 
        $email->envoyerMailerSupprimer($twig,$personne['Email'],'Suppression de Simpleduc',$emailmdp);

        delPersonne($db,$idPersonne);
        header("Location: index.php");

    }else if (isset($_POST['btnDelPlusieursPersonnes'])){
        if (!empty($_POST['personne'])){
            foreach ($_POST['personne'] as $value){

                $personne=labelOnePersonne($db,$value);
                #var_dump($personne);
        
                $email = new Mail(); 
                $email->envoyerMailerSupprimer($twig,$personne['Email'],'Suppression de Simpleduc',$emailmdp);
        
                delPersonne($db,$value);
            }
        }
        header("Location: index.php");
    }else{
        echo $twig -> render("delPersonne.html.twig", ['personnes' => $personnes]);
    }
}

?>