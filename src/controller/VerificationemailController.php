<?php 

function verificationemailController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres
    
    $form=[];

    $code = $_GET['code'];
    $user = getOneUserEmail($db, $_GET['email']);
    #var_dump($user);
    
    $hours = getInterval($db,$_GET['email']);
    #var_dump($user);
    #var_dump($hours);
    
    if ($user['isVerif'] == 0){
        if ($hours['interval'] < 86400){
            if ($code == $user['Code']){
                $form = [
                    'state' => 'success',
                    'message' => "Vous pouvez maintenant vous connecter !" 
                ];
                setVerification($db, $_GET['email']);
            }else{
                $form = [
                    'state' => 'danger',
                    'message' => "Erreur dans la vérification" 
                ];
            }
            echo $twig -> render("verificationemail.html.twig", [
                'form' => $form,
            ]);
        }else{
            $form = [
                'state' => 'danger',
                'message' => "Vous avez dépassé les 24h pour confirmer votre email !" 
            ];
            echo $twig -> render("verificationemail.html.twig", [
                'form' => $form,
            ]);
        }
    }else{
        $form = [
            'state' => 'success',
            'message' => "Vous avez déjà validé votre email !" 
        ];
    
        echo $twig -> render("verificationemail.html.twig", [
            'form' => $form,
        ]);
    }
}

?>