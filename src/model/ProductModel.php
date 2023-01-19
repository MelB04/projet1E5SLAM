<?php

#Contrat

    function getAllContacts($db){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT Contact.IDPersonne, Personne.Nom AS Nom ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Contact
                                INNER JOIN Personne ON Personne.IDPersonne = Contact.IDPersonne");  ## FROM dans la table .."); ## instruction quand id est egale aux idproducts, :id = peut etre modifier. les paramètres principaux SQL doivent etre en maj
        $query -> execute([]);
        $contrat = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . plusieurs resultat = fetchAll
        return $contrat;
    }

    function getAllEntreprises($db){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT IDEntre, Nom ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Entreprise_Cliente");
        $query -> execute([]);
        $entreprise = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . plusieurs resultat = fetchAll
        return $entreprise;
    }

    function getAllContrats($db){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup        
        $query = $db -> prepare("SELECT Contrat.IDContrat, Contrat.DateSignature, Contrat.CoutGlobal, Contrat.DateDebut, Contrat.DateFin, Entreprise_Cliente.Nom AS NomEntreprise, Personne.Nom AS NomContact##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Contrat
                                INNER JOIN Entreprise_Cliente ON Entreprise_Cliente.IDEntre = Contrat.IDEntre
                                INNER JOIN Contact ON Contact.IDPersonne = Contrat.IDPersonne 
                                INNER JOIN Personne ON Personne.IDPersonne = Contact.IDPersonne");  ## FROM dans la table .."); ## instruction quand id est egale aux idproducts, :id = peut etre modifier. les paramètres principaux SQL doivent etre en maj
        $query -> execute([]);
        $contrats = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . plusieurs resultat = fetchAll
        return $contrats;
    }
    
    function saveContrat($db,$DateSignature,$CoutGlobal,$DateFin,$DateDebut,$Contact,$Entreprise){
        #echo "INSERT INTO Contrat(DateSignature,CoutGlobal, DateDebut, DateFin, IDPersonne, IDEntre) VALUES ($DateSignature,$CoutGlobal,$DateDebut,$DateFin, $Contact, $Entreprise)";
        $query = $db -> prepare("INSERT INTO Contrat(DateSignature,CoutGlobal, DateDebut, DateFin, IDPersonne, IDEntre) 
                                VALUES (:DateSignature,:CoutGlobal,:DateDebut,:DateFin, :IDPersonne, :IDEntre)");
        $query -> execute([
            'DateSignature' => $DateSignature,
            'CoutGlobal' => $CoutGlobal,
            'DateDebut' => $DateDebut,
            'DateFin' => $DateFin,     
            'IDEntre' => $Entreprise,     
            'IDPersonne' => $Contact,     
        ]);
    }

    function delContrat($db,$idContrat){
        $query = $db -> prepare("DELETE FROM Contrat
                                WHERE IDContrat = :idContrat");
        $query -> execute([
            'idContrat'=> $idContrat,     
        ]);
    }
    
    function labelOneContrat($db,$idContrat){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT Contrat.IDContrat, Contrat.DateSignature, Contrat.CoutGlobal, Contrat.DateDebut, Contrat.DateFin, Entreprise_Cliente.IDEntre AS IDEntre, Entreprise_Cliente.Nom AS NomEntreprise, Personne.Nom AS NomContact, Personne.IDPersonne AS IDPersonne ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Contrat
                                INNER JOIN Entreprise_Cliente ON Entreprise_Cliente.IDEntre = Contrat.IDEntre
                                INNER JOIN Contact ON Contact.IDPersonne = Contrat.IDPersonne 
                                INNER JOIN Personne ON Personne.IDPersonne = Contact.IDPersonne
                                WHERE IDContrat = :IDContrat"); 
        $query -> execute([
            'IDContrat' => $idContrat  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $OneContrat = $query->fetch(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $OneContrat;
    }

    function updateContrat($db,$IDContrat,$DateSignature,$CoutGlobal,$DateFin,$DateDebut,$Contact,$Entreprise){
        #echo "UPDATE Contrat SET $DateSignature = $DateSignature, $CoutGlobal=$CoutGlobal, $DateDebut = $DateDebut, $DateFin = $DateFin , $Contact = $Contact, $Entreprise = $Entreprise WHERE $IDContrat = $IDContrat ";
        
        $query = $db -> prepare("UPDATE Contrat
                                SET DateSignature = :DateSignature, CoutGlobal=:CoutGlobal, DateDebut = :DateDebut, DateFin = :DateFin , IDPersonne = :IDPersonne, IDEntre = :IDEntre
                                WHERE IDContrat = :IDContrat ");
        $query -> execute([
        'IDContrat' => $IDContrat,
        'DateSignature' => $DateSignature , 
        'CoutGlobal' => $CoutGlobal,
        'DateDebut' => $DateDebut,
        'DateFin' => $DateFin,
        'IDPersonne' => $Contact,     
        'IDEntre' => $Entreprise,     
        ]);
    }
    
#entreprises  

    function saveEntreprise($db,$nom){
        echo "INSERT INTO Entreprise_Cliente(Nom) 
        VALUES ($nom)";
        
        $query = $db -> prepare("INSERT INTO Entreprise_Cliente(Nom) 
                                VALUES (:nom)");
        $query -> execute([
            'nom' => $nom,    
        ]);
    }

    function labelOneEntreprise($db,$idEntreprise){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT IDEntre, Nom FROM Entreprise_Cliente where IDEntre=:IDentreprise"); 
        $query -> execute([
            'IDentreprise' => $idEntreprise  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $OneEntreprise = $query->fetch(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $OneEntreprise;
    }


    function afficherOneEntreprise($db,$idEntreprise){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT representer.IDEntre, representer.IDPersonne, Entreprise_Cliente.Nom AS NomEntreprise, Personne.Nom AS NomContact
                                FROM representer 
                                Inner JOIN Entreprise_Cliente ON Entreprise_Cliente.IDEntre=representer.IDEntre
                                Inner JOIN Contact ON Contact.IDPersonne=representer.IDPersonne
                                Inner JOIN Personne ON Contact.IDPersonne=Personne.IDPersonne
                                where representer.IDEntre=:IDentreprise"); 
        $query -> execute([
            'IDentreprise' => $idEntreprise,  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $OneEntreprise = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $OneEntreprise;
    }


    function getAllPersonnesPasdansContact($db){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT IDPersonne, Nom ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Personne
                                WHERE Personne.IDPersonne not in (SELECT Contact.IDPersonne FROM Contact)");
        $query -> execute([]);
        $personnes = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . plusieurs resultat = fetchAll
        return $personnes;
    }

    function saveContact($db,$IDPersonne){
        echo "INSERT INTO Entreprise_Cliente(Nom) 
        VALUES ($IDPersonne)";
        
        $query = $db -> prepare("INSERT INTO Contact(IDPersonne) 
                                VALUES (:IDPersonne)");
        $query -> execute([
            'IDPersonne' => $IDPersonne,    
        ]);
    }

    function labelOneContact($db,$idContact){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT Contact.IDPersonne, Personne.Nom AS NomContact, Personne.IDPersonne AS IDPersonne ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Contact
                                INNER JOIN Personne ON Personne.IDPersonne = Contact.IDPersonne
                                WHERE Contact.IDPersonne = :IDPersonne"); 
        $query -> execute([
            'IDPersonne' => $idContact  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $OneContrat = $query->fetch(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $OneContrat;
    }
    
    function saveOutil($db,$libelle,$version){
        $query = $db -> prepare("INSERT INTO Outil(Libelle,Version) 
                                VALUES (:Libelle,:Version)");
        $query -> execute([
            'Libelle' => $libelle,    
            'Version' => $version,    
        ]);
    }
        
    function GetAllOutil($db){
        $query = $db -> prepare("SELECT Code, Libelle, Version ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Outil");
        $query -> execute([]);
        $outils = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . plusieurs resultat = fetchAll
        return $outils;
    }


    function labelOneOutil($db,$idOutil){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT Code, Libelle, Version FROM Outil where Code=:Code"); 
        $query -> execute([
            'Code' => $idOutil  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $OneOutil = $query->fetch(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $OneOutil;
    }
    

    function saveIndice($db,$Indice){
        $query = $db -> prepare("INSERT INTO Indice(CoutHoraire) 
                                VALUES (:CoutHoraire)");
        $query -> execute([
            'CoutHoraire' => $Indice,    
        ]);
    }


    function getAllIndices($db){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT IDIndice, CoutHoraire ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Indice");  ## FROM dans la table .."); ## instruction quand id est egale aux idproducts, :id = peut etre modifier. les paramètres principaux SQL doivent etre en maj
        $query -> execute([]);
        $Indices = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . plusieurs resultat = fetchAll
        return $Indices;
    }

    function labelOneIndice($db,$idIndice){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT IDIndice, CoutHoraire 
                                FROM Indice 
                                where IDIndice=:IDIndice"); 
        $query -> execute([
            'IDIndice' => $idIndice  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $OneIndice = $query->fetch(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $OneIndice;
    }  
    
    function getAllPersonnes($db){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT IDPersonne, Nom, Prenom ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Personne");
        $query -> execute([]);
        $personnes = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . plusieurs resultat = fetchAll
        return $personnes;
    }

    function saveDev($db,$IDPersonne,$IDIndice){        
        $query = $db -> prepare("INSERT INTO Dev(IDPersonne,IDIndice) 
                                VALUES (:IDPersonne, :IDIndice)");
        $query -> execute([
            'IDPersonne' => $IDPersonne,    
            'IDIndice' => $IDIndice,    
        ]);
    }
    
    function getAllDev($db){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup        
        $query = $db -> prepare("SELECT Dev.IDPersonne, Personne.Nom AS NomPersonne, Indice.CoutHoraire AS CoutHoraire ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Dev
                                INNER JOIN Indice ON Indice.IDIndice = Dev.IDIndice
                                INNER JOIN Personne ON Personne.IDPersonne = Dev.IDPersonne");  ## FROM dans la table .."); ## instruction quand id est egale aux idproducts, :id = peut etre modifier. les paramètres principaux SQL doivent etre en maj
        $query -> execute([]);
        $Dev = $query->fetchAll(); ##recuperer les products, stoocker le resultat du query. que les resultats . plusieurs resultat = fetchAll
        return $Dev;
    }
    
    function labelOneDev($db,$idDev){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT Dev.IDPersonne, Personne.Nom AS NomPersonne, Indice.IDIndice AS IDIndice, Indice.CoutHoraire AS CoutHoraire ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Dev
                                INNER JOIN Indice ON Indice.IDIndice = Dev.IDIndice
                                INNER JOIN Personne ON Personne.IDPersonne = Dev.IDPersonne
                                WHERE Dev.IDPersonne = :IDDev"); 
        $query -> execute([
            'IDDev' => $idDev  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $OneDev = $query->fetch(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $OneDev;
    }

    
    function updateDev($db,$Indice,$Personne){
        
        $query = $db -> prepare("UPDATE Dev
                                SET IDIndice=:Indice
                                WHERE IDPersonne=:Personne");
        $query -> execute([
        'Indice' => $Indice , 
        'Personne' => $Personne,
        ]);
    }
    
    function savePersonne($db,$nom,$prenom){        
        $query = $db -> prepare("INSERT INTO Personne(Nom,Prenom) 
                                VALUES (:Nom, :Prenom)");
        $query -> execute([
            'Nom' => $nom,    
            'Prenom' => $prenom,    
        ]);
    }

    function delPersonne($db,$idPersonne){
        $query = $db -> prepare("DELETE FROM Personne
                                WHERE IDPersonne = :idPersonne");
        $query -> execute([
            'idPersonne'=> $idPersonne,     
        ]);
    }
    
    function labelOnePersonne($db,$idPersonne){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT IDPersonne, Nom, Prenom ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Personne
                                WHERE IDPersonne = :idPersonne"); 
        $query -> execute([
            'idPersonne' => $idPersonne  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $OnePersonne = $query->fetch(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $OnePersonne;
    }

    function updatePersonne($db,$IDPersonne,$nom,$prenom){        
        $query = $db -> prepare("UPDATE Personne
                                SET Nom = :nom, Prenom=:prenom
                                WHERE IDPersonne = :IDPersonne ");
        $query -> execute([
        'IDPersonne' => $IDPersonne,
        'nom' => $nom , 
        'prenom' => $prenom,     
        ]);
    }
    
    function delDev($db,$idDev){
        $query = $db -> prepare("DELETE FROM Dev
                                WHERE IDPersonne = :idPersonne");
        $query -> execute([
            'idPersonne'=> $idDev,     
        ]);
    }

    function delContact($db,$idContact){
        $query = $db -> prepare("DELETE FROM Contact
                                WHERE IDPersonne = :idPersonne");
        $query -> execute([
            'idPersonne'=> $idContact,     
        ]);
    }
    
    
    function getOneUserCredentials($db, $email){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT Email, Password ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Personne  ## FROM dans la table ..
                                WHERE Email = :email "); ## instruction quand id est egale aux idproducts, :id = peut etre modifier. les paramètres principaux SQL doivent etre en maj
        $query -> execute([
                'email' => $email  ##remplace la valeur, la clé 'id' celui de la requete, je veux que dans cette clé : tu stocke la valeur que je vais te donner action utilisateur. selectionner dans le site 
        ]);
        $user = $query->fetch(); ##recuperer les products, stoocker le resultat du query. que les resultats . un seul resultat = fetch
        return $user;
    }

?>