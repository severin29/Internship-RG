<?php

session_start();
require_once 'functions.php';
require_once 'Teacher.php';

if (!isset($_SESSION['currentUser']) || unserialize($_SESSION['currentUser'])->getRole() !== 'teacher') {
    header("Location: loginPage.php");
    exit();
}

$currentUser = unserialize($_SESSION['currentUser']);

$students = readCSV('students.csv');

$matchedStudents = [];

foreach ($students as $student) {
    $studentSubjects = explode('|', $student[2]);
    $teacherSubjects = $currentUser->getSubjectsTaught();

    if(array_intersect($teacherSubjects, $studentSubjects)) {
        $matchedStudents[] = $student;
    }
}
$_SESSION['subjectsTaught'] = $currentUser->getSubjectsTaught();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Subjects</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($matchedStudents as $student){
            echo '<tr>
                <td>'.$student[0].'</td>
                <td>'.$student[2]. '</td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="username" value='. $student[0].'>
                        <input type="hidden" name="role" value="student">
                    </form>
                </td>
            </tr>';
        }
        ?>
        </tbody>
    </table>

    <div class="container">
        <h3>Grade a Student</h3>
        <hr>
        <form method="POST" action="gradeStudent.php">
            <div class="form-group">
                <label for="student_username">Student Username</label>
                <input type="text" class="form-control" id="student_username" name="student_username" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <select class="form-control" id="subject" name="subject">
                    <?php foreach ($currentUser->getSubjectsTaught() as $subject) {
                        echo '<option value='.$subject. '>'; echo $subject .'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade Type</label>
                <select class="form-control" id="grade_type" name="grade_type" required>
                    <option value="Homework">Homework</option>
                    <option value="Quiz">Quiz</option>
                    <option value="Midterm">Midterm</option>
                    <option value="Final">Final</option>
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade</label>
                <select name="grade" id="grade" class="form-control" required>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <button type="submit" name="assign_grade" class="btn btn-primary">Assign Grade</button>
        </form>
    </div>
</body>
</html>