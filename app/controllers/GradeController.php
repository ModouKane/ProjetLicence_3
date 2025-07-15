<?php
require_once '../models/Grade.php';
require_once '../models/Student.php';

class GradeController {
    private $gradeModel;
    private $studentModel;
    
    public function __construct() {
        $this->gradeModel = new Grade();
        $this->studentModel = new Student();
    }
    
    public function calculateFinalGrades($classId) {
        // Récupérer tous les étudiants de la classe
        $students = $this->studentModel->getByClass($classId);
        $results = [];
        
        foreach ($students as $student) {
            // Récupérer toutes les notes de l'étudiant
            $grades = $this->gradeModel->getStudentGrades($student['id']);
            
            // Calculer la moyenne par matière
            $subjects = [];
            foreach ($grades as $grade) {
                $subjectId = $grade['course_id'];
                
                if (!isset($subjects[$subjectId])) {
                    $subjects[$subjectId] = [
                        'name' => $grade['course_name'],
                        'grades' => [],
                        'average' => 0
                    ];
                }
                
                $subjects[$subjectId]['grades'][] = $grade['grade'];
            }
            
            // Calculer la moyenne générale
            $overallSum = 0;
            $overallCount = 0;
            
            foreach ($subjects as &$subject) {
                $sum = array_sum($subject['grades']);
                $count = count($subject['grades']);
                $average = $count > 0 ? $sum / $count : 0;
                
                $subject['average'] = round($average, 2);
                $overallSum += $average;
                $overallCount++;
            }
            
            $overallAverage = $overallCount > 0 ? $overallSum / $overallCount : 0;
            
            $results[] = [
                'student_id' => $student['id'],
                'student_name' => $student['first_name'].' '.$student['last_name'],
                'subjects' => $subjects,
                'overall_average' => round($overallAverage, 2)
            ];
        }
        
        // Trier par moyenne décroissante
        usort($results, function($a, $b) {
            return $b['overall_average'] <=> $a['overall_average'];
        });
        
        // Ajouter le rang
        foreach ($results as $index => &$result) {
            $result['rank'] = $index + 1;
        }
        
        return $results;
    }
    
    public function generateFinalDecision($classId) {
        $grades = $this->calculateFinalGrades($classId);
        $decisions = [];
        
        foreach ($grades as $student) {
            $decision = 'Admis';
            
            // Exemple de règles de décision (à adapter)
            if ($student['overall_average'] < 10) {
                $decision = 'Redouble';
            } elseif ($student['overall_average'] < 12) {
                $decision = 'Admis avec mention passable';
            } elseif ($student['overall_average'] < 14) {
                $decision = 'Admis avec mention assez bien';
            } elseif ($student['overall_average'] < 16) {
                $decision = 'Admis avec mention bien';
            } else {
                $decision = 'Admis avec mention très bien';
            }
            
            $decisions[] = [
                'student_id' => $student['student_id'],
                'student_name' => $student['student_name'],
                'average' => $student['overall_average'],
                'rank' => $student['rank'],
                'decision' => $decision
            ];
        }
        
        return $decisions;
    }
}