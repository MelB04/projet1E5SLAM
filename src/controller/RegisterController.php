<?php 

function registerController($twig,$db){
    include_once '../src/model/ProductModel.php'; 
    $form = [];
    
    if (isset($_POST['btnPostRegister'])){

        $email = $_POST['userEmail'];
        $password = $_POST['userPassword'];
        $passwordConfirm = $_POST['userPasswordConfirm']; 
        $lastname = $_POST['userLastname'];
        $firstname = $_POST['userFirstname'];

        if ((!empty($email)) && (!empty($password)) && (!empty($passwordConfirm)) && (!empty($lastname)) && (!empty($firstname))){
            if (getOneUserEmail($db, $email) == NULL) { 
                if ($password === $passwordConfirm) {
                    saveUser($db, $email, password_hash($password, PASSWORD_DEFAULT), $lastname, $firstname);
                    $form = [
                        'state' => 'success',
                        'message' => "Vous êtes maintenant inscrit au site" 
                    ];
                    header("Location: index.php");
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