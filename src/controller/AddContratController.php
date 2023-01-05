<?php 

function addContratController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $contacts= getAllContacts($db);
    #var_dump($contacts);
    $entreprises = getAllEntreprises($db);
    #var_dump($entreprises);
    
    if((isset($_POST['DateSignature'])) && (isset($_POST['CoutGlobal'])) && (isset($_POST['DateFin'])) && (isset($_POST['DateDebut'])) && (isset($_POST['Entreprise'])) && (isset($_POST['Contact'])) && (isset($_POST['btnAddContrat']))){ ##determiner si le tableau est definit btnAddProduct nom du bouton on regarde s'il existe lors d'un envoi de formulaire
        if((!empty($_POST['DateSignature'])) && (!empty($_POST['CoutGlobal'])) && (!empty($_POST['DateFin'])) && (!empty($_POST['DateDebut'])) && (!empty($_POST['Contact'])) && (!empty($_POST['Entreprise']))){
            $DateSignature = htmlspecialchars($_POST['DateSignature']);
            $CoutGlobal = htmlspecialchars($_POST['CoutGlobal']);
            $DateFin = htmlspecialchars($_POST['DateFin']);
            $DateDebut = htmlspecialchars($_POST['DateDebut']);
            if(empty($CoutGlobal)){
                $CoutGlobal=0.00;  
            }
            $Contact=$_POST['Contact'];
            $Entreprise=$_POST['Entreprise'];

            #var_dump($Contact);

            saveContrat($db,$DateSignature,$CoutGlobal,$DateFin,$DateDebut,$Contact,$Entreprise);
        }else{
            if(isset($_POST['btnAddContrat'])==true){
                echo '<script language="Javascript">
                    alert ("Tu as oublié de saisir un ou des champs." )
                    </script>';
            }
        }
    }
    echo $twig -> render("addContrat.html.twig", ['entreprises' => $entreprises, 'contacts' => $contacts]);
}

?>