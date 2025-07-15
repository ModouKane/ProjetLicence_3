<?php
// Démarrer la session si elle n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Configurer les paramètres de session AVANT de démarrer la session
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1); // À utiliser en HTTPS
    ini_set('session.use_strict_mode', 1);
    
    session_start();
}

// ... (le reste du fichier reste inchangé)
// Configuration de sécurité
// ini_set('session.cookie_httponly', 1);
// ini_set('session.cookie_secure', 1); // À utiliser en HTTPS
// ini_set('session.use_strict_mode', 1);

// Constantes pour les rôles
define('ROLE_ADMIN', 'admin');
define('ROLE_TEACHER', 'teacher');
define('ROLE_STUDENT', 'student');

/**
 * Vérifie si l'utilisateur est connecté
 */
function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

/**
 * Vérifie si l'utilisateur a un rôle spécifique
 */
function hasRole(string $role): bool {
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}

/**
 * Redirige vers la page de login si non authentifié
 */
function requireAuth(): void {
    if (!isLoggedIn()) {
        header('Location: /login.php');
        exit;
    }
}

/**
 * Redirige vers la page de login si l'utilisateur n'a pas le rôle requis
 */
function requireRole(string $role): void {
    requireAuth();
    
    if (!hasRole($role)) {
        // Journalisation de la tentative d'accès non autorisé
        error_log("Tentative d'accès non autorisé. User ID: ".$_SESSION['user_id']);
        
        header('Location: /unauthorized.php');
        exit;
    }
}

/**
 * Protection contre les attaques CSRF
 */
function generateCsrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Valide un token CSRF
 */
function validateCsrfToken(string $token): bool {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Nettoie les données utilisateur
 */
function sanitizeInput($data) {
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    }
    
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Hashage de mot de passe
 */
function hashPassword(string $password): string {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

/**
 * Vérification de mot de passe
 */
function verifyPassword(string $password, string $hash): bool {
    return password_verify($password, $hash);
}

/**
 * Déconnexion et nettoyage de session
 */
function logout(): void {
    $_SESSION = [];
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
}

// Protection contre les attaques XSS
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');

// Désactivation de l'affichage des erreurs en production
if (getenv('ENVIRONMENT') === 'production') {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
}