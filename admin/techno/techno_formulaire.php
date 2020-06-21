<?php
//sur cette page,on ajoute dans un champ la nouvelle technologie.elle sera validée et enregistré sur la page techno_validation.php ?>

<?php
include '../../config.php';
include '../include/entete.php';
// VERIF CONNEXION, on est bien connecté - là si je suis pas connecté:
      if(empty($_SESSION["connected_user"])) {
          // si ma variable de SESSION de connection est vide -> c'est que je ne suis pas connecté, donc je retourne à l'accueil admin
          header("location: connexion.php");
            exit;
      }
?>

<h1>Ajouter ou supprimer une technologie</h1>

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

  <div class="form">
    <form enctype="multipart/form-data" action="techno_validation.php" method="post">

      Ajouter une technologie: <input type="text" name="nom_techno" value="" placeholder="ajout technologie">

      <button type="submit" name="button">valider</button>


<?php

    $technoACocher = $bdd -> query("SELECT * from technologie ") -> fetchAll();

    if(count($technoACocher) == 0){
        echo "Il n'y a aucune technologie.";
    } else {
        echo "<ul>";
        foreach ($technoACocher as $key => $nomTechno){

          $lienSupprimer = html_a("Supprimer", CV_URL_SITE . "admin/techno/techno_supprimer.php?technoASupprimer=$nomTechno[id_techno]", "alert", "Voulez-vous effacer la technologie $nomTechno[nom_techno]?");
          echo "<li>$nomTechno[nom_techno] (  $lienSupprimer)</li>";
        }
        echo"</ul>";
    }
?>

</form>


<a href="<?php echo CV_URL_SITE ?>admin/accueil.php">Retour à l'accueil</a>


<?php  include '../include/footer.php'; ?>
