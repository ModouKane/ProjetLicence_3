<?php
// Démarrer la session si pas déjà fait
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : 'Gestion Scolaire' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <i class="fas fa-graduation-cap me-2"></i>Gestion Scolaire
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <?php if (isLoggedIn()): ?>
                            <?php if (hasRole('admin')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/dashboard.php">Tableau de bord</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/gestion_utilisateurs.php">Utilisateurs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/gestion_classes.php">Classes</a>
                                </li>
                            <?php elseif (hasRole('teacher')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="teachers/dashboard.php">Tableau de bord</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="teachers/notes.php">Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="teachers/absences.php">Absences</a>
                                </li>
                            <?php elseif (hasRole('student')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="students/dashboard.php">Tableau de bord</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="students/notes.php">Mes notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="students/emploi_du_temps.php">Emploi du temps</a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">À propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                    <ul class="navbar-nav">
                        <?php if (isLoggedIn()): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-1"></i>
                                    <?= htmlspecialchars($_SESSION['username']) ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="profile.php">Mon profil</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout.php">Déconnexion</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Inscription</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <?php if (isset($success)): ?>
            <div class="alert alert-success alert-dismissible fade show m-0 rounded-0" role="alert">
                <?= $success ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show m-0 rounded-0" role="alert">
                <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </header>

    <main class="container my-4">