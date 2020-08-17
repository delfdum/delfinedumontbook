<?php //PAge où les projets s'affichent seul, projet par projet ?>


<?php
include "include/head.php"; ?>


<div class="containerPrincipal">
      <h1> <?php echo $projet_a_afficher["titre_projet"]; ?></h1>

      <!-- PARTIE IMAGES -->
      <div class="imageDeuxParProjet">
          <?php echo html_image("image/projet/" .  $projet_a_afficher["titre_projet"] . "1.jpg", "imageParProjet ");
          echo html_image("image/projet/" .  $projet_a_afficher["titre_projet"] . "2.jpg", "imageParProjet ");?>
      </div>


      <div class="presentationParProjet">
        <div class="">
          <?php echo $projet_a_afficher["texte"]; ?>
        </div>
        <div class="">
          Année de réalisation:
            <?php echo $projet_a_afficher["annee_realisation"];?>
        </div>
        <div class="">
          Technologies:
            <?php  foreach ($techno_a_afficher as $key => $techno) {
                    foreach($techno as $cleTableau => $parTechno) {
                      echo $parTechno ;
                      echo " | ";
                    }
              }?>
        </div>
      </div>
  </div>






<!-- PAGINATION -->

<?php
$pageSuivante = $bdd -> query("SELECT * FROM projet WHERE ordre = $projet_a_afficher[ordre] + 1") -> Fetch();

$pagePrecedente = $bdd -> query("SELECT * FROM projet WHERE ordre = $projet_a_afficher[ordre] - 1") -> Fetch();

echo "<div class='pagination'>";
if (!empty($pagePrecedente)) {
  echo "<a href='projet.php?projetChoisi=$pagePrecedente[ordre]'>  ⇽ Projet précédent</a>";
}

 echo "<a href='" . CV_URL_SITE . "projet_liens.php'>Retour à la liste des projets</a>";

if (!empty($pageSuivante)) {
  echo "<a href='projet.php?projetChoisi=$pageSuivante[ordre]'>Projet suivant ⇾ </a>";
}

echo "</div> ";
 ?>


<?php include "include/footer.php"; ?>
