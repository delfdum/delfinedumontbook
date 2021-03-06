<?php include 'config.php';
include PATH_TEMPLATE . "include/head.php";
//projets affichés en fonction de la techno choisi
?>

<?php
if (empty($_GET["lien_techno"])) {
  header("location:projet_liens.php");
  exit;
}
//La requête pour récuperer tous les projets en fonction de la techno choisie
$reponse = $bdd->query(" SELECT * from projet,projet_techno,technologie
                        WHERE projet.id_projet=projet_techno.projet_id
                        AND projet_techno.techno_id= technologie.id_techno
                        AND technologie.nom_techno = '$_GET[lien_techno]'");
$result_techno = $reponse->fetchAll();


if (empty($result_techno)) { //si requete vide, je reviens sur ma page avec tous les projets
  header("location:projet_liens.php");
  exit;
} else { //et sinon tu affiches ma requete:
    echo "<main>";
    echo "<h1> Mes projets élaborés avec $_GET[lien_techno] </h1><br> ";
    echo "<div class='contenair_projets'>";

        foreach ($result_techno as $key => $projetParTechno) {
          //je cree url


          $url_lienProjet = "projet.php?projetChoisi=" . $projetParTechno["id_projet"];

          echo "<div class='tousProjets'>";
          echo "<a href='$url_lienProjet'>" . $projetParTechno['titre_projet'] .  "</a>";
          echo html_image("image/projet/" .  $projetParTechno["titre_projet"] . "1.jpg","demoImage" );
             echo $projetParTechno["texte"] . "<br>";
             echo $projetParTechno["annee_realisation"];

            echo "</div>";
              }
    echo "</div>";
    echo "</main>";
}

include PATH_TEMPLATE . "include/footer.php";
?>
