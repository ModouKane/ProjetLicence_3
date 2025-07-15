<?php
// app/models/User.php

class User {
    private $db;
    private $table = 'users';

    public function __construct() {
        $this->db = new Database(); // Supposons que vous avez une classe Database
    }

    /**
     * Trouver un utilisateur par email
     */
    public function findByEmail($email) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind(':email', $email);
        
        return $this->db->single();
    }

    /**
     * Enregistrer un nouvel utilisateur
     */
    public function register($data) {
        $this->db->query('INSERT INTO ' . $this->table . ' (first_name, last_name, email, password, role) 
                         VALUES (:first_name, :last_name, :email, :password, :role)');
        
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role'] ?? 'student');

        return $this->db->execute();
    }

    /**
     * Compter les utilisateurs actifs
     */
    public function countActiveUsers() {
        $this->db->query('SELECT COUNT(*) as count FROM ' . $this->table . ' WHERE is_active = 1');
        $result = $this->db->single();
        return $result->count;
    }

    /**
     * Mettre à jour le dernier login
     */
    public function updateLastLogin($userId) {
        $this->db->query('UPDATE ' . $this->table . ' SET last_login = NOW() WHERE id = :id');
        $this->db->bind(':id', $userId);
        return $this->db->execute();
    }
}