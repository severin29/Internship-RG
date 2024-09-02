<?php

session_start();
require_once 'functions.php';
require_once 'Student.php';

if (!isset($_SESSION['currentUser']) || unserialize($_SESSION['currentUser'])->getRole() !== 'student') {
    header("Location: loginPage.php");
    exit();
}
$currentUser = unserialize($_SESSION['currentUser']);
$grades = $currentUser->viewGrades();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">School Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h3>Your Grades</h3>
    <table class="table">
        <thead>
        <tr>
            <th>Subject</th>
            <th>Grade Type</th>
            <th>Grade</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($grades as $grade) {
            echo '<tr>
                        <td>' . $grade[1] . '</td>
                        <td>' . $grade[2] . '</td>
                        <td>' . $grade[3] . '</td>
                      </tr>';
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>