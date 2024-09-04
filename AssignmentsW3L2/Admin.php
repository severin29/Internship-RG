<?php

include_once 'User.php';
class Admin extends User
{
    public function __construct($username, $password) {
        parent::__construct($username, $password, 'admin');
    }


    public function addUser($username, $password, $role, $subjects = []) {
        $filePath = $role === 'student' ? 'students.csv' : 'teachers.csv';
        $userData = [$username, $password, implode('|', $subjects)];
        $file = fopen($filePath, 'a');
        fputcsv($file, $userData);
        fclose($file);
    }

    public function removeUser($username, $role) {
        $filePath = $role === 'student' ? 'students.csv' : 'teachers.csv';
        $users = readCSV($filePath);

        $updatedUsers = array_filter($users, function ($user) use ($username) {
            return $user[0] !== $username;
        });

        $file = fopen($filePath, 'w');
        foreach ($updatedUsers as $user) {
            fputcsv($file, $user);
        }
        fclose($file);
    }

    public function addSubject($subject) {
        $subjects = readCSV('subjects.csv');

        foreach ($subjects as $existingSubject) {
            if ($existingSubject[0] === $subject) {
                return;
            }
        }

        $file = fopen('subjects.csv', 'a');
        fputcsv($file, [$subject]);
        fclose($file);
    }

    public function removeSubject($subject) {
        $subjects = readCSV('subjects.csv');
        $grades = readCSV('grades.csv');

        $updatedSubjects = array_filter($subjects, function ($existingSubject) use ($subject) {
            return $existingSubject[0] !== $subject; // Assuming subject is the first element
        });

        $file = fopen('subjects.csv', 'w');
        $file2 = fopen('grades.csv', 'w');
        foreach ($updatedSubjects as $existingSubject) {
            fputcsv($file, $existingSubject);
        }
        $updatedGrades = array_filter($grades, function ($existingGrade) use ($subject) {
            return $existingGrade[1] !== $subject;
        });

        foreach ($updatedGrades as $existingGrade) {
            fputcsv($file2, $existingGrade);
        }
        fclose($file);

    }

}