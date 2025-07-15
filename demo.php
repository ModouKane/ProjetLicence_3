<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démonstration Interactive | EduManage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --transition-speed: 0.4s;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
            overflow-x: hidden;
        }
        
        /* Header amélioré */
        .demo-header {
            background: linear-gradient(135deg, var(--primary-color), #1a2a3a);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        /* Hero section redessinée */
        .demo-hero {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.95)), 
                        url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0 100px;
            position: relative;
            overflow: hidden;
        }
        
        .demo-hero::before {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -10%;
            right: -10%;
            height: 100px;
            background: var(--light-color);
            transform: rotate(2deg);
            z-index: 1;
        }
        
        .hero-title {
            font-size: 3.2rem;
            line-height: 1.2;
            text-shadow: 0 2px 8px rgba(0,0,0,0.2);
            position: relative;
            z-index: 2;
        }
        
        /* Cartes redessinées */
        .demo-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            background: white;
            position: relative;
            z-index: 1;
        }
        
        .demo-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--secondary-color);
            transition: all var(--transition-speed) ease;
        }
        
        .demo-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
        }
        
        .demo-card:hover::after {
            height: 6px;
            background: var(--accent-color);
        }
        
        .demo-icon {
            font-size: 2.8rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
            transition: all var(--transition-speed) ease;
        }
        
        .demo-card:hover .demo-icon {
            transform: scale(1.1);
            color: var(--accent-color);
        }
        
        /* Étapes de démo améliorées */
        .demo-steps-container {
            position: relative;
        }
        
        .demo-steps-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 15px;
            height: 100%;
            width: 2px;
            background: var(--secondary-color);
            opacity: 0.2;
        }
        
        .demo-step {
            position: relative;
            padding-left: 50px;
            margin-bottom: 40px;
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.6s ease;
        }
        
        .demo-step.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        .demo-step-number {
            position: absolute;
            left: 0;
            top: 0;
            width: 32px;
            height: 32px;
            background: var(--secondary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
            z-index: 2;
        }
        
        /* Vidéo responsive */
        .demo-video-wrapper {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            transform: perspective(1000px) rotateY(-5deg);
            transition: all var(--transition-speed) ease;
            border: 8px solid white;
        }
        
        .demo-video-wrapper:hover {
            transform: perspective(1000px) rotateY(0deg);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        .demo-video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }
        
        .demo-video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        /* Section CTA améliorée */
        .demo-cta {
            background: linear-gradient(135deg, var(--secondary-color), #258cd1);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .demo-cta::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -10%;
            right: -10%;
            height: 100px;
            background: var(--light-color);
            transform: rotate(-2deg);
            z-index: 1;
        }
        
        .demo-cta-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-title {
            font-size: 2.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Footer amélioré */
        .demo-footer {
            background: linear-gradient(to right, #1a2a3a, var(--primary-color));
            color: white;
            position: relative;
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .floating-icon {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .demo-video-wrapper {
                transform: none;
                margin-top: 40px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar améliorée -->
    <nav class="navbar navbar-expand-lg navbar-dark demo-header sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <img src="https://cdn-icons-png.flaticon.com/512/2936/2936775.png" alt="Logo EduManage" class="logo me-2" style="height: 40px;">
                <span class="align-middle">EduManage</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDemo">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarDemo">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="bi bi-house-door me-1"></i> Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="demo.php"><i class="bi bi-play-circle me-1"></i> Démo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fonctionnalites.php"><i class="bi bi-list-check me-1"></i> Fonctionnalités</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a class="btn btn-light rounded-pill px-3" href="login.php">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Connexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section Redesign -->
    <section class="demo-hero">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title fw-bold mb-4">Explorez EduManage en Action</h1>
                    <p class="lead mb-5 fs-4">Découvrez comment notre solution peut transformer la gestion de votre établissement scolaire</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#demo-features" class="btn btn-primary btn-lg px-4 rounded-pill">
                            <i class="bi bi-play-fill me-2"></i> Voir la démo
                        </a>
                        <a href="contact.php" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                            <i class="bi bi-calendar-check me-2"></i> RDV personnalisé
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Fonctionnalités Démo -->
    <section id="demo-features" class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <div class="floating-icon d-inline-block mb-4">
                    <i class="bi bi-stars demo-icon" style="color: var(--accent-color); font-size: 3rem;"></i>
                </div>
                <h2 class="display-5 fw-bold mb-3">Fonctionnalités Clés</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">Découvrez les outils puissants qui simplifieront votre gestion quotidienne</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="demo-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="demo-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3 class="mb-3">Gestion des Étudiants</h3>
                            <p class="text-muted">Centralisez toutes les informations étudiantes avec des dossiers complets et personnalisables.</p>
                            <a href="#student-demo" class="btn btn-outline-primary mt-3 rounded-pill px-3">
                                Voir en détail <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="demo-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="demo-icon">
                                <i class="bi bi-journal-check"></i>
                            </div>
                            <h3 class="mb-3">Suivi Pédagogique</h3>
                            <p class="text-muted">Analysez les résultats et progressez avec des outils de suivi avancés.</p>
                            <a href="#pedagogy-demo" class="btn btn-outline-primary mt-3 rounded-pill px-3">
                                Voir en détail <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="demo-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="demo-icon">
                                <i class="bi bi-calendar-week"></i>
                            </div>
                            <h3 class="mb-3">Planification</h3>
                            <p class="text-muted">Optimisez l'emploi du temps et la gestion des ressources.</p>
                            <a href="#planning-demo" class="btn btn-outline-primary mt-3 rounded-pill px-3">
                                Voir en détail <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Démo Interactive -->
    <section class="py-5" id="student-demo">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="demo-steps-container pe-lg-5">
                        <div class="demo-step">
                            <div class="demo-step-number">1</div>
                            <h3 class="h4">Inscription Simplifiée</h3>
                            <p>Processus d'inscription en ligne avec validation en temps réel et gestion des documents.</p>
                        </div>
                        
                        <div class="demo-step">
                            <div class="demo-step-number">2</div>
                            <h3 class="h4">Dossiers Complets</h3>
                            <p>Fiches étudiantes avec historique académique, absences, sanctions et commentaires.</p>
                        </div>
                        
                        <div class="demo-step">
                            <div class="demo-step-number">3</div>
                            <h3 class="h4">Communication Intégrée</h3>
                            <p>Messagerie interne pour échanger avec les étudiants et leurs responsables.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="demo-video-wrapper">
                        <div class="demo-video-container">
                            <!-- Remplacez par votre vidéo ou capture d'écran interactif -->
                            <img src="https://via.placeholder.com/800x450?text=Capture+Gestion+Étudiants" alt="Gestion des étudiants" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Autres sections de démo similaires pour pédagogie et planning -->
    
    <!-- Section CTA améliorée -->
    <section class="demo-cta">
        <div class="container text-center demo-cta-content">
            <h2 class="cta-title fw-bold mb-4">Prêt à transformer votre établissement ?</h2>
            <p class="lead mb-5">Notre équipe est à votre disposition pour une démonstration personnalisée</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="contact.php" class="btn btn-light btn-lg px-4 rounded-pill">
                    <i class="bi bi-calendar-check me-2"></i> Planifier un RDV
                </a>
                <a href="tel:+33123456789" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                    <i class="bi bi-telephone me-2"></i> Nous appeler
                </a>
            </div>
        </div>
    </section>

    <!-- Footer amélioré -->
    <footer class="demo-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3 d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Logo EduManage" class="logo me-2" style="height: 40px;">
                        EduManage
                    </h5>
                    <p class="small">La solution innovante pour une gestion scolaire optimisée et simplifiée.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-linkedin fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube fs-5"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Navigation</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.php" class="text-white text-decoration-none small">Accueil</a></li>
                        <li class="mb-2"><a href="demo.php" class="text-white text-decoration-none small">Démonstration</a></li>
                        <li class="mb-2"><a href="fonctionnalites.php" class="text-white text-decoration-none small">Fonctionnalités</a></li>
                        <li class="mb-2"><a href="contact.php" class="text-white text-decoration-none small">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Ressources</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none small">Documentation</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none small">FAQ</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none small">Blog</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none small">Centre d'aide</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6 class="fw-bold mb-3">Contact</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> contact@edumanage.fr</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i> +33 1 23 45 67 89</li>
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>  Rue de l'Éducation</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light opacity-25">
            <div class="text-center pt-3">
                <p class="small mb-0">&copy; <?php echo date("Y"); ?> EduManage. Tous droits réservés. <a href="#" class="text-white text-decoration-none">Mentions légales</a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation des étapes au scroll
        function animateSteps() {
            const steps = document.querySelectorAll('.demo-step');
            steps.forEach((step, index) => {
                const stepPosition = step.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                
                if(stepPosition < screenPosition) {
                    step.classList.add('visible');
                }
            });
        }
  