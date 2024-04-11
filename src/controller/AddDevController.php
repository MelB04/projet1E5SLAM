<?php 

function addDevController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $form=[];

    $indices=getAllIndices($db);
    $personnes= getAllPersonnesPasdansDev($db);
    
    if((isset($_POST['IDPersonne'])) && (isset($_POST['IDIndice'])) && (isset($_POST['btnAddDev']))){ 
        if((!empty($_POST['IDPersonne'])) && (!empty($_POST['IDIndice']))){
            $IDIndice=$_POST['IDIndice'];
            $IDPersonne=$_POST['IDPersonne'];
            saveDev($db,$IDPersonne,$IDIndice);

            $form = [
                'state' => 'success',
                'message' => 'Le développeur a bien été ajouté !'
                ];
        }else{
            if(isset($_POST['btnAddDev'])==true){
                $form = [
                    'state' => 'danger',
                    'message' => 'Manque d\'informations !'
                    ];
            }
        }  
    }
    echo $twig -> render("addDev.html.twig", ['indices' => $indices,"personnes" => $personnes, 'form' => $form]);

}
?>