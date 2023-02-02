<?php
    function initTwig($path){ //fonction qui permet d'integrer twig dans l'application

    $loader = new \Twig\Loader\FilesystemLoader($path);
    $twig = new \Twig\Environment($loader, []);
    $twig->addGlobal('session', $_SESSION);
    return $twig;
 }
?>