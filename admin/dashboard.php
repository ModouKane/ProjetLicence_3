<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

// Vérification plus robuste du rôle admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

// Initialisation des modèles avec gestion des erreurs
try {
    // Récupération des statistiques
    $stats = [
        'students' => DB::countRows('students'),
        'teachers' => DB::countRows('teachers'),
        'active_users' => DB::countRows('users', 'is_active = 1')
    ];
    
    // Récupération des derniers étudiants inscrits
    $latestStudents = DB::fetchAll('SELECT * FROM students ORDER BY created_at DESC LIMIT 5');
} catch (Exception $e) {
    error_log("Dashboard error: " . $e->getMessage());
    die("Une erreur est survenue lors du chargement du tableau de bord");
}

include __DIR__ . '/../includes/header.php';
?>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Tableau de bord Administrateur</h1>
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dashboardActions" data-bs-toggle="dropdown">
                <i class="bi bi-gear"></i> Actions
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="gestion_utilisateurs.php"><i class="bi bi-people"></i> Gérer les utilisateurs</a></li>
                <li><a class="dropdown-item" href="../app/export.php?type=students"><i class="bi bi-download"></i> Exporter les étudiants</a></li>
                <li><a class="dropdown-item" href="settings.php"><i class="bi bi-sliders"></i> Paramètres</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Section Statistiques -->
    <div class="row mb-5 g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="display-4 text-primary mb-2"><?= $stats['students'] ?></div>
                    <h3 class="h5">Étudiants</h3>
                    <a href="students.php" class="btn btn-sm btn-outline-primary mt-3">
                        <i class="bi bi-arrow-right"></i> Voir la liste
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="display-4 text-success mb-2"><?= $stats['teachers'] ?></div>
                    <h3 class="h5">Enseignants</h3>
                    <a href="teachers.php" class="btn btn-sm btn-outline-success mt-3">
                        <i class="bi bi-arrow-right"></i> Voir la liste
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="display-4 text-info mb-2"><?= $stats['active_users'] ?></div>
                    <h3 class="h5">Utilisateurs actifs</h3>
                    <a href="users.php" class="btn btn-sm btn-outline-info mt-3">
                        <i class="bi bi-arrow-right"></i> Gérer
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Derniers étudiants inscrits -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h5 mb-0">Derniers étudiants inscrits</h3>
                <a href="students.php" class="btn btn-sm btn-light">
                    <i class="bi bi-plus"></i> Ajouter
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date d'inscription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($latestStudents as $student): ?>
                        <tr>
                            <td><?= htmlspecialchars($student['id']) ?></td>
                            <td><?= htmlspecialchars($student['last_name']) ?></td>
                            <td><?= htmlspecialchars($student['first_name']) ?></td>
                            <td><?= date('d/m/Y', strtotime($student['created_at'])) ?></td>
                            <td>
                                <a href="student_details.php?id=<?= $student['id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> Voir
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Actions rapides -->
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h3 class="h5 mb-0">Actions rapides</h3>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-3">
                <a href="add_student.php" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Ajouter un étudiant
                </a>
                <a href="add_teacher.php" class="btn btn-success">
                    <i class="bi bi-person-plus"></i> Ajouter un enseignant
                </a>
                <a href="send_announcement.php" class="btn btn-info">
                    <i class="bi bi-megaphone"></i> Envoyer une annonce
                </a>
                <a href="reports.php" class="btn btn-warning">
                    <i class="bi bi-graph-up"></i> Générer des rapports
                </a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>