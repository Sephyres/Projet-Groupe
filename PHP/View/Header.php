<!DOCTYPE html>
<html>

<head>
    <?php

    function chargerClasse($classe)
    {
        if (file_exists(adresseRoot . "Php/Controller/" . $classe . ".class.php")) {
            require adresseRoot . "Php/Controller/" . $classe . ".class.php";
        }

        if (file_exists(adresseRoot . "Php/Model/" . $classe . ".class.php")) {
            require adresseRoot . "Php/Model/" . $classe . ".class.php";
        }
    }
    spl_autoload_register("chargerClasse");

    // initialise une connection
    DbConnect::init();
    session_start();
    //Si le titre est indiqué, on l'affiche entre les balises <title>
    echo (!empty($titre)) ? '<title>' . $titre . '</title>' : '<title> Acceuil </title>';
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo Parametre::getAdresseRoot(); ?>CSS/default.css" />
    <link rel="stylesheet" href="<?php echo Parametre::getAdresseRoot(); ?>CSS/alt.css" />
</head>

<body>
    <div id="contener">
        <header>
            <div id="log">
                <div id="titre">Les débarquements durant la seconde guerre mondiale</div>
                <div id="login">
                <?php 
                    if(isset($_SESSION['id']))
                    {
                        echo $_SESSION['pseudo'];
                        echo '<a class="noDeco" href="'.serverRoot.'?action=deconnexion">
                                <img src="/Site/IMAGES/signout.png">
                              </a>';
                    }
                    else
                    {
                        echo '<a class="noDeco" href="'.serverRoot.'?action=connexion">Login<br><img src="/Site/IMAGES/signin.png"></a>';
                    }
                ?>
                </div>
            </div>


            <div id="barre">

                <ul id="nav">
                    <!--
            -->
                    <li><a class="noDeco" href="<?php echo serverRoot; ?>?action=main">Accueil</a></li>
                    <!--
            -->
                    <li><a class="noDeco" href="#">Les opérations</a></li>
                    <!--
            -->
                    <li><a class="noDeco" href="#">Zone géographique</a></li>
                    <!--
            -->
                    <li><a class="noDeco" href="<?php echo serverRoot; ?>?action=forum">Forum</a></li>
                    <!--
            -->
                    <li><a class="noDeco" href="<?php echo serverRoot; ?>?action=contact">Contact</a></li>
                </ul>

            </div>
        </header>
        <div id="buffer"> </div>