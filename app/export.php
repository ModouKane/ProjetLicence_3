<?php
require_once 'includes/config.php';
require_once 'models/Student.php';
require_once 'models/Attendance.php';
require_once 'models/Grade.php';

// Vérifier l'authentification
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$type = $_GET['type'] ?? '';
$classId = $_GET['class_id'] ?? null;

switch ($type) {
    case 'students':
        if ($_SESSION['role'] !== 'admin') {
            die('Accès non autorisé');
        }
        exportStudents();
        break;
        
    case 'attendance':
        if ($_SESSION['role'] !== 'teacher' && $_SESSION['role'] !== 'admin') {
            die('Accès non autorisé');
        }
        exportAttendance($classId);
        break;
        
    case 'grades':
        if ($_SESSION['role'] !== 'teacher' && $_SESSION['role'] !== 'admin') {
            die('Accès non autorisé');
        }
        exportGrades($classId);
        break;
        
    default:
        die('Type d\'export non valide');
}

function exportStudents() {
    $studentModel = new Student();
    $students = $studentModel->getAll();
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="liste_etudiants_'.date('Y-m-d').'.csv"');
    
    $output = fopen('php://output', 'w');
    
    // En-têtes
    fputcsv($output, [
        'ID', 'Nom', 'Prénom', 'Email', 'Classe', 'Date d\'inscription'
    ], ';');
    
    // Données
    foreach ($students as $student) {
        fputcsv($output, [
            $student['id'],
            $student['last_name'],
            $student['first_name'],
            $student['email'],
            $student['class_name'],
            $student['created_at']
        ], ';');
    }
    
    fclose($output);
    exit;
}

function exportAttendance($classId) {
    $attendanceModel = new Attendance();
    $records = $attendanceModel->getByClass($classId);
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="absences_classe_'.$classId.'_'.date('Y-m-d').'.csv"');
    
    $output = fopen('php://output', 'w');
    
    // En-têtes
    fputcsv($output, [
        'Date', 'Étudiant', 'Matière', 'Statut', 'Raison'
    ], ';');
    
    // Données
    foreach ($records as $record) {
        fputcsv($output, [
            $record['date'],
            $record['student_name'],
            $record['course_name'],
            $record['status'],
            $record['reason'] ?? ''
        ], ';');
    }
    
    fclose($output);
    exit;
}

function exportGrades($classId) {
    $gradeModel = new Grade();
    $grades = $gradeModel->getByClass($classId);
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="notes_classe_'.$classId.'_'.date('Y-m-d').'.csv"');
    
    $output = fopen('php://output', 'w');
    
    // En-têtes
    fputcsv($output, [
        'Étudiant', 'Matière', 'Note', 'Date', 'Commentaire'
    ], ';');
    
    // Données
    foreach ($grades as $grade) {
        fputcsv($output, [
            $grade['student_name'],
            $grade['course_name'],
            $grade['grade'],
            $grade['created_at'],
            $grade['comment'] ?? ''
        ], ';');
    }
    
    fclose($output);
    exit;
}