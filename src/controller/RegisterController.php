<?php 

use PHPMailer\PHPMailer\PHPMailer;

function registerController($twig,$db,$emailmdp){
    include_once '../src/model/ProductModel.php'; 
    include_once '../src/model/MailModel.php'; 
    $form = [];
    
    if (isset($_SESSION['auth'])) { 
        header('Location: index.php');
    }
    
    if (isset($_POST['btnPostRegister'])){

        $useremail = $_POST['userEmail'];
        $password = $_POST['userPassword'];
        $passwordConfirm = $_POST['userPasswordConfirm']; 
        $lastname = $_POST['userLastname'];
        $firstname = $_POST['userFirstname'];

        if ((!empty($useremail)) && (!empty($password)) && (!empty($passwordConfirm)) && (!empty($lastname)) && (!empty($firstname))){
            if (getOneUserEmail($db, $useremail) == NULL) { 
                if ($password === $passwordConfirm) {
                    $code=uniqid($prefix = "");
                    #var_dump($code);
                    saveUser($db, $useremail, password_hash($password, PASSWORD_DEFAULT), $lastname, $firstname,$code,1);
                    
                    $email = new Mail(); 
                    $email->envoyerMailer($twig,$useremail,'Inscription à Simpleduc',$emailmdp,$code);
                    
                    $form = [
                        'state' => 'success',
                        'message' => "Vous êtes maintenant inscrit au site, veuillez confirmer votre email" 
                    ];
                    
                } else { 
                    $form = [
                        'state' => 'danger',
                        'message' => "Les deux mots de passe ne correspondent pas !" 
                    ];
                }
            } else { 
                $form = [
                    'state' => 'danger',
                    'message' => "Un compte avec cette adresse mail existe déjà !" 
                ];
            }
        }else{
            $form = [
                'state' => 'danger',
                'message' => 'Votre inscription n\'a pas pu aboutir car tous les champs obligatoires n\'ont pas été remplis !'
            ];
        }
    }
    echo $twig->render('register.html.twig', [ 
        'form' => $form
    ]);
}

?>