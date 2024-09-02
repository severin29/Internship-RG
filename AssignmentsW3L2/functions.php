<?php

function readCSV($file) {
    $rows = [];
    if (($handle = fopen($file, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $rows[] = $data;
        }
        fclose($handle);
    }
    return $rows;
}

function readUsersFromCSV() {
    $users = [];

    $students = readCSV("students.csv");
    foreach ($students as $student) {
        $users[] = [
            'username' => $student[0],
            'password' => $student[1],
            'role' => 'student',
            'subjects' => explode("|", $student[2])
        ];
    }

    $teachers = readCSV("teachers.csv");
    foreach ($teachers as $teacher) {
        $users[] = [
            'username' => $teacher[0],
            'password' => $teacher[1],
            'role' => 'teacher',
            'subjects_taught' => explode("|", $teacher[2])
        ];
    }

    $admins = readCSV("admins.csv");
    foreach ($admins as $admin) {
        $users[] = [
            'username' => $admin[0],
            'password' => $admin[1],
            'role' => 'admin'
        ];
    }

    return $users;
}

?>
