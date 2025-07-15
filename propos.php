<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - EduManage</title>
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
        
        .about-hero {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), 
                        url('https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0;
            text-align: center;
        }
        
        .team-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .team-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .mission-section {
            background-color: var(--light-color);
        }
        
        .values-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        
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
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .team-details {
            font-size: 0.9rem;
            color: #6c757d;
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
                        <a class="nav-link" href="fonctionnalites.php">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="propos.php">À propos</a>
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

    <!-- Contenu principal -->
    <main>
        <!-- Section Hero À propos -->
        <section class="about-hero">
            <div class="container">
                <h1 class="display-3 fw-bold mb-4">À propos d'EduManage</h1>
                <p class="lead fs-4">Notre mission est de révolutionner la gestion scolaire grâce à des solutions innovantes</p>
            </div>
        </section>

        <!-- Section Notre histoire -->
        <section class="py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-4">Notre Histoire</h2>
                        <p class="lead">Fondé en 2018, EduManage est né d'une simple idée : simplifier la gestion des établissements scolaires.</p>
                        <p>Après des années de recherche et de développement, nous avons créé une plateforme complète qui répond aux besoins des administrateurs, enseignants, étudiants et parents.</p>
                        <p>Aujourd'hui, nous accompagnons plus de 250 établissements dans toute les regions du Senegal, avec une satisfaction client de 98%.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Équipe EduManage" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Mission -->
        <section class="mission-section py-5">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold mb-3">Notre Mission</h2>
                    <p class="lead text-muted">Nous nous engageons à fournir les meilleures solutions pour votre établissement</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-transparent text-center">
                            <div class="card-body">
                                <div class="values-icon">
                                    <i class="bi bi-lightbulb"></i>
                                </div>
                                <h3>Innovation</h3>
                                <p>Nous développons constamment de nouvelles fonctionnalités pour répondre aux besoins changeants du secteur éducatif.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-transparent text-center">
                            <div class="card-body">
                                <div class="values-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <h3>Collaboration</h3>
                                <p>Nous travaillons main dans la main avec nos clients pour créer des solutions adaptées à leurs besoins spécifiques.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-transparent text-center">
                            <div class="card-body">
                                <div class="values-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <h3>Sécurité</h3>
                                <p>La protection de vos données est notre priorité absolue, avec des protocoles de sécurité de niveau bancaire.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Équipe -->
        <section class="py-5">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold mb-3">Notre Équipe</h2>
                    <p class="lead text-muted">Des experts passionnés par l'éducation et la technologie</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card team-card h-100">
                            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top team-img" alt="Ndeye">
                            <div class="card-body text-center">
                                <h3 class="card-title">Ndeye</h3>
                                <p class="text-muted">CEO & Fondatrice</p>
                                <p class="card-text">15 ans d'expérience dans le management éducatif et la technologie.</p>
                                <div class="team-details">
                                    <p><i class="bi bi-envelope"></i> ndeye@unchk.edu.sn</p>
                                    <p><i class="bi bi-person-badge"></i> INE:N6517220212</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card team-card h-100">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top team-img" alt="Mouhamadou">
                            <div class="card-body text-center">
                                <h3 class="card-title">Mouhamadou</h3>
                                <p class="text-muted">Directeur Technique</p>
                                <p class="card-text">Expert en développement logiciel avec une passion pour l'éducation.</p>
                                <div class="team-details">
                                    <p><i class="bi bi-envelope"></i> mouhamadou@unchk.edu.sn</p>
                                    <p><i class="bi bi-person-badge"></i> INE: N02758320201</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card team-card h-100">
                            <img src="https://images.unsplash.com/photo-1573497019707-1c04de26e4fb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top team-img" alt="Gnagna">
                            <div class="card-body text-center">
                                <h3 class="card-title">Gnagna</h3>
                                <p class="text-muted">Responsable Pédagogique</p>
                                <p class="card-text">Ancienne proviseure, elle garantit l'adéquation de nos solutions avec les besoins réels.</p>
                                <div class="team-details">
                                    <p><i class="bi bi-envelope"></i> gnagna@unchk.edu.sn</p>
                                    <p><i class="bi bi-person-badge"></i> INE: N02773020202</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Ajout de 3 membres supplémentaires -->
                    <div class="col-md-4">
                        <div class="card team-card h-100">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top team-img" alt="Francois">
                            <div class="card-body text-center">
                                <h3 class="card-title">Francois</h3>
                                <p class="text-muted">Développeur Full-Stack</p>
                                <p class="card-text">Spécialiste en développement web et applications mobiles pour l'éducation.</p>
                                <div class="team-details">
                                    <p><i class="bi bi-envelope"></i> Fancois@unchk.edu.sn</p>
                                    <p><i class="bi bi-person-badge"></i> INE: N06526120211</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card team-card h-100">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top team-img" alt="Fatou">
                            <div class="card-body text-center">
                                <h3 class="card-title">Fatou</h3>
                                <p class="text-muted">Designer UX/UI</p>
                                <p class="card-text">Crée des interfaces intuitives et accessibles pour une meilleure expérience utilisateur.</p>
                                <div class="team-details">
                                    <p><i class="bi bi-envelope"></i> fatou134@edu.sn</p>
                                    <p><i class="bi bi-person-badge"></i> INE: N03381320221</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card team-card h-100">
                            <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top team-img" alt="Yacine">
                            <div class="card-body text-center">
                                <h3 class="card-title">Yacine</h3>
                                <p class="text-muted">Responsable Support Client</p>
                                <p class="card-text">Assure la formation et l'accompagnement de nos clients pour une adoption réussie.</p>
                                <div class="team-details">
                                    <p><i class="bi bi-envelope"></i> yacine18@unchk.edu.sn</p>
                                    <p><i class="bi bi-person-badge"></i> INE: N04567120231</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section CTA -->
        <section class="bg-primary text-white py-5">
            <div class="container text-center py-4">
                <h2 class="fw-bold mb-4">Prêt à transformer votre établissement ?</h2>
                <p class="lead mb-4">Découvrez comment EduManage peut vous aider dès aujourd'hui</p>
                <a href="contact.html" class="btn btn-light btn-lg px-4 me-2">
                    <i class="bi bi-envelope"></i> Nous contacter
                </a>
                <a href="demo.html" class="btn btn-outline-light btn-lg px-4">
                    <i class="bi bi-play-circle"></i> Voir la démo
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">
                        <img src="https://i.ibb.co/7Yk3z7F/edumanage-logo.png" alt="Logo EduManage" class="logo">
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
                        <li class="mb-2"><a href="index.html">Accueil</a></li>
                        <li class="mb-2"><a href="fonctionnalites.php">Fonctionnalités</a></li>
                        <li class="mb-2"><a href="pricing.html">Tarifs</a></li>
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
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> Rue 10, Dakar Plateau, Sénégal</li>
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
</body>
</html>