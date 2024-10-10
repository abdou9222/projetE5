<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="utilisateur.css">
    <title>Admin</title>
    <link rel="shortcut icon" href="image/VVA.png" />
</head>
<body>
    <header>
        <h1>Compte Admin</h1>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="#">activité</a></li>
                <li><a href="utilisateur.php">Utilisateurs</a></li>
                <li><a href="../index.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    
    <table border="2">
        <tr>
            <th>USER</th>
            <th>MDP</th>
            <th>NOM COMPTE</th>
            <th>PRENOM COMPTE</th>
            <th>DATE INSCRIPTION</th>
            <th>DATE FERMETURE</th>
            <th>TYPE COMPTE</th>
            <th>ADRESSE E-MAIL</th>
            <th>TEL COMPTE</th>
            
            <th><a href="ajoutercompte.php" class="lastth">➕</a></th>
        </tr>
        <?php 
        // Inclure le fichier de connexion à la base de données
        include("../bdd.php");
        
        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        $query = "SELECT * FROM compte";
        $result = mysqli_query($conn, $query);
        
        // Afficher les données dans le tableau
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // Afficher les données dans les colonnes du tableau
            echo "<td>" . (isset($row['USER']) ? $row['USER'] : '') . "</td>";
            echo "<td>" . (isset($row['MDP']) ? $row['MDP'] : '') . "</td>";
            echo "<td>" . (isset($row['NOMCOMPTE']) ? $row['NOMCOMPTE'] : '') . "</td>";
            echo "<td>" . (isset($row['PRENOMCOMPTE']) ? $row['PRENOMCOMPTE'] : '') . "</td>";
            echo "<td>" . (isset($row['DATEINSCRIP']) ? $row['DATEINSCRIP'] : '') . "</td>";
            echo "<td>" . (isset($row['DATEFERME']) ? $row['DATEFERME'] : '') . "</td>";
            echo "<td>" . (isset($row['TYPEPROFIL']) ? $row['TYPEPROFIL'] : '') . "</td>";
            echo "<td>" . (isset($row['ADRMAILCOMPTE']) ? $row['ADRMAILCOMPTE'] : '') . "</td>";
            echo "<td>" . (isset($row['NOTELCOMPTE']) ? $row['NOTELCOMPTE'] : '') . "</td>";
            
            
            // Ajouter un lien de suppression pour chaque ligne
            echo "<td><a href='modifier.php?NOMCOMPTE=" . urlencode($row['NOMCOMPTE']) . "' class='lastth'>🔧</a> 
            <a href='supprime.php?NOMCOMPTE=" . urlencode($row['NOMCOMPTE']) . "' class='lastth'>❌</a></td>";
            echo "</tr>";
        }
        
        // Fermer la connexion à la base de données
        mysqli_close($conn);
        ?>
    </table>

    <footer>
        <p>&copy; 2024 Association de vacances</p>
    </footer>
</body>
</html>
