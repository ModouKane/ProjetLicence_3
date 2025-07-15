<?php
session_start();
require_once __DIR__ . '/includes/db.php';

// Activer le rapport d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyage des données
    $username = trim($_POST['username'] ?? '');
    $ine = trim($_POST['ine'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $terms = $_POST['terms'] ?? false;
    
    // Validation
    if (empty($username)) {
        $errors['username'] = "Le nom d'utilisateur est requis";
    } elseif (strlen($username) < 3) {
        $errors['username'] = "Le nom d'utilisateur doit contenir au moins 3 caractères";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $errors['username'] = "Seuls les lettres, chiffres et underscores sont autorisés";
    }
    
    // Validation INE (1 lettre + 11 chiffres)
    if (empty($ine)) {
        $errors['ine'] = "L'INE est obligatoire";
    } elseif (!preg_match('/^[A-Za-z][0-9]{11}$/', $ine)) {
        $errors['ine'] = "Format INE invalide (1 lettre suivie de 11 chiffres)";
    }
    
    if (empty($email)) {
        $errors['email'] = "L'email est requis";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'email n'est pas valide";
    }
    
    if (empty($password)) {
        $errors['password'] = "Le mot de passe est requis";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Minimum 8 caractères";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors['password'] = ($errors['password'] ?? ''). " - Au moins une majuscule";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors['password'] = ($errors['password'] ?? ''). " - Au moins un chiffre";
    }
    
    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Les mots de passe ne correspondent pas";
    }
    
    if (!$terms) {
        $errors['terms'] = "Vous devez accepter les conditions d'utilisation";
    }
    
    // Si aucune erreur, procéder à l'inscription
    if (empty($errors)) {
        try {
            // Vérifier si l'utilisateur existe déjà
            $existingUser = DB::fetchOne(
                "SELECT id FROM users WHERE username = :username OR email = :email OR ine = :ine", 
                [':username' => $username, ':email' => $email, ':ine' => $ine]
            );
            
            if ($existingUser) {
                $errors['general'] = "Un utilisateur avec ces informations existe déjà";
            } else {
                // Hachage du mot de passe
                $hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                
                if ($hashed_password === false) {
                    throw new Exception("Erreur lors du hachage du mot de passe");
                }
                
                // Insertion dans la base de données
                $user_id = DB::insert('users', [
                    'username' => $username,
                    'ine' => $ine,
                    'email' => $email,
                    'password' => $hashed_password,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                
                if (!$user_id) {
                    throw new Exception("Échec de l'insertion dans la base de données");
                }
                
                // Connexion automatique
                $_SESSION['user'] = [
                    'id' => $user_id,
                    'username' => $username,
                    'email' => $email,
                    'ine' => $ine
                ];
                $_SESSION['new_registration'] = true;
                
                header("Location: index.php");
                exit();
            }
        } catch (PDOException $e) {
            error_log("Erreur PDO: " . $e->getMessage());
            $errors['general'] = "Erreur de base de données: " . $e->getMessage();
        } catch (Exception $e) {
            error_log("Erreur: " . $e->getMessage());
            $errors['general'] = "Erreur système: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | EduManage</title>
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
            margin: 0;
            padding: 20px;
        }
        
        .register-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 600px;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .register-header img {
            height: 60px;
            margin-bottom: 1rem;
        }
        
        .btn-register {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .password-strength {
            height: 5px;
            background: #e9ecef;
            margin-top: 5px;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease, background-color 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        .text-muted {
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .password-requirements {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }
        
        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 0.2rem;
        }
        
        .requirement i {
            margin-right: 0.5rem;
            font-size: 0.7rem;
        }
        
        .valid {
            color: #28a745;
        }
        
        .invalid {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <img src="https://cdn-icons-png.flaticon.com/512/2936/2936775.png" alt="Logo EduManage" class="img-fluid">
            <h2>Créer un compte</h2>
            <p class="text-muted">Rejoignez notre plateforme de gestion scolaire</p>
        </div>
        
        <?php if (!empty($errors['general'])): ?>
            <div class="alert alert-danger alert-dismissible fade show mb-4">
                <i class="fas fa-exclamation-circle me-2"></i>
                <?= htmlspecialchars($errors['general']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <form method="POST" id="registerForm" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" 
                       id="username" name="username" value="<?= htmlspecialchars($username ?? '') ?>" 
                       pattern="[a-zA-Z0-9_]+" required>
                <?php if (isset($errors['username'])): ?>
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        <?= htmlspecialchars($errors['username']) ?>
                    </div>
                <?php endif; ?>
                <small class="text-muted">3 caractères minimum (lettres, chiffres et underscores seulement)</small>
            </div>
            
            <div class="mb-3">
                <label for="ine" class="form-label">INE (Identifiant National Etudiant)</label>
                <input type="text" class="form-control <?= isset($errors['ine']) ? 'is-invalid' : '' ?>" 
                       id="ine" name="ine" value="<?= htmlspecialchars($ine ?? '') ?>" 
                       pattern="[A-Za-z][0-9]{11}" required>
                <?php if (isset($errors['ine'])): ?>
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        <?= htmlspecialchars($errors['ine']) ?>
                    </div>
                <?php endif; ?>
                <small class="text-muted">1 lettre suivie de 11 chiffres (ex: N02345620132)</small>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                       id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
                <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        <?= htmlspecialchars($errors['email']) ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="row g-3">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" 
                           id="password" name="password" required>
                    <div class="password-strength mt-2">
                        <div id="passwordStrength" class="password-strength-bar"></div>
                    </div>
                    <div class="password-requirements">
                        <div class="requirement" id="req-length">
                            <i class="fas fa-circle"></i>
                            <span>Minimum 8 caractères</span>
                        </div>
                        <div class="requirement" id="req-uppercase">
                            <i class="fas fa-circle"></i>
                            <span>Au moins une majuscule</span>
                        </div>
                        <div class="requirement" id="req-number">
                            <i class="fas fa-circle"></i>
                            <span>Au moins un chiffre</span>
                        </div>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            <?= htmlspecialchars($errors['password']) ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="confirm_password" class="form-label">Confirmation</label>
                    <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>" 
                           id="confirm_password" name="confirm_password" required>
                    <?php if (isset($errors['confirm_password'])): ?>
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            <?= htmlspecialchars($errors['confirm_password']) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="form-check mb-4">
                <input class="form-check-input <?= isset($errors['terms']) ? 'is-invalid' : '' ?>" 
                       type="checkbox" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">
                    J'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">conditions d'utilisation</a>
                </label>
                <?php if (isset($errors['terms'])): ?>
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['terms']) ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn btn-register mb-3">
                <i class="fas fa-user-plus me-2"></i> S'inscrire
            </button>
            
            <div class="text-center">
                <p class="mb-0">Déjà un compte ? <a href="login.php" class="text-decoration-none">Se connecter</a></p>
            </div>
        </form>
    </div>

    <!-- Modal Conditions d'utilisation -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Conditions Générales d'Utilisation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>1. Acceptation des conditions</h6>
                    <p>En créant un compte sur EduManage, vous acceptez sans réserve les présentes conditions générales d'utilisation.</p>
                    
                    <h6>2. Compte Utilisateur</h6>
                    <p>Vous êtes responsable de la confidentialité de votre compte et de votre mot de passe. Vous acceptez de ne pas partager ces informations.</p>
                    
                    <h6>3. Données Personnelles</h6>
                    <p>Vos données personnelles sont collectées et traitées conformément à notre politique de confidentialité.</p>
                    
                    <h6>4. Responsabilités</h6>
                    <p>EduManage ne peut être tenu responsable d'une utilisation inappropriée du service.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">J'ai compris</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validation en temps réel du mot de passe
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            
            // Vérification des exigences
            const hasLength = password.length >= 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            
            // Mise à jour des indicateurs visuels
            updateRequirement('req-length', hasLength);
            updateRequirement('req-uppercase', hasUppercase);
            updateRequirement('req-number', hasNumber);
            
            // Calcul de la force
            let strength = 0;
            if (hasLength) strength += 1;
            if (hasUppercase) strength += 1;
            if (hasNumber) strength += 1;
            if (password.length >= 12) strength += 1;
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            
            // Mise à jour de la barre de force
            strengthBar.style.width = 
                strength === 0 ? '0%' :
                strength === 1 ? '25%' :
                strength === 2 ? '50%' :
                strength === 3 ? '75%' : '100%';
                
            strengthBar.style.backgroundColor = 
                strength <= 1 ? '#e74c3c' :
                strength === 2 ? '#f39c12' :
                strength === 3 ? '#2ecc71' : '#27ae60';
        });
        
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
        
        function updateRequirement(id, isValid) {
            const element = document.getElementById(id);
            const icon = element.querySelector('i');
            element.classList.toggle('valid', isValid);
            element.classList.toggle('invalid', !isValid);
            icon.classList.toggle('fa-check-circle', isValid);
            icon.classList.toggle('fa-times-circle', !isValid);
            icon.classList.toggle('fa-circle', !isValid && !isValid);
        }
        
        // Validation des conditions générales
        const termsCheckbox = document.getElementById('terms');
        const registerForm = document.getElementById('registerForm');
        
        registerForm.addEventListener('submit', function(e) {
            if (!termsCheckbox.checked) {
                e.preventDefault();
                termsCheckbox.classList.add('is-invalid');
                
                // Ajouter un message d'erreur si nécessaire
                if (!document.querySelector('#terms ~ .invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    feedback.innerHTML = '<i class="fas fa-exclamation-circle me-1"></i> Vous devez accepter les conditions d\'utilisation';
                    termsCheckbox.parentNode.appendChild(feedback);
                }
                
                // Scroll vers l'erreur
                termsCheckbox.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
        
        termsCheckbox.addEventListener('change', function() {
            if (this.checked) {
                this.classList.remove('is-invalid');
                const feedback = this.parentNode.querySelector('.invalid-feedback');
                if (feedback) feedback.remove();
            }
        });
    </script>
</body>
</html>