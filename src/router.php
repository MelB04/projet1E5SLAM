<?php
function initRouter($routes,$db)
{
    if (isset($_GET["page"])){ //si $_get page est définie on prend ca 
        $page = $_GET["page"];
    }
    else{  //sinon
        $page = "home";
    }
    if (isset($routes[$page])){ //si $page est definie dans $routes alors
        $route=$routes[$page];
    }
    else{                       //sinon 
        $route=$routes["home"];       
    }
    if ($db == null){
        $route=$routes["erreurpdo"];       
    }
    
    $controller = ucfirst($route);    //transformer en majuscule   
    require_once "controller/".$controller.".php"; // importer un fichier en rapport avec les controller.
    
    //var_dump($_GET); permet de debugger des variables si on ne sait pas ce qu'elle retourne
    return $controller;
}