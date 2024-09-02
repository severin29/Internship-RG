<?php
session_start();

require_once 'functions.php';
require_once 'User.php';
require_once 'Admin.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: loginpage.php');
    exit();
}

$admin = new Admin($_SESSION['username'], $_SESSION['password']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $subjects = explode(',', $_POST['subjects']);
        $admin->addUser($username, $password, $role, $subjects);
    } elseif (isset($_POST['remove_user'])) {
        $username = $_POST['username'];
        $role = $_POST['role'];
        $admin->removeUser($username, $role);
    } elseif (isset($_POST['add_subject'])) {
        $subject = $_POST['subject'];
        $admin->addSubject($subject);
    } elseif (isset($_POST['remove_subject'])) {
        $subject = $_POST['subject'];
        $admin->removeSubject($subject);
    }
}

$students = readCSV('students.csv');
$teachers = readCSV('teachers.csv');
$subjects = readCSV('subjects.csv');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">School Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

<div class="container mt-5">

    <h4>Students</h4>
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addStudentModal">Add Student</button>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Subjects</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student){
            echo '<tr>
                <td>'.$student[0].'</td>
                <td>'.$student[2]. '</td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="username" value='. $student[0].'>
                        <input type="hidden" name="role" value="student">
                        <button type="submit" name="remove_user" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>';
         }
         ?>
        </tbody>
    </table>

    <h4>Teachers</h4>
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addTeacherModal">Add Teacher</button>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Subjects Taught</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($teachers as $teacher) {
            echo '<tr>
                <td>'.$teacher[0].'</td>
                <td>'.$teacher[2].'</td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="username" value='.$teacher[0].'>
                        <input type="hidden" name="role" value="teacher">
                        <button type="submit" name="remove_user" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>';
        } ?>


        </tbody>
    </table>

    <h4>Subjects</h4>
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addSubjectModal">Add Subject</button>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Subject Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($subjects as $subject) {
            echo '<tr>
                <td>'.$subject[0].'</td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="subject" value='.$subject[0].'>
                        <button type="submit" name="remove_subject" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>';
        }
        ?>
        </tbody>
    </table>

</div>

<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="studentUsername">Username</label>
                        <input type="text" class="form-control" id="studentUsername" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="studentPassword">Password</label>
                        <input type="password" class="form-control" id="studentPassword" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="studentSubjects">Subjects (comma-separated)</label>
                        <input type="text" class="form-control" id="studentSubjects" name="subjects">
                    </div>
                    <input type="hidden" name="role" value="student">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_user" class="btn btn-primary">Add Student</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeacherModalLabel">Add New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="teacherUsername">Username</label>
                        <input type="text" class="form-control" id="teacherUsername" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="teacherPassword">Password</label>
                        <input type="password" class="form-control" id="teacherPassword" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="teacherSubjects">Subjects Taught (comma-separated)</label>
                        <input type="text" class="form-control" id="teacherSubjects" name="subjects">
                    </div>
                    <input type="hidden" name="role" value="teacher">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_user" class="btn btn-primary">Add Teacher</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubjectModalLabel">Add New Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subjectName">Subject Name</label>
                        <input type="text" class="form-control" id="subjectName" name="subject" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_subject" class="btn btn-primary">Add Subject</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
