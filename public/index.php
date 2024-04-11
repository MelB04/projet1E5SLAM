<?php
    session_start();

    #var_dump($_SESSION);
    

    require_once "../vendor/autoload.php"; //stimule l'apport d'un fichier 
    require_once "../config/routes.php"; //stimule l'apport d'un fichier routes.php 
    require_once "../src/router.php"; //stimule l'apport d'un fichier router.php importe le router
    require_once "../src/twig.php"; #importer le fichier
    require_once "../config/config.php" ;
    require_once "../src/database.php";
    use PHPMailer\PHPMailer\PHPMailer;
    
    #var_dump($_SESSION);
    $twig=initTwig("../template/"); #initialiser notre instance de twig et stocker dans twig
    $db=getConnection($config); #initialiser notre instance de db et stocker dans db
    $actionController = initRouter($routes,$db); //action qui va etre réaliser dans mon application
    $actionController($twig,$db,$emailmdp); //variable du dessus lancement de la fonction de la fonction controller

?> 