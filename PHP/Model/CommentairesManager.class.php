<?php

//Mise en forme : !NomClasse!, !varobject!, !table!, !attributs!, :!:attributs!, !arrayObject!, getters/setters

class CommentairesManager
{

    public static function add(Commentaires $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO Commentaires (dateCommentaire, contenu, idUtilisateur, idArticle) VALUES (:dateCommentaire, :contenu, :idUtilisateur, :idArticle)');

        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue(':dateCommentaire', $varobject->getDateCommentaire());
        $q->bindValue(':contenu', $varobject->getContenu());
        $q->bindValue(':idUtilisateur', $varobject->getIdUtilisateur());
        $q->bindValue(':idArticle', $varobject->getIdArticle());

        // Ex�cution de la requ�te.
        $q->execute();
    }

    public static function delete(Commentaires $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM Commentaires WHERE idCommentaire = ' . $varobject->getIdCommentaire());
    }

    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet !NomClasse!.
        $id = (int) $id;

        $q = $db->query('SELECT idCommentaire, dateCommentaire, idUtilisateur, idArticle FROM commentaires WHERE idCommentaire = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Commentaires($donnees);
    }

    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les !NomTable!.

        $q = $db->query('SELECT idCommentaire, dateCommentaire, idUtilisateur, idArticle FROM commentaires ORDER BY dateCommentaire');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) { //test si la requête renvoi des données
            do {
                $arrayObject[] = new Commentaires($donnees);
            } while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $arrayObject;
        } else {
            return null;
        }
    }

    public static function update(Commentaires $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE commentaires SET  dateCommentaire=:dateCommentaire, contenu=:contenu, idUtilisateur=:idUtilisateur, idArticle=:idArticle WHERE idCommentaire = :idCommentaire');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':idCommentaire', $varobject->getIdCommentaire());
        $q->bindValue(':dateCommentaire', $varobject->getDateCommentaire());
        $q->bindValue(':contenu', $varobject->getContenu());
        $q->bindValue(':idUtilisateur', $varobject->getIdUtilisateur());
        $q->bindValue(':idArticle', $varobject->getIdArticle());

        // Ex�cution de la requ�te.
        $res = $q->execute();
    }
}
