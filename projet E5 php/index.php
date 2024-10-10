<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association VVA</title>
    
    <link rel="shortcut icon" href="image/VVA.png" />
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="inde.css">
</head>

<body>

    <!-- Barre de navigation avec Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://fr.bandainamcoent.eu/dragon-ball/dragon-ball-sparking-zero">Association VVA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section d'introduction -->
    <section class="text-center bg-light py-5">
        <div class="container">
            <h1 class="display-4 mb-4 text-success">Bienvenue à l'Association VVA</h1>
            <p class="lead text-secondary">
                L’association VVA, spécialiste des vacances en montagne, vous accueille dans ses villages authentiques situés au cœur des plus beaux massifs français, des Alpes aux Pyrénées. 
                Offrez-vous une expérience de tourisme responsable et humain, où chaque séjour est marqué par un accueil chaleureux, des activités sur-mesure et un engagement fort pour l’environnement. 
                Avec VVA, profitez d’un service de qualité irréprochable et vivez des moments d’échange uniques, pour des vacances inoubliables en pleine nature.
            </p>
        </div>
    </section>

    <!-- Section des animations -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4 text-success">Nos Animations</h2>
            <div class="row g-4">
                <?php 
                include_once ('bdd.php');
                $query = "SELECT `CODEANIM`, `NOMANIM`, `DATEVALIDITEANIM`, `DUREEANIM`, `LIMITEAGE`, `TARIFANIM`, `NBREPLACEANIM`, `DESCRIPTANIM`, `COMMENTANIM`, `DIFFICULTEANIM` FROM `animation`";
                $conn1 = mysqli_query($conn, $query);

                if ($conn1 && mysqli_num_rows($conn1) > 0) {
                    while($enre = mysqli_fetch_array($conn1)) { 
                ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                           <center> <h5 class="card-title text-success"><?php echo htmlspecialchars($enre['NOMANIM']); ?></h5></center>
                            <p class="card-text">
                                <strong>Date de validité :</strong> <?php echo htmlspecialchars($enre['DATEVALIDITEANIM']); ?><br>
                                <strong>Durée :</strong> <?php echo htmlspecialchars($enre['DUREEANIM']); ?> heures<br>
                                <strong>Âge limite :</strong> <?php echo htmlspecialchars($enre['LIMITEAGE']); ?> ans<br>
                                <strong>Tarif :</strong> <?php echo htmlspecialchars($enre['TARIFANIM']); ?> €<br>
                                <strong>Nombre de places :</strong> <?php echo htmlspecialchars($enre['NBREPLACEANIM']); ?><br>
                                <strong>Description :</strong> <?php echo htmlspecialchars($enre['DESCRIPTANIM']); ?><br>
                                <strong>Commentaire :</strong> <?php echo htmlspecialchars($enre['COMMENTANIM']); ?><br>
                                <strong>Difficulté :</strong> <?php echo htmlspecialchars($enre['DIFFICULTEANIM']); ?>
                            </p>
                            <a href="listeactivite.php?id='<?php echo $enre['CODEANIM'] ?>'" class="btn btn-success">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                } else {
                    echo "<p class='text-center'>Aucune animation disponible pour le moment.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Section de connexion et inscription -->
    <div class="text-center py-5 bg-light">
        <a href="connexion.php" class="btn btn-outline-success me-2">Connexion</a>
    </div>

    <!-- Pied de page -->
    <footer class="bg-success text-white text-center py-4">
        <p>&copy; 2024 Association VVA, Tous droits réservés</p>
    </footer>

    <!-- Intégration de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
