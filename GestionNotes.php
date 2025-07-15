<?php
$page_title = "Gestion des Notes - EduManage";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
        }
        
        .notes-header {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), 
                        url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        
        .grade-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .grade-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .grade-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        
        .highlight {
            color: var(--accent-color);
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-color);">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-book me-2"></i>EduManage
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="GestionNotes.php">Notes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- En-tête -->
    <header class="notes-header text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Gestion des Notes</h1>
            <p class="lead">Système complet d'évaluation et de suivi académique</p>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container my-5">
        <div class="row g-4">
            <!-- Carte 1 -->
            <div class="col-md-6">
                <div class="card grade-card h-100">
                    <div class="card-body p-4 text-center">
                        <div class="grade-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h3>Saisie des notes</h3>
                        <p>Interface intuitive pour la saisie des résultats avec <span class="highlight">validation automatique</span> des données.</p>
                    </div>
                </div>
            </div>
            
            <!-- Carte 2 -->
            <div class="col-md-6">
                <div class="card grade-card h-100">
                    <div class="card-body p-4 text-center">
                        <div class="grade-icon">
                            <i class="bi bi-calculator"></i>
                        </div>
                        <h3>Calcul des moyennes</h3>
                        <p>Génération <span class="highlight">automatique</span> des moyennes par matière, classe et étudiant.</p>
                    </div>
                </div>
            </div>
            
            <!-- Carte 3 -->
            <div class="col-md-6">
                <div class="card grade-card h-100">
                    <div class="card-body p-4 text-center">
                        <div class="grade-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h3>Bulletins scolaires</h3>
                        <p>Création <span class="highlight">automatisée</span> des bulletins avec personnalisation des modèles.</p>
                    </div>
                </div>
            </div>
            
            <!-- Carte 4 -->
            <div class="col-md-6">
                <div class="card grade-card h-100">
                    <div class="card-body p-4 text-center">
                        <div class="grade-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h3>Analyses statistiques</h3>
                        <p>Tableaux de bord et <span class="highlight">graphiques</span> pour suivre les performances.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bouton de retour -->
        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-primary px-4 py-2">
                <i class="bi bi-arrow-left me-2"></i> Retour à l'accueil
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; <?= date('Y') ?> EduManage - Tous droits réservés</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>