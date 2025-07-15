<?php
// config.php - Fichier de configuration centralisé

// 1. Configuration de l'environnement
define('ENVIRONMENT', 'development'); // 'production' en live

// 2. Configuration des erreurs
if (ENVIRONMENT === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// 3. Configuration de la session sécurisée
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', ENVIRONMENT === 'production'); // HTTPS en production
ini_set('session.use_strict_mode', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 4. Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'edu_management_system');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// 5. Chemins de l'application
define('APP_ROOT', dirname(__DIR__));
define('MODELS_PATH', APP_ROOT.'/app/models');
define('VIEWS_PATH', APP_ROOT.'/app/views');
define('CONTROLLERS_PATH', APP_ROOT.'/app/controllers');

// 6. Autoloader amélioré
spl_autoload_register(function ($className) {
    $paths = [
        MODELS_PATH."/$className.php",
        CONTROLLERS_PATH."/$className.php",
        APP_ROOT."/core/$className.php"
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require $path;
            return;
        }
    }
    
    if (ENVIRONMENT === 'development') {
        error_log("Class $className not found in autoload paths");
    }
});

// 7. Connexion PDO sécurisée
try {
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_PERSISTENT         => true
    ];
    
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    error_log("Database connection failed: ".$e->getMessage());
    http_response_code(500);
    die(ENVIRONMENT === 'development' ? $e->getMessage() : 'Database error');
}

// 8. Fonctions utilitaires sécurisées
function redirect(string $url, int $statusCode = 303): never {
    header("Location: $url", true, $statusCode);
    exit;
}

function isLoggedIn(): bool {
    return !empty($_SESSION['user_id']) && !empty($_SESSION['csrf_token']);
}

function hasRole(string $role): bool {
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}

function generateCsrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrfToken(string $token): bool {
    return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

// 9. Sécurité HTTP Headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

// 10. Timezone
date_default_timezone_set('Europe/Paris');