<?php
// cette page suit la connexion.php, une fois que l'utilisateur a entré ses identifiants, on les verifie et on crée une variable $_SESSION de connexion qui s'activera si les identifiants sont justes. Cette variable de SESSION permettra à l'utilisateur de rester connecté tout le long et on "détruira" cette variable qd l'utilisateur se déconnectera.


include "../config.php";

// on verifie que j'ai bien envoyé des données.

if(empty($_POST["identifiant_admin"]) || empty($_POST["motdepasse_admin"])) {
    $_SESSION["erreur"][] = "Merci de vous connecter";
    header("location: connexion.php");
    exit;
} else {


    // on va voir si l'utilisateur est en base de données
    $queryUtilisateur = "SELECT * FROM user where identifiant='$_POST[identifiant_admin]' AND motdepasse = '$_POST[motdepasse_admin]'";
//var_dump($queryUtilisateur);


    $resultatUtilisateur = $bdd -> query($queryUtilisateur) -> fetch(PDO::FETCH_ASSOC);//un seul utilisateur donc fetch on enlève les [0]
//  var_dump($resultatUtilisateur);

    if(!empty($resultatUtilisateur)) { // Si notre requête retourne des résultats (donc que mon tableau n'est pas vide), c'est qu'il y a un utilisateur avec cet identifiant et ce mot de passe.
        $_SESSION["connected_user"] = $resultatUtilisateur;

        header("location: accueil.php");
        exit;
    } else {
        // si je passe ici, c'est que je n'ai pas trouvé d'utilisateur.
        // je ne peux pas me connecter.
        $_SESSION["erreur"][] = "L'utilisateur n'a pas été trouvé.";
        header("location: connexion.php");
        exit;
    }
}
