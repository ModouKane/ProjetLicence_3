<?php
// app/controllers/AuthController.php
class AuthController {
    private $redirectUrl = 'dashboard.php';
    private $users = []; // Simule une base de données

    public function __construct() {
        // Exemple d'utilisateur (à remplacer par une vraie DB)
        $this->users = [
            'admin' => [
                'password' => password_hash('admin123', PASSWORD_DEFAULT), // Mot de passe haché
                'email' => 'admin@edumanage.com'
            ]
        ];
    }

    public function login($username, $password) {
        // Vérifie si l'utilisateur existe
        if (!isset($this->users[$username])) {
            return false;
        }

        // Vérifie le mot de passe
        if (password_verify($password, $this->users[$username]['password'])) {
            $_SESSION['user'] = [
                'username' => $username,
                'email' => $this->users[$username]['email']
            ];
            return true;
        }

        return false;
    }

    public function getRedirectUrl() {
        return $this->redirectUrl;
    }

    // Méthode pour réinitialiser le mot de passe
    public function resetPassword($email) {
        // Implémentez la logique d'envoi d'email ici
        return true; // Temporaire
    }
}