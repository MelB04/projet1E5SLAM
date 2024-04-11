<?php 

function updatePersonneController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres

    $form = [];

    $idPersonne=$_GET['id'];
    $updatePersonne= labelOnePersonne($db,$idPersonne);
    $allRoles= getAllRoles($db);
    $userAdmin=getOneUserEmail($db, $_SESSION['auth']['login']);

    if (isset($_POST['btnUpdPersonne'])) {
        $email = $_POST['userEmail'];
        $lastname = $_POST['userLastname'];
        $firstname = $_POST['userFirstname'];
        $role = $_POST['userRole'];
        $userPasswordAdmin = $_POST['userPasswordAdmin'];
        $userPassworAdmindConfirm = $_POST['userPassworAdmindConfirm'];
        
        if ($userPasswordAdmin === $userPassworAdmindConfirm && password_verify($userPasswordAdmin, $userAdmin['Password'])){
            if (!empty($email) && !empty($lastname) && !empty($firstname) && !empty($role)) { 
                updatePersonne($db,$idPersonne,$lastname, $firstname,$email, $role);
                
                $form = [
                   'state' => 'success',
                   'message' => 'L\'utilisateur a bien été modifié !'
                ];
                header("Location: index.php");
           }else{
               $form = [
                   'state' => 'danger',
                   'message' => 'L\'utilisateur n\'a pas été modifié car les champs obligatoires n\'ont pas été remplis !'
               ];
           }
        }else{
            $form = [
                'state' => 'danger',
                'message' => 'L\'utilisateur n\'a pas été modifié car votre saisie de mot de passe était incorrecte !'
            ];
        }  
    }
    
    echo $twig->render("updatePersonne.html.twig",['updatePersonne' => $updatePersonne,
                                                    'roles' => $allRoles,
                                                    'form' => $form,
                                                ]);
}
?>