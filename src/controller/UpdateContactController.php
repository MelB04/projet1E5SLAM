<?php 

function updateContactController($twig,$db){
    include_once '../src/model/ProductModel.php';  ##on inclut pour apres

    $idPersonne=$_GET['idContact'];
    $updateContact= labelOneContact($db,$idPersonne);
    
    var_dump($updateContact);
    var_dump($_GET['page']);
    var_dump($_GET['idContact']);

    if ($updateContact == NULL){
        $_POST['contactnull']=true;
        echo $twig->render("updateContact.html.twig",['contactnull' => getErrorContactnull()]);

    }else{
        echo $twig->render("updateContact.html.twig",['updateContact' => $updateContact]);
    }

}

function getErrorContactnull() {
    if (isset($_POST['contactnull'])){
        if ($_POST['contactnull']){
            return true;
        }
    } else return false;
}
 
?>