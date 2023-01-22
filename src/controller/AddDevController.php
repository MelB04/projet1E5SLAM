<?php 

function addDevController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $indices=getAllIndices($db);
    $personnes= getAllPersonnes($db);
    
    if((isset($_POST['IDPersonne'])) && (isset($_POST['IDIndice'])) && (isset($_POST['btnAddDev']))){ 
        if((!empty($_POST['IDPersonne'])) && (!empty($_POST['IDIndice']))){
            $IDIndice=$_POST['IDIndice'];
            $IDPersonne=$_POST['IDPersonne'];
            saveDev($db,$IDPersonne,$IDIndice);
        }else{
            if(isset($_POST['btnAddDev'])==true){
                echo '<script language="Javascript">
                    alert ("Tu as oublié de saisir un ou des champs." )
                    </script>';
            }
        }  
    }
    echo $twig -> render("addDev.html.twig", ['indices' => $indices,"personnes" => $personnes]);

}
?>