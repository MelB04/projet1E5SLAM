<?php 

function delContratController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $contrats= getAllContrats($db);
    #var_dump($contrats);
    
    if(isset($_POST['Contrat']) && isset($_POST['btnDelContrat'])){
        $idContrat=$_POST['Contrat'];
        delContrat($db,$idContrat);

        $contrats=getAllContrats($db);

        $entreprises=getAllEntreprises($db);
        echo $twig -> render("home.html.twig", ['contrats' => $contrats, 'entreprises' =>$entreprises]);

    }else if (isset($_POST['btnDelPlusieursContrats'])){
        var_dump($_POST['contrat']);
        if (!empty($_POST['contrat']))
            foreach ($_POST['contrat'] as $value){
                delContrat($db,$value);
            }
            $contrats=getAllContrats($db);
            $entreprises=getAllEntreprises($db);        
            echo $twig -> render("home.html.twig", ['contrats' => $contrats, 'entreprises' =>$entreprises]);
            
    }else{
        echo $twig -> render("delContrat.html.twig", ['contrats' => $contrats]);
    }




}

?>