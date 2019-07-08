<?php 
$articles = ArticlesManager::getList();

    echo '<section>';
    if(isset($_SESSION['role']) && $_SESSION['role'] == 2) //Si un utilisateur est connecté et qu'il s'agit d'un admin, on affiche le bouton "créer un nouvel article"
    {
        echo '<div class="btnNouvelArticle">';
            echo '<a class="noDeco" href="/Site/?action=ajouterArticle"><img class="centrer" src="/Site/IMAGES/plus2.png" width="30">Créer un nouvel article</a>'; 
        echo '</div>';
    }
?>    
    <?php 
    // if($articles != null) {}
        foreach($articles as $unArticle)
        {
            echo '<article>'; 
                echo '<div class="titreEtBtn">';
                    echo '<div class="titreArticle">';
                        echo '<h3>' . $unArticle->getTitre() . '</h3>';
                    echo '</div>';
                        if(isset($_SESSION['role']) && $_SESSION['role'] == 2) //Si admin, on affiche un bouton 'supprimerArticle'
                        {
                            echo '<div class="btnSupprArticle">';
                                echo '<a class="noDeco" href="/Site/?action=supprArticle&idarticle='.$unArticle->getIdArticle().'"><img class="centrer" src="/Site/IMAGES/suppr.png" width="25"></a>';
                            echo '</div>';

                            echo '<div class="btnModifArticle">';
                                echo '<a class="noDeco" href="/Site/?action=modifierArticle&idarticle='.$unArticle->getIdArticle().'"><img class="centrer" src="/Site/IMAGES/modif3.png" width="25"></a>';
                            echo '</div>';
                        }
                echo '</div>';
                echo '<div class="contenuArticle">';
                    echo '<p>' . $unArticle->getContenu() . '<p>';
                echo '</div>';

                echo '<div class="containerCommentairesArticle">';

/*-------------*/

/*$commentaires = CommentairesManager::getList();

//echo 'article->idarticle =' . $unArticle->getIdArticle() . '<br>';
                foreach($commentaires as $unCommentaire)
                {
                  //  echo 'comment->idarticle =' . $unCommentaire->getIdArticle() . '<br>';
                    
                    if($unCommentaire->getIdArticle() == $unArticle->getIdArticle())
                    {
                        echo '<div class="CommentaireArticle">' . $unCommentaire->getContenu() . '</div>';
                    }
                    else
                    {
                        echo '<div class="CommentairesArticleVide">';
                            echo '<div class="noComment">Personne n\'a encore commenté cet article, soyez le premier :</div>';
                            echo '<a class="btnAjouterCommentaireArticle" href="/Site/?action=ajouterCommentaire">Ecrire un commentaire</a>';
                        echo '</div>';
                    }
                }



                echo '</div>';

/*------------*/
            echo '</article>';
        }
    ?>
</section>
