<?php

function loginController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres


    #var_dump($_POST);

    if (isset($_POST['btnPostLogin'])){
        $login=$_POST['userEmail'];
        #$password=$_POST['userPassword'];

        $user = getOneUserCredentials($db, $login); 

        if ($user != NULL) {
            $_SESSION['login'] = $user['Email'];
            $_SESSION['password'] = $user['Password'];
            echo "connecté";

        }else{
            echo "pas connecté";
        }
    }   

    echo $twig -> render("login.html.twig", []);
}