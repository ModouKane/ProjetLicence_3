<?php
require_once '../includes/auth.php';
require_once '../app/models/Schedule.php';

if ($_SESSION['role'] !== 'student') {
    header('Location: ../login.php');
    exit;
}

$scheduleModel = new Schedule();
$studentId = $_SESSION['user_id'];

// Récupérer l'emploi du temps de l'étudiant
$schedule = $scheduleModel->getStudentSchedule($studentId);

// Grouper par jour
$groupedSchedule = [];
foreach ($schedule as $item) {
    $groupedSchedule[$item['day_of_week']][] = $item;
}

// Ordre des jours
$daysOrder = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
?>

<?php include '../includes/header.php'; ?>

<div class="container">
    <h1>Mon Emploi du Temps</h1>
    
    <div class="timetable">
        <?php foreach ($daysOrder as $day): ?>
            <?php if (!empty($groupedSchedule[$day])): ?>
                <div class="timetable-day">
                    <h3><?= $day ?></h3>
                    
                    <div class="timetable-items">
                        <?php foreach ($groupedSchedule[$day] as $course): ?>
                            <div class="timetable-item">
                                <div class="course-time">
                                    <?= date('H:i', strtotime($course['start_time'])) ?> - 
                                    <?= date('H:i', strtotime($course['end_time'])) ?>
                                </div>
                                <div class="course-name"><?= $course['course_name'] ?></div>
                                <div class="course-teacher"><?= $course['teacher_name'] ?></div>
                                <div class="course-room">Salle <?= $course['room_number'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>