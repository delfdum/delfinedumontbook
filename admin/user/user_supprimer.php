<?php
// Quand on a cliqué sur le lien "supprimer" dans la liste des menus.

include "../../config.php";

proteger_page();

if(!isset($_GET["userASupprimer"])) {
    ajouterErreur("Merci de selectionner l'utilisateur à supprimer.");
} else {

    $bdd -> query("DELETE FROM user WHERE id_user = " . $_GET["userASupprimer"]);
    ajouterSuccess("L'utilisateur $_GET[userASupprimer] a été supprimé.");

}

changeDePage(CV_URL_SITE . "admin/user/user_formulaire.php");
