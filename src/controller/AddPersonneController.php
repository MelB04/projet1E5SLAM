<?php 
function addPersonneController($twig,$db,$emailmdp){
    include_once '../src/model/ProductModel.php';
    include_once '../src/model/MailModel.php'; 

    $form = [];

    if((isset($_POST['btnAddPersonne']) && (isset($_POST['userEmail'])) && (isset($_POST['userPassword'])) && (isset($_POST['userPasswordConfirm'])) && (isset($_POST['userLastname'])) && (isset($_POST['userFirstname'])))){ 
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
                        'message' => "La personne a bien été ajouté, un email lui a été envoyé" 
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
                'message' => 'Votre ajout n\'a pas pu aboutir car tous les champs obligatoires n\'ont pas été remplis !'
            ];
        }  
    }
    echo $twig ->render ('addPersonne.html.twig',[
        'form' => $form
    ]);
}
