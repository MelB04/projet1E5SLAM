<?php 

function erreurpdoController($twig){
    echo $twig -> render("erreurpdo.html.twig", []);
}

?>