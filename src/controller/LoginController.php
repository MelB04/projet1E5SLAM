<?php

function loginController($twig,$db){
    include_once '../src/model/ProductModel.php'; 

    $form=[];
    
    if (isset($_SESSION['auth'])) {
        header('Location: index.php');
    }

    if (isset($_POST['btnLogin'])){
        $login=$_POST['LoginLabel'];
        $password=$_POST['passwordLabel'];

        $user =checkUser($db, $login);
        var_dump($user);
        if ($user !== NULL) {
            $_SESSION['auth']['login'] =$user['email'];
            $_SESSION['auth']['role'] =$user['idRole'];
            header("Location: index.php");
        }else {
            $form['message']="identifiants erronées";
        }
    }
    echo $twig -> render("login.html.twig", ['form' => $form]);
}
    
   