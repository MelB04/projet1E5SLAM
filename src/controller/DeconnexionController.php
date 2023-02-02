<?php

function deconnexionController($twig,$db){
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
}