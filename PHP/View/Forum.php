<?php 
if(!isset($_SESSION['id'])) // Si la variable session 'id' n'existe pas (donc l'utilisateur n'est pas connecté)
{
    require adresseRoot . '/PHP/View/FormConnexion.php'; // on affiche la page de connexion
}
else // Sinon (l'utilisateur est connecté), on affiche le forum
{
    $forum = ForumManager::getList();
    $utilisateurs = UtilisateursManager::getlist();
?>
<div class="forumContainer">
    <div id="titreForum">
        <h3>Forum</h3>
    </div>
    <form id="formulaireForum" method="post" action="index.php?action=ajtCommentaireForum">
        <textarea name="contenu" placeholder="Ecrivez ici votre commentaire" rows="8" cols="100" required></textarea>
        <input class="btn" type="submit" value="Envoyer">
    </form>
    <div id="blocCommentaires">
    <?php 
    if($forum != null)
    {
        foreach($forum as $f)
        {
            echo '<div class="commentaire">'; 
                echo '<div class="enteteCommentaire">';
                foreach($utilisateurs as $u)
                {
                    if($f->getIdUtilisateur() == $u->getIdUtilisateur())
                    {
                        echo '<div class="nomUtilisateur">' . $u->getPseudo() . '</div>';
                    }
                } 
                echo '<div class="datePost">' . $f->getDatePost() . '</div>';
                echo '</div>';
                echo '<div class="contenuMsgForum">' . $f->getContenu() . '</div>';
                /*------------ Si Utilisateur -------------*/
                if($_SESSION['role'] == 1) //on affiche les boutons 'modifier' et 'supprimer' pour qu'il puisse modifier et supprimer uniquement ses propres messages
                {
                    if($f->getIdUtilisateur() == $_SESSION['id'])
                    {
                        echo '<div class="btnModifSupr">';

                        echo '<a class="btnModif noDeco" href="/Site/?action=modifCommentaireForum&idforum=' .$f->getIdForum(). '">
                            <img class="centrer" src="/Site/IMAGES/modif3.png" width="25">Modifier
                            </a>';

                        echo '<a class="btnSuppr noDeco" href="/Site/?action=supprCommentaireForum&idforum=' .$f->getIdForum(). '">
                            <img class="centrer" src="/Site/IMAGES/suppr.png" width="25">Supprimer
                            </a>';

                        echo '</div>';
                    }
                }
                /*-------------- Si Admin ----------------*/
                if ($_SESSION['role'] == 2) //on affiche le bouton 'supprimer' pour qu'il puisse supprimer les messages des utilisateurs
                {
                    echo '<a class="btnSupprAdmin noDeco" href="/Site/?action=supprCommentaireForum&idforum=' .$f->getIdForum(). '">
                    <img class="centrer" src="/Site/IMAGES/suppr.png" width="25">Supprimer
                    </a>';
                }
                /*--------------------------------------*/
            echo '</div>';
        } 
    }
    else
    {
        echo '<div id="forumVide">';
        echo 'Oups, il n\'y a pas de message sur ce forum !';
        echo '</div>';
    }
        ?>
    </div>
</div>
</div>
<?php } ?>

