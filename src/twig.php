<?php
    function initTwig($path){ //fonction qui permet d'integrer twig dans l'application
        $loader = new \Twig\Loader\FilesystemLoader($path);
        return new \Twig\Environment($loader,[]);
    }
?>