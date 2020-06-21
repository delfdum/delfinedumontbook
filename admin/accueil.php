<?php // cette page est la page accueil côté administrateur avec le menu des différentes actions possibles?>

<?php
include "../config.php";
include "include/entete.php";

// VERIF CONNEXION, on est bien connecté:
      if(empty($_SESSION["connected_user"])) {
          // si ma variable de SESSION de connection est vide -> c'est que je ne suis pas connecté, donc je retourne à la connextion.
          header("location: connexion.php");
            exit;
      }

?>

<h1>Bienvenue dans votre espace administration</h1>

<?php
//AFFICHE ERREUR
    // affiche toutes les cases de mon tableau $_SESSION["erreur"]
    if(!empty($_SESSION["erreur"])) {
        echo "<div class='erreur'><ul>";
        foreach ($_SESSION["erreur"] as $erreur) {
            echo "<li>$erreur</li>";
        }
        echo "</ul></div>";
    }
    unset($_SESSION["erreur"]); // une fois les erreurs affichées, je supprime le tableau pour être sur de ne plus les afficher plus tard.

//AFFICHE LE SUCCESS
    // affiche toutes les cases de mon tableau $_SESSION["success"]
    if(!empty($_SESSION["success"])) {
        echo "<div class='success'><ul>";
        foreach ($_SESSION["success"] as $success) {
            echo "<li>$success</li>";
        }
        echo "</ul></div>";
    }
    unset($_SESSION["success"]); // une fois les erreurs affichées, je supprime le tableau pour être sur de ne plus les afficher plus tard.

?>

<div class="intro">
    Ici vous allez pouvoir modifier le contenu de votre site internet.<br/>

    <div class="menu_accueil">
        <a href="<?php echo CV_URL_SITE ?>" target="_blank">Voir le site</a>
        <a href="<?php echo CV_URL_SITE ?>admin/accueil/accueil_formulaire.php">Modifier ma page d'accueil</a>
        <a href="<?php echo CV_URL_SITE ?>admin/contact/contact_formulaire.php">Modifier mes coordonnées</a>
        <a href="<?php echo CV_URL_SITE ?>admin/techno/techno_formulaire.php">Ajouter ou supprimer une technologie</a>
        <a href="<?php echo CV_URL_SITE ?>admin/projet/projet_lister.php">Ajouter, modifier ou supprimer un projet</a>
        <a href="<?php echo CV_URL_SITE ?>admin/user/user_lister.php">Ajouter, modifier ou supprimer un utilisateur</a>
        <a href="<?php echo CV_URL_SITE ?>admin/deconnexion.php">Se déconnecter</a>
    </div>



</div>

<?php

include "include/footer.php";
