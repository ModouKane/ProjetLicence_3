<?php
$current_page = 'contact';
$page_title = 'Contactez-nous | EduManage';
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
        
        /* Navbar */
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
        
        /* Hero Section */
        .contact-hero {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), 
                        url('https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        
        /* Contact Form */
        .contact-form {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        
        /* Contact Info */
        .contact-info-card {
            border-left: 4px solid var(--secondary-color);
            transition: all 0.3s ease;
        }
        
        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .contact-icon {
            font-size: 1.5rem;
            color: var(--secondary-color);
        }
        
        /* Map */
        .map-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        /* Footer */
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
                        <a class="nav-link" href="propos.php">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
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
    <section class="contact-hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Contactez notre équipe</h1>
            <p class="lead mb-5">Nous sommes là pour répondre à toutes vos questions</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Formulaire de contact -->
                <div class="col-lg-7">
                    <div class="contact-form">
                        <h2 class="mb-4">Envoyez-nous un message</h2>
                        <form action="process_contact.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom complet</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Adresse email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form-label">Sujet</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4 py-2">
                                        <i class="bi bi-send me-2"></i> Envoyer le message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Informations de contact -->
                <div class="col-lg-5">
                    <div class="mb-5">
                        <h2 class="mb-4">Nos coordonnées</h2>
                        <p class="text-muted">N'hésitez pas à nous contacter par téléphone, email ou via nos réseaux sociaux.</p>
                    </div>
                    
                    <div class="card mb-4 contact-info-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="contact-icon me-3">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div>
                                    <h5>Adresse</h5>
                                    <p class="mb-0">Rue de l'Éducation<br>Saint-Louis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-4 contact-info-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="contact-icon me-3">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div>
                                    <h5>Téléphone</h5>
                                    <p class="mb-0">+33 1 23 45 67 89<br>Lundi-Vendredi, 9h-18h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-4 contact-info-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="contact-icon me-3">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div>
                                    <h5>Email</h5>
                                    <p class="mb-0">contact@edumanage.fr<br>support@edumanage.fr</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h5 class="mb-3">Suivez-nous</h5>
                        <div class="social-icons">
                            <a href="#" class="me-3"><i class="bi bi-facebook fs-4"></i></a>
                            <a href="#" class="me-3"><i class="bi bi-twitter fs-4"></i></a>
                            <a href="#" class="me-3"><i class="bi bi-linkedin fs-4"></i></a>
                            <a href="#"><i class="bi bi-instagram fs-4"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Carte Google Maps -->
            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="mb-4">Trouvez-nous</h2>
                    <div class="map-container">
                        "<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15336.159908902657!2d-16.4523777!3d16.06341515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2ssn!4v1751731090099!5m2!1sfr!2ssn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>" 
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
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> Rue de l'Éducation</li>
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
</body>
</html>