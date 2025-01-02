<?php
// pour avoir la session sur toute les pages ; il faut faire un session() dans le header 
 session_start()  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style--cdn-css-bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- style-css-bootstrap-pour les couleur -->
    <link rel="stylesheet" href="./css/override-bootstrap.css">
    <!-- style--cdn-icon-bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Okazz Blog</title>
</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img width="150" src="./images/logo-okaz.png" alt="okaz logo">
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 link-secondary">Accueil</a></li>
                <li><a href="annonces.php" class="nav-link px-2">Annonces</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <!-- pour montrer que l'utisateur est bien connecté et qu'il peut se deconnecter -->
                <?php if (isset($_SESSION["users"])): ?>
                    <span>Bonjour <?= $_SESSION["users"]["username"] ?></span>
                    <a type="button" class="btn btn-primary" href="logout.php">Déconnexion</a>
                <?php else: ?>
                    <a type="button" class="btn btn-outline-primary me-2" href="login.php">connexion</a>
                    <a type="button" class="btn btn-primary" href="inscription.php">inscription</a>
                <?php endif; ?>
            </div>
        </header>
        <!-- le contenu de la page -->
        <main>