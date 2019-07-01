<?php
class ForumManager
{
    public static function add(Forum $forum)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO forum (id_forum, date_post, contenu, utilisateurs_id_utilisateurs) VALUES(id_forum, :date_post, :contenu, :utilisateurs_id_utilisateurs)');
        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue('id_forum', $forum->get_id_forum());
        $q->bindValue(':date_post', $forum->get_date_post());
        $q->bindValue(':contenu', $forum->get_contenu());
        $q->bindValue(':utilisateurs_id_utilisateurs', $forum->get_utilisateurs_id_utilisateurs());
    
        // Ex�cution de la requ�te.
        $q->execute();
    }
    public static function delete(Forum $forum)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM forum WHERE id_forum = ' . $forum->get_id_forum());
    }
    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Forum.
        $id = (int) $id;
        $q = $db->query('SELECT id_forum, date_post, contenu, utilisateurs_id_utilisateurs FROM forum WHERE id_forum = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Forum($donnees);
    }
    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les utilisateurs.
        $q = $db->query('SELECT id_forum, date_post, contenu, utilisateurs_id_utilisateurs FROM forum ORDER BY date_post');
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
        $q = $db->prepare('UPDATE forum SET date_post=:date_post, contenu=:contenu, utilisateurs_id_utilisateurs=:utilisateurs_id_utilisateurs WHERE id_forum = id_forum');
        // Assignation des valeurs � la requ�te.
        $q->bindValue('id_forum', $forum->get_id_forum());
        $q->bindValue(':date_post', $forum->get_date_post());
        $q->bindValue(':contenu', $forum->get_contenu());
        $q->bindValue(':utilisateurs_id_utilisateurs', $forum->get_utilisateurs_id_utilisateurs());

        // Ex�cution de la requ�te.
        $res = $q->execute();
    }
}