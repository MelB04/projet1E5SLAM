<?php

function updateMdpController($twig, $db) { 
    include_once '../src/model/ProductModel.php'; 
 
    $form=[];

    $user = getOneUserCredentials($db, $_SESSION['auth']['login']); 

    if (isset($_POST['btnUpdateMdp'])) {
        $passwordactu = htmlspecialchars($_POST['actupassword']);
        $passwordnew = htmlspecialchars($_POST['newpassword']);
        $passwordConfirm = htmlspecialchars($_POST['confnewpassword']);

        if ((!empty($passwordactu)) && (!empty($passwordnew)) && (!empty($passwordConfirm))){
            if (password_verify($passwordactu, $user['Password'])){
                if ($passwordnew == $passwordConfirm){
                    if (strlen($passwordnew) >= 3){ 
                        updateMdp($db, $_SESSION['auth']['login'], password_hash($passwordnew, PASSWORD_DEFAULT));
                        $form = [
                            'state' => 'success',
                            'message' => 'Votre mot de passe a bien été modifié !'
                        ];
                    }else{
                        $form = [
                            'state' => 'danger',
                            'message' => 'Votre nouveau mot de passe est trop court !'
                        ];
                    }
                }else{
                    $form = [
                        'state' => 'danger',
                        'message' => 'Votre nouveau mot de passe n\'a pas été bien confirmé !'
                    ];
                }
            }else{
                $form = [
                    'state' => 'danger',
                    'message' => 'Erreur dans le mot de passe actuel !'
                ];
            }
        }else{
            $form = [
                'state' => 'danger',
                'message' => 'L\'utilisateur n\'a pas été modifié car toutes champs obligatoires n\'ont pas été remplis !'
            ];
        } 
    } 
    echo $twig->render('updateMdp.html.twig', [ 
        'form' => $form,
    ]);

}

?>