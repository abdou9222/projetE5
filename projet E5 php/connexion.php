<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="image/VVA.png" />
    <title>Connexion</title>
</head>
<body>
    <div class="container mt-5">
        <!-- lien redirection vers index.php -->
        <a href="index.php" class="btn btn-link">Retour à l'Accueil</a>
        <h1 class="text-center text-success">Se connecter</h1>

        <!-- Formulaire avec les informations que l'on prend pour les mettre dans la base de données -->
        <form action="connexion.php" method="post">
            <div class="form-group">
                <!-- Champs du formulaire nom d'utilisateur -->
                <label for="username">Saisir un nom d'utilisateur :</label>
                <input type="text" name="user" class="form-control" id="username" required>
            </div>
            <div class="form-group">
                <!-- Champs du formulaire mot de passe -->
                <label for="password">Saisir un mot de passe :</label>
                <input type="password" name="mdp" class="form-control" id="password" required>
            </div>
            <div class="form-group text-center">
                <!-- Bouton qui envoie les informations à la bdd -->
                <input type="submit" value="Connexion" class="btn btn-success">
                <!-- Bouton qui enlève toutes les informations du formulaire -->
                <input type="reset" value="Annuler" class="btn btn-secondary">
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
session_start();

include("bdd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = $_POST["user"];
    $b = $_POST["mdp"];

    $a = mysqli_real_escape_string($conn, $a);
    $b = mysqli_real_escape_string($conn, $b);

    $requete = "SELECT `USER`, `MDP`, `TYPEPROFIL` FROM compte WHERE USER = '$a' AND MDP = '$b'";
    $resultat = mysqli_query($conn, $requete);
    $ligne = mysqli_num_rows($resultat);

    if ($ligne == 1) {
        // La connexion est réussie
        $row = mysqli_fetch_assoc($resultat);
        $_SESSION["USER"] = $a;

        if (isset($_SESSION["USER"])) {
            // Vérifier le type de compte et rediriger en conséquence
            $typeCompte = $row["TYPEPROFIL"];
            if ($typeCompte == "1") {
                header("location: test.html");
            } elseif ($typeCompte == "va") {
                header("location: vacancier/accueilvac.php");
            } elseif ($typeCompte == "ad") {
                header("location: admin/vacancierliste.php");
            } elseif ($typeCompte == "en") {
                header("location: encadrant/accueilenc.html");
            } else {
                // Type de compte non géré, gérer en conséquence
                echo "Type de compte non pris en charge.";
            }
        } else {
            header("location: deconnexion.php");
        }
    } else {
        // La connexion a échoué
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
}
?>
