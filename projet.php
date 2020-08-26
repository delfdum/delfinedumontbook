<?php include "config.php";


function unProjet ($idProjet) {
    // retourne toutes les informations du menu qui a comme identifiant $idProjet

    global $bdd;

    $query = $bdd -> prepare("select * from projet where id_projet = :idProjet");

    $query -> execute([":idProjet" => $idProjet]);

    return $query -> fetch(PDO::FETCH_ASSOC);
}
 $projet_a_afficher = unProjet($_GET["projetChoisi"]);

//  echo "<pre>";
// var_dump($projet_a_afficher);
//  echo "<pre>";
//exit;

 function lesTechnos ($idTechno) {

     global $bdd;

     $query2 = $bdd -> prepare("SELECT nom_techno
       FROM projet, technologie, projet_techno
       WHERE projet.id_projet = projet_techno.projet_id
       AND projet_techno.techno_id = technologie.id_techno
       AND projet.id_projet = :idProjet ");

     $query2 -> execute([":idProjet" => $idTechno]);//

     return $query2 -> fetchAll(PDO::FETCH_ASSOC); // on utilise fetch et non fetchAll car nous souhaitons retourner un seul résultat.
 }
 $techno_a_afficher = lesTechnos($_GET["projetChoisi"]);


 include PATH_TEMPLATE . "projet_par_page.php";
