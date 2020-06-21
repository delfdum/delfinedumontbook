<?php
//sur cette page,on ajoute dans un champ la nouvelle technologie.elle sera validée et enreistré sur la page reponse_techno.php ?>

<?php
include '../../config.php';
include '../include/entete.php';
// VERIF CONNEXION, on est bien connecté - là si je suis pas connecté:
      if(empty($_SESSION["connected_user"])) {
          // si ma variable de SESSION de connection est vide -> c'est que je ne suis pas connecté, donc je retourne à l'accueil admin
          header("location: connexion.php");
            exit;
      }





if(!empty($_GET["userAAfficher"])) {
    $userAModifier = $bdd -> query("SELECT * from user where id_user = " . $_GET["userAAfficher"]) -> fetch();
} else {
    $userAModifier = [];
}
?>
<h1>Les utilisateurs</h1>

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
<form enctype="multipart/form-data" action="user_formulaire_reponse.php" method="post">

    <input type="hidden" name="id_user" value="<?php echoKey($userAModifier, "id_user", "pas_de_id")  ?>">

    <div class="field">
        Nom : <input name="nom" placeholder="nom" type="text" value="<?php echoKey($userAModifier, "nom")  ?>">
    </div>

    <div class="field">
        Identifiant : <input name="identifiant" placeholder="identifiant" type="text" value="<?php echoKey($userAModifier, "identifiant")  ?>">

    </div>

    <div class="field">
        Mot de passe : <input name="motdepasse" placeholder="mot de passe" type="text" value="<?php echoKey($userAModifier, "motdepasse")?>">
    </div>
    <!-- PARTIE VALIDATION BUTTON -->
          <div class="field">
                <input type="submit" value="Envoyer" />
                <a href="<?php echo CV_URL_SITE ?>admin/accueil.php" class="button">Annuler</a>
          </div>

</form>


<a href="<?php echo CV_URL_SITE ?>admin/accueil.php">Retour à l'accueil</a>


<?php  include '../include/footer.php'; ?>
