<?php
    $routes = [ 
        'home' => 'homeController',
        'erreurpdo' => 'erreurpdoController',
        'addContrat' => 'addContratController',
        'addDev' => 'addDevController',

        'addPersonne' => 'addPersonneController',
        'updatePersonne' => 'updatePersonneController',
        'delPersonne' => 'delPersonneController',

        'delContrat' => 'delContratController',
        'updateContrat' => 'updateContratController',
        "addEntreprise" => "addEntrepriseController",
        'addContact' => 'addContactController',
        "updateEntreprise" => "updateEntrepriseController",
        "addIndice" => "addIndiceController",
        "updateIndice" =>"updateIndiceController",
        "updateDev" => "updateDevController",
        "delDev" => "delDevController",

        "updateContact" => "updateContactController",
        #"deleteContact" => "deleteContactController",
        "addOutil"=> "addOutilController",
        "updateOutil"  => "updateOutilController",
        "afficherOneEntreprise" => "afficherOneEntrepriseController",


        #authentification
        'login' => "loginController",
        'register' => "registerController",
        'logout' => "logoutController",
        
    ]; //fin de tableau
?>
