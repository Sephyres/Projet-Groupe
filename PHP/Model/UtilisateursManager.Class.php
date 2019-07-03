<?php
//Mise en forme : Utilisateurs, utilisateur, utilisateurs, IdUtilisateur, :IdUtilisateur, utilisateurs, getters/setters
class UtilisateursManager
{
    public static function add(Utilisateurs $utilisateur)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO utilisateurs (login, mdp, mail, nom, prenom, role, pseudo) VALUES(:login, :mdp, :mail, :nom, :prenom, 1, :pseudo)');
        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue(':login', $utilisateur->getLogin());
        $q->bindValue(':mdp', $utilisateur->getMdp());
        $q->bindValue(':mail', $utilisateur->getMail());
        $q->bindValue(':nom', $utilisateur->getNom());
        $q->bindValue(':prenom', $utilisateur->getPrenom());
        $q->bindValue(':pseudo', $utilisateur->getPseudo());
    
        // Ex�cution de la requ�te.
        $q->execute();
    }
    public static function delete(Utilisateurs $utilisateur)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM utilisateurs WHERE IdUtilisateur = ' . $utilisateur->getIdUtilisateur());
    }
    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Utilisateurs.
        $id = (int) $id;
        $q = $db->query('SELECT IdUtilisateur, login, mdp, mail, nom, prenom, role, pseudo FROM utilisateurs WHERE IdUtilisateur = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Utilisateurs($donnees);
    }
    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les utilisateurs.
        $q = $db->query('SELECT IdUtilisateur, login, mdp, nom, prenom, role, pseudo FROM utilisateurs ORDER BY nom');
        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {//test si la requête renvoi des données
            do {
                $utilisateurs[] = new Utilisateurs($donnees);
            } while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $utilisateurs;
        } else {
            return null;
        }
    }
    public static function update(Utilisateurs $utilisateur)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE utilisateurs SET login=:login, mdp=:mdp, nom=:nom, mail=:mail, prenom=:prenom, role=:role, pseudo=:pseudo WHERE IdUtilisateur = :IdUtilisateur');
        // Assignation des valeurs � la requ�te.
        $q->bindValue(':IdUtilisateur', $utilisateur->getIdUtilisateur());
        $q->bindValue(':login', $utilisateur->getLogin());
        $q->bindValue(':mdp', $utilisateur->getMdp());
        $q->bindValue(':mail', $utilisateur->getMail());
        $q->bindValue(':nom', $utilisateur->getNom());
        $q->bindValue(':prenom', $utilisateur->getPrenom());
        $q->bindValue(':role', $utilisateur->getRole());
        $q->bindValue(':pseudo', $utilisateur->getPseudo());

        // Ex�cution de la requ�te.
        $res = $q->execute();
    }
}