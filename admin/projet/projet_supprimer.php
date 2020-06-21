<?php
// Quand on a cliqué sur le lien "supprimer" dans la liste des projets.

include "../../config.php";

proteger_page();

if(!isset($_GET["projetASupprimer"])) {
    ajouterErreur("Merci de choisir le projet à supprimer.");
} else {
    $bdd -> query("DELETE FROM projet WHERE id_projet= " . $_GET["projetASupprimer"]);
    ajouterSuccess("Le projet a été supprimé.");

}

changeDePage(CV_URL_SITE . "admin/projet/projet_lister.php");
