<?php
require_once '../models/Student.php';

class StudentController {
    private $studentModel;
    
    public function __construct() {
        $this->studentModel = new Student();
    }
    
    public function register($data) {
        // Validation des données
        $required = ['first_name', 'last_name', 'email', 'birth_date'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new Exception("Le champ $field est requis");
            }
        }
        
        return $this->studentModel->create($data);
    }
    
    public function getStudentProfile($id) {
        return $this->studentModel->find($id);
    }
    
    public function getAllStudents() {
        return $this->studentModel->all();
    }
    
    public function generateReportCard($studentId) {
        $student = $this->studentModel->find($studentId);
        $grades = $this->studentModel->getGrades($studentId);
        
        // Calcul de la moyenne
        $total = 0;
        $count = 0;
        foreach ($grades as $grade) {
            $total += $grade['score'];
            $count++;
        }
        $average = $count > 0 ? $total / $count : 0;
        
        return [
            'student' => $student,
            'grades' => $grades,
            'average' => round($average, 2)
        ];
    }
}