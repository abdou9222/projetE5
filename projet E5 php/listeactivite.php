<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Activité</title>
    <link rel="shortcut icon" href="image/VVA.png" />

    <!-- Intégration de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="listeactivite.css">
</head>
<body>

    <!-- Titre de la page -->
    <div class="container my-5">
        <h1 class="text-center text-success">Liste des Activités</h1>
    </div>

    <!-- Tableau des activités -->
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>Animation</th>
                    <th>Date</th>
                    <th>État</th>
                    <th>Prix</th>
                    <th>Heure de début</th>
                    <th>Date annulation</th>
                    <th>Nom responsable</th>
                    <th>Prénom responsable</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include("bdd.php");
                $id = $_GET['id'];

                $query = "SELECT CODEANIM, E.NOMETATACT, DATEACT, HRRDVACT, PRIXACT, HRDEBUTACT, HRFINACT, DATEANNULEACT, PRENOMRESP, NOMRESP 
                          FROM activite A 
                          INNER JOIN etat_act E ON A.CODEETATACT = E.CODEETATACT WHERE CODEANIM=$id";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".htmlspecialchars($row['CODEANIM'])."</td>";
                        echo "<td>".htmlspecialchars($row['DATEACT'])."</td>";
                        echo "<td>".htmlspecialchars($row['NOMETATACT'])."</td>";
                        echo "<td>".htmlspecialchars($row['PRIXACT'])." €</td>";
                        echo "<td>".htmlspecialchars($row['HRRDVACT'])."</td>";
                        echo "<td>".htmlspecialchars($row['DATEANNULEACT'])."</td>";
                        echo "<td>".htmlspecialchars($row['NOMRESP'])."</td>";
                        echo "<td>".htmlspecialchars($row['PRENOMRESP'])."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Aucune activité disponible</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bouton de retour -->
    <div class="container text-center my-4">
        <a href="index.php" class="btn btn-success">Retour</a>
    </div>

    <!-- Pied de page -->
    <footer class="bg-success text-white text-center py-3">
        <p>&copy; 2024 Association VVA</p>
    </footer>

    <!-- Intégration de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
