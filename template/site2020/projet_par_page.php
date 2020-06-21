<?php //PAge où les projets s'affichent seul, projet par projet ?>


<?php
include "include/head_projet.php"; ?>


<div class="pageProjet">
      <h1> <?php echo $projet_a_afficher["titre_projet"]; ?></h1>

      <p><span>Présentation :</span><br>
          <?php echo $projet_a_afficher["texte"]; ?></p>

      <p><span>Année de réalisation: </span>
        <?php echo $projet_a_afficher["annee_realisation"];?></p>

      <p><span>Technologies: </span><br>
        <?php  foreach ($techno_a_afficher as $key => $techno) {
                foreach($techno as $cleTableau => $parTechno) {
                  echo $parTechno ;
                  echo " | ";
                }
          }?></p>
    </div>

<!-- PARTIE IMAGES -->
<div class="imageParPage">
    <?php echo html_image("image/projet/" .  $projet_a_afficher["titre_projet"] . "1.jpg", "imageParProjet ");
          echo html_image("image/projet/" .  $projet_a_afficher["titre_projet"] . "2.jpg", "imageParProjet ");?>
</div>


<!-- PAGINATION -->

<?php
$pageSuivante = $projet_a_afficher["ordre"];
$pageSuivante++ ;
$pagePrecedente = $projet_a_afficher["ordre"];
$pagePrecedente--;

if (!empty($pagePrecedente)) {
  echo "<a href='projet.php?projetChoisi=$pagePrecedente'>Projet précedent</a>";
}

 echo "<a href='" . CV_URL_SITE . "projet_liens.php'>Retour à la liste des projets</a>";

if (!empty($pageSuivante)) {
  echo "<a href='projet.php?projetChoisi=$pageSuivante'>Projet suivant</a>";
}
 ?>


<?php include "include/footer.php"; ?>
