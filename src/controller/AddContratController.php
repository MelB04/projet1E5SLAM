<?php 

function addContratController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $form=[];
    $contacts= getAllContacts($db);
    #var_dump($contacts);
    $entreprises = getAllEntreprises($db);
    #var_dump($entreprises);
    
    if((isset($_POST['DateSignature'])) && (isset($_POST['CoutGlobal'])) && (isset($_POST['DateFin'])) && (isset($_POST['DateDebut'])) && (isset($_POST['Entreprise'])) && (isset($_POST['Contact'])) && (isset($_POST['btnAddContrat']))){ 
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

            $form = [
                'state' => 'success',
                'message' => 'Le contrat a bien été ajouté !'
                ];

            saveContrat($db,$DateSignature,$CoutGlobal,$DateFin,$DateDebut,$Contact,$Entreprise);

        }else{
            if(isset($_POST['btnAddContrat'])==true){
                $form = [
                    'state' => 'danger',
                    'message' => 'Manque d\'informations !'
                    ];
            }
        }
    }
    echo $twig -> render("addContrat.html.twig", ['entreprises' => $entreprises, 'contacts' => $contacts, 'form' => $form]);
}

?>