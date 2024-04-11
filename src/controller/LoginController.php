<?php

function loginController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres

    $form=[];
    #var_dump($_POST);

    if (isset($_SESSION['auth'])) { 
        header('Location: index.php');
    }

    if (isset($_POST['btnPostLogin'])){
        $login=$_POST['userEmail'];
        $password=$_POST['userPassword'];

        $user = getOneUserCredentials($db,$login); 
        #var_dump($user);
        
        if ($user != false) {
            if ($user['isVerif'] != 0){
                if (password_verify($password,$user['Password'])) { 
                    $_SESSION['auth']['id'] = $user['IDPersonne'];
                    $_SESSION['auth']['login'] = $user['Email'];
                    #$_SESSION['auth']['password'] = $user['Password'];
                    $_SESSION['auth']['role'] = $user['idRole'];
                    $form = [
                        'state' => 'success',
                        'message' => "Connexion réussie !" 
                    ];
                    header("Location: index.php");

                } else { 
                    $form = [
                        'state' => 'danger',
                        'message' => "Vos informations de connexion sont incorrects !" 
                    ];
                }
            }else{
                $form = [
                    'state' => 'danger',
                    'message' => "Vous ne pouvez pas vous connecter vous n'avez pas encore confirmer votre email." 
                ];
            }
        }else{
            $form=[
                'state' => 'danger',
                'message'=>"identifiants erronés",
            ];
        }
    }   
    echo $twig -> render("login.html.twig", ['form' => $form]);
}