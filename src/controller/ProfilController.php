<?php

function profilController($twig, $db){ 
    include_once '../src/model/ProductModel.php'; 

    $user = null;
    $switch=false;

    if (((isset($_SESSION['auth']['login']))) ) {

        if (isset($_GET['user'])){
            if ($_SESSION['auth']['role'] == 2){
                $adminvoiruser = getOneUserCredentials($db, $_GET['user']);
                if($adminvoiruser != NULL){
                    $u=$_GET['user'];
                    $ui=$adminvoiruser['IDPersonne']; 
                    $switch=true;
                }else{
                    header("Location: index.php?page=profil");
                }
            }else{
                header("Location: index.php?page=profil");
            }
        }else{
            $u=$_SESSION['auth']['login'];
            $ui=$_SESSION['auth']['id'];
        }
        
        $user = getOneUserCredentials($db, $u); 
        $userrole = getOneRoleUser($db, $u); 
        $userDev = getPersonneDev($db, $u);
        $devOutil = getOutilOnePersonne($db, $u);

        $derniereequipe=getDerniereEquipe($db,$ui);
        #var_dump($derniereequipe);

        $membreequipe = NULL;
        $dernierprojet = NULL;
        $tachesprojet = NULL;

        if ($derniereequipe['IDEquipe'] != NULL){
            $membreequipe = getMembreGroupe($db,$derniereequipe['IDEquipe']);
            #var_dump($membreequipe);

            $dernierprojet=getdernierProjet($db, $derniereequipe['IDEquipe']);
            #var_dump($dernierprojet);

            $tachesprojet=gettacheprojet($db, $dernierprojet['IDModule']);
            #var_dump($tachesprojet);
        }
  
    }

    echo $twig->render('profil.html.twig', [ 
        'user' => $user,
        'switch' => $switch,
        'userrole' => $userrole,
        'userdev' => $userDev,
        'Outils' => $devOutil,
        'derniereequipe' => $derniereequipe,
        'membresequipe' => $membreequipe,
        'dernierprojet' => $dernierprojet,
        'tachesprojet' => $tachesprojet,
    ]); 

}