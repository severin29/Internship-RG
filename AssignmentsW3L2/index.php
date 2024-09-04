<?php
require_once 'functions.php';
$subjects = readCSV('subjects.csv');
$teachers = readCSV('teachers.csv');
$students = readCSV('students.csv');
$chunk = 5;
$subjects1 = array_chunk($subjects, $chunk)[0];
$subjects2 = array_chunk($subjects, $chunk)[1];

function sendToLogin(){
    return header('Location: loginPage.php');
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>School Management System</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">School Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="loginPage.php">Login</a>
            </li>
        </ul>
    </div>
</nav>
<div class="hero-div">
    <h1>RG School</h1>
    <h3>All in one school management solution</h3>
    <div class="hero-buttons">
        <button type="button" class="btn btn-secondary">Browse Users</button>
        <button type="button"  class="btn btn-success">Log in</button>
    </div>
</div>
<div class="main-body">
    <h2>All Subjects</h2>
    <div class="subject-cards">
        <?php

            foreach ($subjects1 as $subject) {
                echo '<div class="card" style="width: 18rem">
                      <img class="card-img-top" src="soln.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">' . $subject[0] . '</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                      </div>
                    </div>';
            }
        ?>
    </div>
    <div class="subject-cards">
        <?php

        foreach ($subjects2 as $subject) {
            echo '<div class="card" style="width: 18rem">
                      <img class="card-img-top" src="soln.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">' . $subject[0] . '</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                      </div>
                    </div>';
        }
        ?>
    </div>
    <h2>All Students</h2>
    <div class="subject-cards">
        <?php

        foreach ($students as $student) {
            echo '<div class="card" style="width: 18rem">
                      <img class="card-img-top" src="soln.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">' . $student[0] . '</h5>
                        <p class="card-text">' . $student[2] . '</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                      </div>
                    </div>';
        }
        ?>
    </div>
    <h2>All Teachers</h2>
    <div class="subject-cards">
        <?php

        foreach ($teachers as $teacher) {
            echo '<div class="card" style="width: 18rem">
                      <img class="card-img-top" src="soln.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">' . $teacher[0] . '</h5>
                        <p class="card-text">' . $teacher[2] . '</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                      </div>
                    </div>';
        }
        ?>
    </div>
</div>
</body>
</html>
