<?php include 'config.php';
include PATH_TEMPLATE . "include/head.php";
//projets affichés en fonction de la techno choisi
?>

<?php
if (empty($_GET["lien_techno"])) {
  header("location:projet_liens.php");
  exit;
}

$reponse = $bdd->query(" SELECT * from projet,projet_techno,technologie
                        WHERE projet.id_projet=projet_techno.projet_id
                        AND projet_techno.techno_id= technologie.id_techno
                        AND technologie.nom_techno = '$_GET[lien_techno]'");
$result_techno = $reponse->fetchAll();

if (empty($result_techno)) {
  header("location:projet_liens.php");
  exit;
} else {
echo "<main>";
echo "<div class='contenair_projets_titre'>";
echo "<h2> Mes projets élaborés avec $_GET[lien_techno] </h2><br> ";
echo "<div class='contenair_projets'>";

        foreach ($result_techno as $key => $projetParTechno) {
          $url_lienProjet = "template/site2020/projet_par_page.php?projetChoisi==" . $projetParTechno["id_projet"];
echo "<div class='contenair_projetSeul'>";
                echo "<a href='  $url_lienProjet'>" . $projetParTechno["titre_projet"] . "</a>";
echo html_image("image/projet/" .  $projetParTechno["titre_projet"] . "1.jpg","demoImage" );
             echo $projetParTechno["texte"] . "<br>";
             echo $projetParTechno["annee_realisation"];

            echo "</div>";
              }
}
echo "</div>";
echo "</div>";
echo "</main>";
include PATH_TEMPLATE . "include/footer.php";
?>
