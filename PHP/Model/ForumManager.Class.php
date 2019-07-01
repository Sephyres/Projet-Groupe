<?php
class ForumManager
{
    public static function add(Forum $forum)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO forum (datePost, contenu, idUtilisateur) VALUES(:datePost, :contenu, :idUtilisateur)');
        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue(':datePost', $forum->getDatePost());
        $q->bindValue(':contenu', $forum->getContenu());
        $q->bindValue(':idUtilisateur', $forum->getIdUtilisateur());
    
        // Ex�cution de la requ�te.
        $q->execute();
    }
    public static function delete(Forum $forum)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM forum WHERE idForum = ' . $forum->getIdForum());
    }
    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Forum.
        $id = (int) $id;
        $q = $db->query('SELECT idForum, datePost, contenu, idUtilisateur FROM forum WHERE idForum = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Forum($donnees);
    }
    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les utilisateurs.
        $q = $db->query('SELECT idForum, datePost, contenu, idUtilisateur FROM forum ORDER BY datePost');
        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {//test si la requête renvoi des données
            do {
                $forums[] = new Forum($donnees);
            } while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $forums;
        } else {
            return null;
        }
    }
    public static function update(Forum $forum)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE forum SET datePost=:datePost, contenu=:contenu, idUtilisateur=:idUtilisateur WHERE idForum = :IdForum');
        // Assignation des valeurs � la requ�te.
        $q->bindValue(':IdForum', $forum->getIdForum());
        $q->bindValue(':datePost', $forum->getDatePost());
        $q->bindValue(':contenu', $forum->getContenu());
        $q->bindValue(':idUtilisateur', $forum->getIdUtilisateur());

        // Ex�cution de la requ�te.
        $res = $q->execute();
    }
}