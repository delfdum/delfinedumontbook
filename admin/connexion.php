<?php
// 1ere page où l'administrateur va devoir entrer ses identifiants pour avoir accès à la partie administration du site

include "../config.php";

?><!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

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


<div class="box_connect">
    <h1>Se connecter</h1>
    <form method="post" action="connexion_reponse.php">
        <input type="text" name="identifiant_admin" placeholder="Identifiant">
        <br>
        <input type="password" name="motdepasse_admin" placeholder="Mot de passe">
        <br><br>
        <input type="submit">
    </form>

</div>


</body>
</html>
