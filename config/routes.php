<?php
    $routes = [ 
        'home' => 'homeController:0',
        'erreurpdo' => 'erreurpdoController:0',
        'addContrat' => 'addContratController:2',
        'addDev' => 'addDevController:2',

        'addPersonne' => 'addPersonneController:2',
        'updatePersonne' => 'updatePersonneController:2',
        'delPersonne' => 'delPersonneController:2',

        'delContrat' => 'delContratController:2',
        'updateContrat' => 'updateContratController:2',
        "addEntreprise" => "addEntrepriseController:2",
        'addContact' => 'addContactController:2',
        "updateEntreprise" => "updateEntrepriseController:2",
        "addIndice" => "addIndiceController:2",
        "updateIndice" =>"updateIndiceController:2",
        "updateDev" => "updateDevController:2",
        "delDev" => "delDevController:2",

        "updateContact" => "updateContactController:2",
        #"deleteContact" => "deleteContactController",
        "addOutil"=> "addOutilController:2",
        "updateOutil"  => "updateOutilController:2",
        "afficherOneEntreprise" => "afficherOneEntrepriseController:2",

        #authentification
        'login' => "loginController:0",
        'register' => "registerController:0",
        'logout' => "logoutController:0",
        'verificationemail' => "verificationemailController:0",

        'profil' => 'profilController:1',
        'updateMdp' => 'updateMdpController:1',
        'addMaitriser' => 'addMaitriserController:1',
        'delMaitriser' => 'delMaitriserController:1',
        
        #email
    ]; //fin de tableau
?>
