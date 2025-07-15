<?php
require_once '../includes/auth.php';
require_once '../app/models/Student.php';
require_once '../app/models/Grade.php';

if ($_SESSION['role'] !== 'teacher') {
    header('Location: ../login.php');
    exit;
}

$studentModel = new Student();
$gradeModel = new Grade();
$teacherId = $_SESSION['user_id'];

// Récupérer les classes enseignées par ce professeur
$classes = $gradeModel->getTeacherClasses($teacherId);

// Traitement de l'ajout de note
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_grade'])) {
    $data = [
        'student_id' => $_POST['student_id'],
        'course_id' => $_POST['course_id'],
        'grade' => $_POST['grade'],
        'comment' => $_POST['comment'],
        'teacher_id' => $teacherId
    ];
    
    if ($gradeModel->create($data)) {
        $success = "Note ajoutée avec succès";
    } else {
        $error = "Erreur lors de l'ajout de la note";
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
    <h1>Gestion des Notes</h1>
    
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
        <h2>Ajouter une note</h2>
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
                <label>Note (sur 20)</label>
                <input type="number" name="grade" min="0" max="20" step="0.5" required>
            </div>
            
            <div class="form-group">
                <label>Commentaire</label>
                <textarea name="comment"></textarea>
            </div>
            
            <button type="submit" name="add_grade" class="btn">Enregistrer</button>
        </form>
        
        <h2>Notes existantes</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Matière</th>
                    <th>Note</th>
                    <th>Commentaire</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $grades = $gradeModel->getByClassAndTeacher($_GET['class_id'], $teacherId);
                foreach ($grades as $grade): 
                ?>
                    <tr>
                        <td><?= $grade['student_name'] ?></td>
                        <td><?= $grade['course_name'] ?></td>
                        <td><?= $grade['grade'] ?></td>
                        <td><?= $grade['comment'] ?></td>
                        <td><?= date('d/m/Y', strtotime($grade['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>