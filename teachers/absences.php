<?php
require_once '../includes/auth.php';
require_once '../app/models/Student.php';
require_once '../app/models/Attendance.php';

if ($_SESSION['role'] !== 'teacher') {
    header('Location: ../login.php');
    exit;
}

$studentModel = new Student();
$attendanceModel = new Attendance();
$teacherId = $_SESSION['user_id'];

// Récupérer les classes enseignées
$classes = $attendanceModel->getTeacherClasses($teacherId);

// Traitement de l'ajout d'absence
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark_attendance'])) {
    $data = [
        'student_id' => $_POST['student_id'],
        'course_id' => $_POST['course_id'],
        'date' => $_POST['date'],
        'status' => $_POST['status'],
        'reason' => $_POST['reason'] ?? null,
        'recorded_by' => $teacherId
    ];
    
    if ($attendanceModel->record($data)) {
        $success = "Absence enregistrée avec succès";
    } else {
        $error = "Erreur lors de l'enregistrement";
    }
}

// Récupérer les étudiants si une classe est sélectionnée
$students = [];
if (isset($_GET['class_id'])) {
    $students = $studentModel->getByClass($_GET['class_id']);
}
?>

<?php include '../includes/header.php'; ?>

<div class="container">
    <h1>Gestion des Absences</h1>
    
    <form method="get" class="filter-form">
        <div class="form-group">
            <label>Classe</label>
            <select name="class_id" onchange="this.form.submit()">
                <option value="">-- Sélectionner une classe --</option>
                <?php foreach ($classes as $class): ?>
                    <option value="<?= $class['id'] ?>" <?= isset($_GET['class_id']) && $_GET['class_id'] == $class['id'] ? 'selected' : '' ?>>
                        <?= $class['class_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>
    
    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <?php if (!empty($students)): ?>
        <h2>Marquer une absence</h2>
        <form method="POST">
            <div class="form-group">
                <label>Étudiant</label>
                <select name="student_id" required>
                    <?php foreach ($students as $student): ?>
                        <option value="<?= $student['id'] ?>">
                            <?= $student['first_name'].' '.$student['last_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Matière</label>
                <select name="course_id" required>
                    <?php foreach ($classes as $class): ?>
                        <?php if ($class['id'] == $_GET['class_id']): ?>
                            <option value="<?= $class['course_id'] ?>">
                                <?= $class['course_name'] ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" required value="<?= date('Y-m-d') ?>">
            </div>
            
            <div class="form-group">
                <label>Statut</label>
                <select name="status" required>
                    <option value="present">Présent</option>
                    <option value="absent">Absent</option>
                    <option value="late">En retard</option>
                    <option value="excused">Absence justifiée</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Raison (si absente)</label>
                <textarea name="reason"></textarea>
            </div>
            
            <button type="submit" name="mark_attendance" class="btn">Enregistrer</button>
        </form>
        
        <h2>Historique des absences</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Matière</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Raison</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $attendances = $attendanceModel->getByClassAndTeacher($_GET['class_id'], $teacherId);
                foreach ($attendances as $attendance): 
                ?>
                    <tr>
                        <td><?= $attendance['student_name'] ?></td>
                        <td><?= $attendance['course_name'] ?></td>
                        <td><?= date('d/m/Y', strtotime($attendance['date'])) ?></td>
                        <td><?= ucfirst($attendance['status']) ?></td>
                        <td><?= $attendance['reason'] ?? '--' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="export-section">
            <a href="../app/export.php?type=attendance&class_id=<?= $_GET['class_id'] ?>" class="btn">
                Exporter en Excel
            </a>
        </div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>