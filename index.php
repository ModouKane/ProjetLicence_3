<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduManage - Gestion Scolaire Simplifiée</title>
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
            overflow-x: hidden;
        }
        
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
        
        .hero-section {
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)), 
                        url('https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 180px 0;
            text-align: center;
            position: relative;
        }
        
        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 0;
            right: 0;
            height: 100px;
            background: var(--light-color);
            transform: skewY(-3deg);
            z-index: 1;
        }
        
        .feature-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }
        
        .cta-section {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), 
                       url('https://images.unsplash.com/photo-1524179091875-bf99a9a6af57?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 80px 0;
            position: relative;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            right: 0;
            height: 100px;
            background: var(--light-color);
            transform: skewY(3deg);
            z-index: 1;
        }
        
        footer {
            background-color: var(--primary-color);
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-outline-light:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <img src="https://cdn-icons-png.flaticon.com/512/2936/2936775.png" alt="Logo EduManage" class="logo">
                EduManage
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fonctionnalites.php">Fonctionnalités</a>
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

    <!-- Section Hero avec image de fond -->
    <section class="hero-section">
        <div class="container position-relative" style="z-index: 2;">
            <h1 class="display-3 fw-bold mb-4">Gestion Scolaire </h1>
            <p class="lead mb-5 fs-4">Une solution complète pour administrer votre établissement scolaire avec efficacité</p>
            <a href="demo.php" class="btn btn-primary btn-lg px-4 me-2">
                <i class="bi bi-rocket"></i> Démarrer
            </a>
            <a href="features.html" class="btn btn-outline-light btn-lg px-4">
                <i class="bi bi-info-circle"></i> En savoir plus
            </a>
        </div>
    </section>

    <!-- Section Fonctionnalités -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Nos Principales Fonctionnalités</h2>
                <p class="lead text-muted">Découvrez comment EduManage peut transformer la gestion de votre établissement</p>
            </div>
            
            <div class="row g-4">
                <!-- Carte 1 -->
                <div class="col-md-4">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3 class="mb-3">Gestion des Étudiants</h3>
                            <p class="text-muted">Inscription, fiches individuelles, historique académique et suivi complet de tous les étudiants.</p>
                            <a href="GestionEtudiants.php" class="btn btn-outline-primary mt-3">En savoir plus</a>
                        </div>
                    </div>
                </div>
                
                <!-- Carte 2 -->
                <div class="col-md-4">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <h3 class="mb-3">Gestion des Notes</h3>
                            <p class="text-muted">Saisie intuitive des notes, calcul automatique des moyennes et génération de bulletins détaillés.</p>
                            <a href="GestionNotes.php" class="btn btn-outline-primary mt-3">En savoir plus</a>
                        </div>
                    </div>
                </div>
                
                <!-- Carte 3 -->
                <div class="col-md-4">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-calendar-week"></i>
                            </div>
                            <h3 class="mb-3">Emploi du Temps</h3>
                            <p class="text-muted">Planning dynamique des cours, gestion des salles et visualisation pour étudiants et enseignants.</p>
                            <a href="EmploiTemps.php" class="btn btn-outline-primary mt-3">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section CTA -->
    <section class="cta-section">
        <div class="container text-center position-relative" style="z-index: 2;">
            <h2 class="display-5 fw-bold mb-4">Prêt à révolutionner votre gestion scolaire ?</h2>
            <p class="lead mb-5">Rejoignez des centaines d'établissements qui nous font déjà confiance</p>
            <a href="contact.php" class="btn btn-light btn-lg px-4 me-2">
                <i class="bi bi-envelope"></i> Nous contacter
            </a>
            <a href="demo.php" class="btn btn-outline-light btn-lg px-4">
                <i class="bi bi-play-circle"></i> Voir la démo
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/2936/2936775.png" alt="Logo EduManage" class="logo">
                        EduManage
                    </h5>
                    <p>La solution tout-en-un pour la gestion efficace de votre établissement scolaire.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-2"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-twitter fs-4"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-linkedin fs-4"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Navigation</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.php" class="text-white text-decoration-none">Accueil</a></li>
                        <li class="mb-2"><a href="fonctionnalites.php" class="text-white text-decoration-none">Fonctionnalités</a></li>
                        <li class="mb-2"><a href="tarifs.php" class="text-white text-decoration-none">Tarifs</a></li>
                        <li class="mb-2"><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Légal</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="terms.html" class="text-white text-decoration-none">Conditions d'utilisation</a></li>
                        <li class="mb-2"><a href="privacy.html" class="text-white text-decoration-none">Politique de confidentialité</a></li>
                        <li class="mb-2"><a href="legal.html" class="text-white text-decoration-none">Mentions légales</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5 class="fw-bold mb-3">Contact</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> Dakar, Sénégal</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i> +221 33 821 45 67</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> contact@edumanage.sn</li>
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
    <!-- Script personnalisé -->
    <script>
        // Animation au scroll
        document.addEventListener('DOMContentLoaded', function() {
            const featureCards = document.querySelectorAll('.feature-card');
            
            const animateCards = () => {
                featureCards.forEach(card => {
                    const cardPosition = card.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;
                    
                    if(cardPosition < screenPosition) {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }
                });
            };
            
            // Initial state
            featureCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease';
            });
            
            window.addEventListener('scroll', animateCards);
            animateCards(); // Trigger on load
        });
    </script>
</body>
</html>