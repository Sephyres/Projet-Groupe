<?php
//Mise en forme : Utilisateurs, utilisateur, utilisateurs, id_utilisateurs, :id_utilisateurs, utilisateurs, getters/setters
class UtilisateursManager
{
    public static function add(Utilisateurs $utilisateur)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO utilisateurs (id_utilisateurs, login, mdp, mail, nom, prenom, role, pseudo) VALUES(:id_utilisateurs, :login, :mdp, :mail, :nom, :prenom, :role, :pseudo)');
        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue(':id_utilisateurs', $utilisateur->get_id_utilisateurs());
        $q->bindValue(':login', $utilisateur->get_login());
        $q->bindValue(':mdp', $utilisateur->get_mdp());
        $q->bindValue(':mail', $utilisateur->get_mail());
        $q->bindValue(':nom', $utilisateur->get_nom());
        $q->bindValue(':prenom', $utilisateur->get_prenom());
        $q->bindValue(':role', $utilisateur->get_role());
        $q->bindValue(':pseudo', $utilisateur->get_pseudo());
    
        // Ex�cution de la requ�te.
        $q->execute();
    }
    public static function delete(Utilisateurs $utilisateur)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM utilisateurs WHERE id_utilisateur = ' . $utilisateur->get_id_utilisateurs());
    }
    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Utilisateurs.
        $id = (int) $id;
        $q = $db->query('SELECT id_utilisateurs, login, mdp, mail, nom, prenom, role, pseudo FROM utilisateurs WHERE id_utilisateurs = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Utilisateurs($donnees);
    }
    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les utilisateurs.
        $q = $db->query('SELECT id_utilisateurs, login, mdp, nom, prenom, role, pseudo FROM utilisateurs ORDER BY nom');
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
        $q = $db->prepare('UPDATE utilisateurs SET login=:login, mdp=:mdp, nom=:nom, prenom=:prenom, role=:role, pseudo=:pseudo WHERE id_utilisateurs = :id_utilisateurs');
        // Assignation des valeurs � la requ�te.
        $q->bindValue(':id_utilisateurs', $utilisateur->get_id_utilisateurs());
        $q->bindValue(':login', $utilisateur->get_login());
        $q->bindValue(':mdp', $utilisateur->get_mdp());
        $q->bindValue(':nom', $utilisateur->get_nom());
        $q->bindValue(':prenom', $utilisateur->get_prenom());
        $q->bindValue(':role', $utilisateur->get_role());
        $q->bindValue(':pseudo', $utilisateur->get_pseudo());

        // Ex�cution de la requ�te.
        $res = $q->execute();
    }
}