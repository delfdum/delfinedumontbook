<?php
//sur cette page, un menu  pour choisir ce que l'on veut faire sur chaque page de nos pages projets: Ajouter un projet // Ajouter une nouvelle technologie // Modifier un projet  // supprimer un projet?>

<?php
include '../../config.php';
include '../include/entete.php';
//verif on est bien connecté donc si on est pas connecté, on revient sur la page connexion:
if (empty($_SESSION["connected_user"])){
  header ("location: connexion.php");
  exit;
}

?>

<h1>Liste des projets</h1>

<?php
//si erreur, afficher:
if(!empty($_SESSION["erreur"])){
  echo "<div class='erreur'><ul>";
  foreach ($_SESSION["erreur"] as $erreur) {
      echo "<li>$erreur</li>";
  }
  echo "</ul></div>";
  }
  unset($_SESSION["erreur"]);


//si sucess, l'afficher:
if(!empty($_SESSION["success"])){
  echo "<div class='success'<ul>";
  foreach ($_SESSION["success"] as $success) {
    echo "<li>$success</li>";
  }
  echo "</ul></div>";
  }
  unset($_SESSION["success"]);


 ?>


<div class="menu">
  <a href="<?php echo CV_URL_SITE ?>admin/accueil.php">Retour à l'accueil</a>

  <a href="<?php echo CV_URL_SITE ?>admin/projet/projet_formulaire.php ">Ajouter un projet</a>
</div>

<div class="list">
  <?php
      // je vais chercher tous les projets dans ma bdd et je les veux par ordre
      $projets = $bdd -> query("SELECT * from projet order by ordre") ->fetchAll();
 // voirCode($projets);

//      si il n'y aucun projet, tu m'affiches "Il n'y a aucun projet."
      if(count($projets) == 0){
        echo "Il n'y a aucun projet.";
      } else { //sinon tu m'affiches par liste tous les titre_projet de mes projets de ma bdd
          echo "<ul>";

        foreach ($projets as $projet) {
          $lienModifier = html_a("Modifier", CV_URL_SITE . "admin/projet/projet_formulaire.php?projetAAfficher=$projet[id_projet]");
          $lienSupprimer = html_a("Supprimer", CV_URL_SITE . "admin/projet/projet_supprimer.php?projetASupprimer=$projet[id_projet]", "alert", "Voulez-vous effacer le projet $projet[titre_projet] ?");

          echo "<li>$projet[titre_projet] ( $lienModifier | $lienSupprimer)</li>";
        }
          echo"</ul>";
      }
?>

</div>

<?php
include "../include/footer.php";
