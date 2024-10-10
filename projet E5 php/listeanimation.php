<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="utilisateur.css">
    <title> vacancier</title>
    <link rel="shortcut icon" href="image/VVA.png" />
</head>
<body>
    
    <table border="2">
        <tr>
            <th>Animation</th>
            <th>Type</th>
            <th>Nom animation</th>
            <th>Date de création</th>
            <th>Date de validité</th>
            <th>Durée</th>
            <th>limite d'age</th>
            <th>tarif</th>
            <th>difficulté</th>
            
            
            
        </tr>
        <?php 
        //fichier de connexion à la base de données
        include("bdd.php");
        
        //la requête SQL pour récupérer toutes les colonnes de la table "animation"
        $query = "SELECT CODEANIM, CODETYPEANIM, NOMANIM, DATECREATIONANIM, DATEVALIDITEANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM, DIFFICULTEANIM  FROM animation ";
        $result = mysqli_query($conn, $query);
        
        //les données dans le tableau
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            //les données dans les colonnes du tableau
            
            echo "<td>".$row['CODEANIM']."</td><td>".$row['CODETYPEANIM']."</td><td>".$row['NOMANIM']."</td><td>".$row['DATECREATIONANIM']."</td><td>".$row['DATEVALIDITEANIM']."</td><td>".$row['DUREEANIM']."</td><td>".$row['LIMITEAGE']."</td><td>".$row['TARIFANIM']."</td><td>".$row['DIFFICULTEANIM']."</td>";
            
            
        }
        
        // Ferme la connexion à la base de données
        mysqli_close($conn);
        ?>
    </table>
    <a href="index.php" class="bouton"><button>retour</button></a>
    <footer>
        <p>&copy; 2024 Association de vacances</p>
    </footer>
</body>
</html>
