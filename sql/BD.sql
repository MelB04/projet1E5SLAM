CREATE TABLE Entreprise_Cliente(
   IDEntre INT AUTO_INCREMENT,
   Nom VARCHAR(50),
   PRIMARY KEY(IDEntre)
);

CREATE TABLE Personne(
   IDPersonne INT AUTO_INCREMENT,
   Nom VARCHAR(50),
   Prenom VARCHAR(50),
   PRIMARY KEY(IDPersonne)
);

CREATE TABLE Contact(
   IDPersonne INT AUTO_INCREMENT,
   PRIMARY KEY(IDPersonne),
   FOREIGN KEY(IDPersonne) REFERENCES Personne(IDPersonne)
);

CREATE TABLE Coordonnees(
   IDCoord INT AUTO_INCREMENT,
   Rue VARCHAR(50),
   Ville VARCHAR(50),
   Code_Postal VARCHAR(50),
   email VARCHAR(50),
   IDPersonne INT NOT NULL,
   IDEntre INT NOT NULL,
   PRIMARY KEY(IDCoord),
   FOREIGN KEY(IDPersonne) REFERENCES Personne(IDPersonne),
   FOREIGN KEY(IDEntre) REFERENCES Entreprise_Cliente(IDEntre)
);

CREATE TABLE Contrat(
   IDContrat INT AUTO_INCREMENT,
   DateSignature DATE,
   CoutGlobal FLOAT,
   DateDebut DATE,
   DateFin DATE,
   IDPersonne INT NOT NULL,
   IDEntre INT NOT NULL,
   PRIMARY KEY(IDContrat),
   FOREIGN KEY(IDPersonne) REFERENCES Contact(IDPersonne),
   FOREIGN KEY(IDEntre) REFERENCES Entreprise_Cliente(IDEntre)
);

CREATE TABLE Outil(
   Code INT AUTO_INCREMENT,
   Libelle VARCHAR(50),
   Version VARCHAR(50),
   PRIMARY KEY(Code)
);

CREATE TABLE Indice(
   IDIndice INT AUTO_INCREMENT,
   CoutHoraire FLOAT,
   PRIMARY KEY(IDIndice)
);

CREATE TABLE Dev(
   IDPersonne INT AUTO_INCREMENT,
   IDIndice INT NOT NULL,
   PRIMARY KEY(IDPersonne),
   FOREIGN KEY(IDPersonne) REFERENCES Personne(IDPersonne),
   FOREIGN KEY(IDIndice) REFERENCES Indice(IDIndice)
);

CREATE TABLE Equipe(
   IDEquipe INT AUTO_INCREMENT,
   IDPersonne INT NOT NULL,
   PRIMARY KEY(IDEquipe),
   FOREIGN KEY(IDPersonne) REFERENCES Dev(IDPersonne)
);

CREATE TABLE Module_(
   IDModule INT AUTO_INCREMENT,
   Etat VARCHAR(50),
   IDEquipe INT NOT NULL,
   IDContrat INT NOT NULL,
   PRIMARY KEY(IDModule),
   FOREIGN KEY(IDEquipe) REFERENCES Equipe(IDEquipe),
   FOREIGN KEY(IDContrat) REFERENCES Contrat(IDContrat)
);

CREATE TABLE Tache(
   IDTache INT AUTO_INCREMENT,
   Libelle VARCHAR(50),
   Etat VARCHAR(50),
   DateDebut DATE,
   DateFin DATE,
   IDModule INT NOT NULL,
   PRIMARY KEY(IDTache),
   FOREIGN KEY(IDModule) REFERENCES Module_(IDModule)
);

CREATE TABLE regrouper(
   IDPersonne INT,
   IDEquipe INT,
   PRIMARY KEY(IDPersonne, IDEquipe),
   FOREIGN KEY(IDPersonne) REFERENCES Dev(IDPersonne),
   FOREIGN KEY(IDEquipe) REFERENCES Equipe(IDEquipe)
);

CREATE TABLE representer(
   IDEntre INT,
   IDPersonne INT,
   PRIMARY KEY(IDEntre, IDPersonne),
   FOREIGN KEY(IDEntre) REFERENCES Entreprise_Cliente(IDEntre),
   FOREIGN KEY(IDPersonne) REFERENCES Contact(IDPersonne)
);

CREATE TABLE Travailler(
   IDPersonne INT,
   IDTache INT,
   NbHeures DECIMAL(15,2),
   PRIMARY KEY(IDPersonne, IDTache),
   FOREIGN KEY(IDPersonne) REFERENCES Dev(IDPersonne),
   FOREIGN KEY(IDTache) REFERENCES Tache(IDTache)
);

CREATE TABLE Maitriser(
   IDPersonne INT,
   Code INT,
   PRIMARY KEY(IDPersonne, Code),
   FOREIGN KEY(IDPersonne) REFERENCES Dev(IDPersonne),
   FOREIGN KEY(Code) REFERENCES Outil(Code)
);
