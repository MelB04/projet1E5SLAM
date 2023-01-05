<?php
#configuration pour la base de données 

    function getConnection($config)
    {
        try{ #essayer quelque chose et si erreur on l'a capturé
            $pdo = new PDO('mysql:host='.$config['dbserver'].'; dbname='.$config['dbname'],$config['dblogin'],$config['dbpassword']); #creation de valeur nouvelle objet  preparer des requetes SQL et sécuriser les requetes SQL. On indique quelle type d'info ou il faut se connecter, le nom base , login et passwd
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #config de la base de donnee PDO pour afficher plus facilement des erreurs
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $e){ #on recuperer l'erreur
            #var_dump($e->getMessage()); #affiche le message d'erreur
            #die(); #on stoppe l'application car erreur
            $pdo=null;
        }
        return $pdo; #retourne la valeur
    }
?>