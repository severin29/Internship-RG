<?php
session_start();

include_once 'Admin.php';
include_once 'Teacher.php';
include_once 'Student.php';

include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = readUsersFromCSV();
    $userFound = false;

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $userFound = true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = $user['role'];

            switch ($user['role']) {
                case 'admin':
                    $currentUser = new Admin($user['username'], $user['password']);
                    break;
                case 'teacher':
                    $currentUser = new Teacher($user['username'], $user['password'], $user['subjects_taught']);
                    break;
                case 'student':
                    $currentUser = new Student($user['username'], $user['password'], $user['subjects']);
                    break;
            }

            $_SESSION['currentUser'] = serialize($currentUser);

            if ($user['role'] == 'admin') {
                header("Location: adminDashboard.php");
            } elseif ($user['role'] == 'teacher') {
                header("Location: teacherDashboard.php");
            } elseif ($user['role'] == 'student') {
                header("Location: studentDashboard.php");
            }
            exit();
        }
    }

    if (!$userFound) {
        $error = "Invalid username or password.";
    }
}

?>