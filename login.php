<?php
session_start();
require_once __DIR__ . '/app/controllers/AuthController.php';

$auth = new AuthController();

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $ine = $_POST['ine'] ?? ''; // Ajout du champ INE
    $password = $_POST['password'];
    
    // Connexion avec vérification de l'INE
    if ($auth->login($username, $password, $ine)) {
        $_SESSION['login_success'] = true; // Flag pour notification
        header('Location: '.$auth->getRedirectUrl());
        exit;
    } else {
        $error = "Identifiants incorrects ou INE invalide";
    }
}

// Traitement du mot de passe oublié
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($auth->resetPassword($email)) {
        $resetSuccess = "Un lien de réinitialisation a été envoyé à votre adresse email";
    } else {
        $resetError = "Aucun compte trouvé avec cette adresse email";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | EduManage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
        }
        
        .login-header img {
            height: 60px;
            margin-bottom: 20px;
        }
        
        .btn-login {
            background-color: var(--secondary-color);
            color: white;
            height: 50px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        /* Animation pour la notification de connexion */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .login-success {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/2936/2936775.png" alt="Logo EduManage">
            <h2 class="mb-3">Connexion</h2>
        </div>
        
        <!-- Affichage des messages -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i>
                <?= htmlspecialchars($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($resetSuccess)): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>
                <?= htmlspecialchars($resetSuccess) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($resetError)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i>
                <?= htmlspecialchars($resetError) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Formulaire de connexion principal -->
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            
            <!-- Nouveau champ INE -->
            <div class="mb-3">
                <label for="ine" class="form-label">INE (Identifiant National Etudiant)</label>
                <input type="text" class="form-control" id="ine" name="ine" 
                       pattern="[A-Za-z][0-9]{11}" placeholder="N02345620132" required>
                <small class="text-muted">Format: 1 lettre suivie de 11 chiffres</small>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i> Se connecter
                </button>
            </div>
            
            <div class="d-flex justify-content-between mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>
                <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" 
                   class="text-decoration-none">Mot de passe oublié ?</a>
            </div>
        </form>
        
        <div class="text-center">
            <p>Vous n'avez pas de compte ? <a href="register.php">Créer un compte</a></p>
        </div>
    </div>

    <!-- Modal Mot de passe oublié -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Réinitialiser votre mot de passe</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <small class="text-muted">Nous vous enverrons un lien de réinitialisation</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Validation en temps réel de l'INE
        document.getElementById('ine').addEventListener('input', function() {
            const ine = this.value;
            const isValid = /^[A-Za-z][0-9]{11}$/.test(ine);
            
            if (ine.length > 0) {
                this.classList.toggle('is-valid', isValid);
                this.classList.toggle('is-invalid', !isValid);
            } else {
                this.classList.remove('is-valid', 'is-invalid');
            }
        });
    </script>
</body>
</html>