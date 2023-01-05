<?php 
    function getAllContacts($db){ ##fonction avec un nom clair, recuperer un seul product et on recoit la base de donnees et id qu'on veut recup
        $query = $db -> prepare("SELECT Contact.IDPersonne, Personne.Nom ##query variable dans lequelle je vais faire une requete sql, preparer la requete sql, va stocker une requete SELECT selectionne les elements dans la base de données
                                FROM Contact
                                INNER JOIN Personne ON Personne.IDPersonne = Contact.IDPersonne  ## FROM dans la table .."); ## instruction quand id est egale aux idproducts, :id = peut etre modifier. les paramètres principaux SQL doivent etre en maj
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

    function saveContrat($db,$DateSignature,$CoutGlobal,$DateFin,$DateDebut,$Contact,$Entreprise){
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


?>