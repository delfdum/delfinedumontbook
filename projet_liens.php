<?php
include "config.php";
include PATH_TEMPLATE . "include/head.php";
?>
<?php //sur cette page, c'est ma page avec tous mes projets et je vais créer des lien sur chaque projet avec $_GET pour aller sur le projet cliqué ?>


<div class="contenairPrincipal">

  <h1>Mes projets</h1>
<div class="listeTechno">
<h2 class="ftsz_1"> filtrer par :</h2>
<a href="#">Tous les projets</a>

<?php
$query = $bdd->query("select * from technologie");
$result_technos = $query -> fetchAll();
foreach($result_technos as $key => $techno) {
  $url_techno = "projet_par_techno.php?lien_techno=" . $techno["nom_techno"];
  echo " | <a href='$url_techno'>" . $techno["nom_techno"] . "</a>";
}
 ?>
 </div>

<div class="contenair_projets">
  <?php
  //je veux afficher tous mes projets avec
  // des images
  // un titre_nom
  // la technologie
  // dans l'ordre que je veux.


  $reponse = $bdd->query("select * from projet order by ordre");
  // envoie-moi tout sous forme de tableau, dans une variable
  $result_projet = $reponse -> fetchAll();

   foreach($result_projet  as $key => $projet) {
          echo "<div class='tousProjets'>";
          echo "<a href='projet.php?projetChoisi=$projet[id_projet]'> $projet[titre_projet]";
          echo html_image("image/projet/" .  $projet["titre_projet"] . "1.jpg","demoImage" );


  $jointure = $bdd->query("SELECT titre_projet, nom_techno
            FROM projet, technologie, projet_techno
            WHERE projet.id_projet = projet_techno.projet_id
            AND projet_techno.techno_id = technologie.id_techno
            AND projet.titre_projet = '$projet[titre_projet]' ");

  $result_techno = $jointure -> fetchAll();

              foreach($result_techno  as $key => $techno) {
                echo "<br>";
                echo $techno["nom_techno"];
              }
              echo "</a></div>";
    }

        ?>
 </div>
</div>
<?php
include PATH_TEMPLATE . "include/footer.php";
?>
