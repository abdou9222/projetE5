<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="image/VVA.png" />
    <title>Vacancier</title>
    <style>
        body {
            background-color: #f0f9f0; /* Légère teinte verte en arrière-plan */
        }
        header {
            background-color: #28a745; /* Couleur verte principale pour l'en-tête */
            padding: 20px;
            color: white;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        table {
            margin-top: 20px;
        }
        th {
            background-color: #28a745; /* Vert pour les en-têtes du tableau */
            color: white;
        }
        td {
            background-color: #e8f5e9; /* Fond légèrement vert clair pour les cellules */
        }
        footer {
            background-color: #28a745; /* Vert pour le pied de page */
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Compte Vacancier</h1>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="#">Activité</a></li>
                <li><a href="utilisateur.php">Utilisateurs</a></li>
                <li><a href="../index.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Animation</th>
                    <th>Date</th>
                    <th>État</th>
                    <th>Prix</th>
                    <th>Heure de début</th>
                    <th>Date annulation</th>
                    <th>Nom responsable</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Inscription</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                // Inclure le fichier de connexion à la base de données
                include("../bdd.php");

                // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
                $query = "SELECT CODEANIM, E.NOMETATACT, DATEACT, HRRDVACT, PRIXACT, HRDEBUTACT, HRFINACT, DATEANNULEACT, PRENOMRESP, NOMRESP FROM activite A INNER JOIN etat_act E ON A.CODEETATACT = E.CODEETATACT";
                $result = mysqli_query($conn, $query);

                // Afficher les données dans le tableau
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    // Afficher les données dans les colonnes du tableau
                    echo "<td>".$row['CODEANIM']."</td><td>".$row['DATEACT']."</td><td>".$row['NOMETATACT']."</td><td>".$row['PRIXACT']."</td><td>".$row['HRRDVACT']."</td><td>".$row['HRDEBUTACT']."</td><td>".$row['DATEANNULEACT']."</td><td>".$row['PRENOMRESP']."</td><td>".$row['NOMRESP']."</td>";

                    // Bouton d'inscription pour chaque ligne
                    echo '<td><form action="inscriptionvac.php" method="post">';
                    echo '<input type="hidden" name="codeanim" value="'.$row['CODEANIM'].'">';
                    echo '<button type="submit" class="btn btn-success">S\'inscrire</button>';
                    echo '</form></td>';

                    echo "</tr>";
                }

                // Fermer la connexion à la base de données
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Association de vacances</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
