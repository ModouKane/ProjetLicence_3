<?php
// app/models/Teacher.php

class Teacher {
    private $db;
    private $table = 'teachers';

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Obtenir tous les enseignants
     */
    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    /**
     * Compter le nombre d'enseignants
     */
    public function count() {
        $this->db->query('SELECT COUNT(*) as count FROM ' . $this->table);
        $result = $this->db->single();
        return $result->count;
    }

    /**
     * Ajouter un nouvel enseignant
     */
    public function add($data) {
        $this->db->query('INSERT INTO ' . $this->table . ' 
                         (user_id, teacher_number, subject, hire_date, specialization) 
                         VALUES (:user_id, :teacher_number, :subject, :hire_date, :specialization)');
        
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':teacher_number', $data['teacher_number']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':hire_date', $data['hire_date']);
        $this->db->bind(':specialization', $data['specialization']);

        return $this->db->execute();
    }

    /**
     * Obtenir les enseignants par matière
     */
    public function getBySubject($subject) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE subject = :subject');
        $this->db->bind(':subject', $subject);
        return $this->db->resultSet();
    }
}