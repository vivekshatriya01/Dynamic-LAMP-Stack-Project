<?php
// Enable error display for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host     = '127.0.0.1';
$db       = 'student_portal';
$user     = 'lamp_user';
$pass     = 'LampSecurePass#2026';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$db_connected = false;
$error_msg = null;
$students = [];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $db_connected = true;
    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll();
} catch (PDOException $e) {
    $error_msg = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>RHEL 10 LAMP Stack</title>
    <style>
        body { font-family: sans-serif; background: #0f172a; color: #fff; padding: 40px; }
        .box { max-width: 850px; margin: auto; background: #1e293b; padding: 25px; border-radius: 8px; }
        .status { padding: 12px; margin-bottom: 20px; border-radius: 6px; font-weight: bold; }
        .online { background: #065f46; color: #34d399; }
        .offline { background: #7f1d1d; color: #f87171; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #334155; }
        th { background: #273549; color: #94a3b8; }
    </style>
</head>
<body>
<div class="box">
    <h1>🚀 Dynamic LAMP Stack Website</h1>
    <p>Red Hat Enterprise Linux 10 Web Server</p>

    <?php if ($db_connected): ?>
        <div class="status online">✅ Database Status: Connected to (<?= htmlspecialchars($db); ?>)</div>
    <?php else: ?>
        <div class="status offline">❌ Database Error: <?= htmlspecialchars($error_msg); ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($students)): ?>
                <?php foreach ($students as $row): ?>
                    <tr>
                        <td>#<?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['full_name']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['course']); ?></td>
                        <td><?= htmlspecialchars($row['grade']); ?></td>
                        <td><?= htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No student records found in table.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>


