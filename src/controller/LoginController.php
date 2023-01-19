<?php

function loginController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres

    $form=[];
    #var_dump($_POST);

    if (isset($_POST['btnPostLogin'])){
        $login=$_POST['userEmail'];
        $password=$_POST['userPassword'];

        $user = getOneUserCredentials($db,$login); 
        #var_dump($user);
        
        if ($user != false) {
            if (password_verify($password,$user['Password'])) { 
                $_SESSION['login'] = $user['Email'];
                $_SESSION['password'] = $user['Password'];
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
            $form=[
                'state' => 'danger',
                'message'=>"identifiants erronés",
            ];
        }
    }   
    echo $twig -> render("login.html.twig", ['form' => $form]);
}