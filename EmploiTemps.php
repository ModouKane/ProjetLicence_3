<?php
$page_title = "Emploi du Temps - EduManage";
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
        
        .schedule-header {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), 
                        url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        
        .schedule-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            height: 100%;
        }
        
        .schedule-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .schedule-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        
        .time-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .time-table th, .time-table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }
        
        .time-table th {
            background-color: var(--primary-color);
            color: white;
        }
        
        .time-table tr:nth-child(even) {
            background-color: #f8f9fa;
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
                        <a class="nav-link active" href="EmploiTemps.php">Emploi du temps</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- En-tête -->
    <header class="schedule-header text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Gestion des Emplois du Temps</h1>
            <p class="lead">Planification intelligente des cours et ressources</p>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container my-5">
        <div class="row g-4 mb-5">
            <!-- Carte 1 -->
            <div class="col-md-6">
                <div class="card schedule-card">
                    <div class="card-body p-4 text-center">
                        <div class="schedule-icon">
                            <i class="bi bi-calendar3"></i>
                        </div>
                        <h3>Planification automatique</h3>
                        <p>Génération intelligente des emplois du temps en fonction des contraintes.</p>
                    </div>
                </div>
            </div>
            
            <!-- Carte 2 -->
            <div class="col-md-6">
                <div class="card schedule-card">
                    <div class="card-body p-4 text-center">
                        <div class="schedule-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>Gestion des salles</h3>
                        <p>Optimisation de l'utilisation des salles et ressources disponibles.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Exemple d'emploi du temps -->
        <h2 class="text-center mb-4">Exemple d'emploi du temps</h2>
        <div class="table-responsive mb-5">
            <table class="time-table">
                <thead>
                    <tr>
                        <th>Heure</th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>8h-10h</td>
                        <td>Mathématiques</td>
                        <td>Physique</td>
                        <td>Histoire</td>
                        <td>Français</td>
                        <td>SVT</td>
                    </tr>
                    <tr>
                        <td>10h-12h</td>
                        <td>Anglais</td>
                        <td>Mathématiques</td>
                        <td>EPS</td>
                        <td>Philosophie</td>
                        <td>Physique</td>
                    </tr>
                    <tr>
                        <td>13h30-15h30</td>
                        <td>Philosophie</td>
                        <td>Français</td>
                        <td>Mathématiques</td>
                        <td>Anglais</td>
                        <td>Histoire</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Bouton de retour -->
        <div class="text-center">
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