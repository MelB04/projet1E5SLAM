<?php 
function addMaitriserController($twig,$db){
    include_once '../src/model/ProductModel.php';

    $allOutil=GetAllOutil($db);
    $devOutil = getOutilOnePersonne($db, $_SESSION['auth']['login']);
    $form = [];

    if (isset($_POST['btnAddMaitriser']) && (isset($_POST['IDOutil']))) {
        if((!empty($_POST['IDOutil']))){
            $outil = $_POST['IDOutil'];
            #var_dump($outil);
            saveMaitriser($db,$_SESSION['auth']['id'], $outil);

            $form = [
                'state' => 'success',
                'message' => 'La compétence vous a bien été ajouté !'
                ];    
        }else{
            if(isset($_POST['btnAddMaitriser'])==true){
                $form = [
                    'state' => 'danger',
                    'message' => 'Manque d\'informations !'
                    ];
            }
        }
    }

    $OutilsNon=array();
    foreach ($allOutil as &$outils) {
        if (in_array($outils, $devOutil) != true) {
            array_push($OutilsNon,$outils);
        }
    } 

    echo $twig ->render ('addMaitriser.html.twig',[
        'outils' => $OutilsNon,
        'outilsdev' => $devOutil,
        'form' => $form,
    ]);
}