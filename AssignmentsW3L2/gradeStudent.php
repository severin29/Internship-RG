<?php
session_start();
include 'Teacher.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'teacher') {
    header('Location: loginPage.php');
    exit();
}

$teacher = new Teacher($_SESSION['username'], $_SESSION['password'], $_SESSION['subjectsTaught']);

if (isset($_POST['assign_grade'])) {
    $studentUsername = $_POST['student_username'];
    $subject = $_POST['subject'];
    $gradeType = $_POST['grade_type'];
    $grade = $_POST['grade'];

    try {
        $teacher->gradeStudent($studentUsername, $subject, $gradeType, $grade);
        echo "Grade successfully assigned!";
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    header('Location: teacherDashboard.php');
    exit();
}