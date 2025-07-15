<?php
session_start(); // Démarrer la session

// Détruire toutes les variables de session
$_SESSION = [];

// Supprimer la session sur le serveur
session_destroy();

// Rediriger vers la page de connexion ou d'accueil
header("Location: index.php");
exit;
