<?php
//sur cette page, un menu  pour choisir ce que l'on veut faire sur les users: Ajouter un user //  Modifier un user  // supprimer un user?>

<?php
include '../../config.php';
include '../include/entete.php';
//verif on est bien connecté donc si on est pas connecté, on revient sur la page connexion:
if (empty($_SESSION["connected_user"])){
  header ("location: connexion.php");
  exit;
}

?>

<h1>Liste des utilisateurs</h1>

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

  <a href="<?php echo CV_URL_SITE ?>admin/user/user_formulaire.php ">Ajouter un utilisateur</a>
</div>

<div class="list">
  <?php
      // je vais chercher tous les projets dans ma bdd et je les veux par ordre
      $users = $bdd -> query("SELECT * from user") ->fetchAll();

      if(count($users) == 0){
        echo "Il n'y a aucun utilisateur.";
      } else {
          echo "<ul>";

        foreach ($users as $user) {
          $lienModifier = html_a("Modifier", CV_URL_SITE . "admin/user/user_formulaire.php?userAAfficher=$user[id_user]");
          $lienSupprimer = html_a("Supprimer", CV_URL_SITE . "admin/user/user_supprimer.php?userASupprimer=$user[id_user]", "alert", "Voulez-vous effacer cet utilisateur ?");

              echo "<li>$user[nom] ( $lienModifier | $lienSupprimer)</li>";
            }
            echo"</ul>";
        }
    ?>

</div>

<?php
include "../include/footer.php";
