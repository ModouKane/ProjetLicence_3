<?php
// app/models/Student.php

class Student {
    private $db;
    private $table = 'students';

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Obtenir tous les étudiants
     */
    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    /**
     * Compter le nombre d'étudiants
     */
    public function count() {
        $this->db->query('SELECT COUNT(*) as count FROM ' . $this->table);
        $result = $this->db->single();
        return $result->count;
    }

    /**
     * Obtenir les derniers étudiants inscrits
     */
    public function getLatest($limit = 5) {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC LIMIT :limit');
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }

    /**
     * Ajouter un nouvel étudiant
     */
    public function add($data) {
        $this->db->query('INSERT INTO ' . $this->table . ' 
                         (user_id, student_number, class_id, date_of_birth, address, phone) 
                         VALUES (:user_id, :student_number, :class_id, :dob, :address, :phone)');
        
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':student_number', $data['student_number']);
        $this->db->bind(':class_id', $data['class_id']);
        $this->db->bind(':dob', $data['date_of_birth']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':phone', $data['phone']);

        return $this->db->execute();
    }
}