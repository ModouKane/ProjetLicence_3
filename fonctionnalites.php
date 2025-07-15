<?php
$current_page = 'features'; // Pour la navigation active
$page_title = 'Fonctionnalités complètes | EduManage';
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
    <!-- CSS personnalisé -->
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
        }
        
        /* Navbar Styles */
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        
        .logo {
            height: 40px;
            margin-right: 10px;
        }
        
        .nav-link.active {
            font-weight: 600;
            color: var(--secondary-color) !important;
        }
        
        /* Feature Page Styles */
        .feature-hero {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), 
                        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        
        .feature-section {
            padding: 80px 0;
        }
        
        .feature-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }
        
        .feature-step {
            position: relative;
            padding-left: 30px;
            margin-bottom: 20px;
        }
        
        .feature-step:before {
            content: '';
            position: absolute;
            left: 0;
            top: 5px;
            width: 20px;
            height: 20px;
            background-color: var(--secondary-color);
            border-radius: 50%;
        }
        
        /* Footer Styles */
        footer {
            background-color: var(--primary-color);
            color: white;
        }
        
        .footer-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--secondary-color);
        }
        
        .social-icons a {
            color: white;
            transition: color 0.3s;
        }
        
        .social-icons a:hover {
            color: var(--secondary-color);
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">
                <img src="https://cdn-icons-png.flaticon.com/512/2936/2936775.png" alt="Logo EduManage" class="logo">
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
                        <a class="nav-link" href="propos.php">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-light" href="login.php">
                            <i class="bi bi-box-arrow-in-right"></i> Connexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="feature-hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Nos Fonctionnalités Complètes</h1>
            <p class="lead mb-5">Découvrez comment EduManage révolutionne la gestion scolaire</p>
        </div>
    </section>

    <!-- Section Principale -->
    <section class="feature-section">
        <div class="container">
            <!-- Gestion des Étudiants -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card feature-card h-100">
                        <div class="card-body p-4">
                            <div class="feature-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h2>Gestion Complète des Étudiants</h2>
                            <p class="text-muted">Une solution intégrée pour gérer efficacement votre population étudiante.</p>
                            
                            <div class="feature-step">
                                <h4>Inscription Simplifiée</h4>
                                <p>Processus d'inscription en ligne avec validation en temps réel.</p>
                            </div>
                            
                            <div class="feature-step">
                                <h4>Dossiers Complets</h4>
                                <p>Stockage sécurisé de toutes les informations académiques et personnelles.</p>
                            </div>
                            
                            <div class="feature-step">
                                <h4>Suivi Personnalisé</h4>
                                <p>Historique académique et tableau de bord de progression.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Gestion des étudiants" class="img-fluid rounded shadow">
                </div>
            </div>
            
            <!-- Gestion des Notes -->
            <div class="row align-items-center mb-5 flex-lg-row-reverse">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card feature-card h-100">
                        <div class="card-body p-4">
                            <div class="feature-icon">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <h2>Système Avancé de Gestion des Notes</h2>
                            <p class="text-muted">Suivi précis des résultats académiques.</p>
                            
                            <div class="feature-step">
                                <h4>Saisie Intuitive</h4>
                                <p>Interface optimisée pour une saisie rapide des notes.</p>
                            </div>
                            
                            <div class="feature-step">
                                <h4>Calculs Automatiques</h4>
                                <p>Moyennes, classements et statistiques générés automatiquement.</p>
                            </div>
                            
                            <div class="feature-step">
                                <h4>Bulletins Personnalisables</h4>
                                <p>Génération de bulletins avec votre charte graphique.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Gestion des notes" class="img-fluid rounded shadow">
                </div>
            </div>
            
            <!-- Emploi du Temps -->
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card feature-card h-100">
                        <div class="card-body p-4">
                            <div class="feature-icon">
                                <i class="bi bi-calendar-week"></i>
                            </div>
                            <h2>Emploi du Temps Intelligent</h2>
                            <p class="text-muted">Optimisation et gestion simplifiée des plannings.</p>
                            
                            <div class="feature-step">
                                <h4>Gestion des Ressources</h4>
                                <p>Affectation automatique des salles en fonction des disponibilités.</p>
                            </div>
                            
                            <div class="feature-step">
                                <h4>Visualisation Claire</h4>
                                <p>Interface intuitive pour étudiants et enseignants.</p>
                            </div>
                            
                            <div class="feature-step">
                                <h4>Notifications</h4>
                                <p>Alertes en cas de modifications ou conflits d'emploi du temps.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Emploi du temps" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Autres Fonctionnalités -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Autres Fonctionnalités Clés</h2>
            
            <div class="row g-4">
                <!-- Carte 1 -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body p-4 text-center">
                            <div class="feature-icon">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <h3>Communication</h3>
                            <p>Messagerie interne, annonces et notifications en temps réel.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Carte 2 -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body p-4 text-center">
                            <div class="feature-icon">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                            </div>
                            <h3>Reporting</h3>
                            <p>Génération de rapports détaillés et export des données.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Carte 3 -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body p-4 text-center">
                            <div class="feature-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <h3>Application Mobile</h3>
                            <p>Accès à toutes les fonctionnalités depuis votre smartphone.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/2936/2936775.png" alt="Logo EduManage" class="logo">
                        EduManage
                    </h5>
                    <p>La solution tout-en-un pour la gestion efficace de votre établissement scolaire.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter fs-4"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-linkedin fs-4"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Navigation</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="index.php">Accueil</a></li>
                        <li class="mb-2"><a href="fonctionnalites.php">Fonctionnalités</a></li>
                        <li class="mb-2"><a href="tarifs.php">Tarifs</a></li>
                        <li class="mb-2"><a href="propos.php">À propos</a></li>
                        <li class="mb-2"><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Légal</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="terms.html">Conditions d'utilisation</a></li>
                        <li class="mb-2"><a href="privacy.html">Politique de confidentialité</a></li>
                        <li class="mb-2"><a href="legal.html">Mentions légales</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5 class="fw-bold mb-3">Contact</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> 123 Rue de l'Éducation, Paris</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i> +33 1 23 45 67 89</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> contact@edumanage.fr</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date("Y"); ?> EduManage - Tous droits réservés</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script d'animation -->
    <script>
        // Animation des éléments au défilement
        document.addEventListener('DOMContentLoaded', function() {
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.feature-step, .feature-card');
                
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;
                    
                    if (elementPosition < screenPosition) {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }
                });
            };
            
            // Initial state
            const elements = document.querySelectorAll('.feature-step, .feature-card');
            elements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'all 0.5s ease';
            });
            
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Déclenche au chargement
        });
    </script>
</body>
</html>