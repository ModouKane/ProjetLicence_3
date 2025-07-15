<?php
$current_page = 'features';
$page_title = 'Gestion des Étudiants | EduManage';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icônes Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .hero-student {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), 
                        url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            color: white;
            padding: 100px 0;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
        }
        
        .student-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .student-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <!-- Navbar (identique à index.php) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <img src="https://cdn-icons-png.flaticon.com/512/2936/2936775.png" alt="Logo EduManage" width="40" class="me-2">
                EduManage
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="fonctionnalites.php">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="GestionEtudiants.php">Gestion Étudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-student">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Gestion des Étudiants</h1>
            <p class="lead">Solution complète pour la gestion de votre population étudiante</p>
        </div>
    </section>

    <!-- Contenu Principal -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Gestion centralisée des étudiants</h2>
                    <p>Notre module de gestion étudiante offre une solution complète pour :</p>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">Inscriptions et admissions</li>
                        <li class="list-group-item">Dossiers académiques complets</li>
                        <li class="list-group-item">Suivi des présences</li>
                        <li class="list-group-item">Communication avec les étudiants</li>
                        <li class="list-group-item">Gestion des frais de scolarité</li>
                    </ul>
                    <a href="contact.php" class="btn btn-primary px-4">Demander une démo</a>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Gestion des étudiants" class="img-fluid rounded shadow">
                </div>
            </div>
            
            <hr class="my-5">
            
            <h2 class="text-center mb-5">Fonctionnalités clés</h2>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card student-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            <h3>Inscription</h3>
                            <p>Processus d'inscription simplifié avec validation en temps réel des documents.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card student-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <h3>Dossiers</h3>
                            <p>Stockage sécurisé de tous les documents académiques et administratifs.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card student-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h3>Suivi</h3>
                            <p>Tableaux de bord pour suivre la progression académique de chaque étudiant.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (identique à index.php) -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="text-center">
                <p class="mb-0">&copy; <?= date('Y') ?> EduManage - Tous droits réservés</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>