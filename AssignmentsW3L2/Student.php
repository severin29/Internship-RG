<?php

include_once 'User.php';
class Student extends User
{
    private $subjects;

    public function __construct($username, $password, $subjects) {
        parent::__construct($username, $password, 'student');
        $this->subjects = $subjects;
    }

    public function getSubjects() {
        return $this->subjects;
    }

    public function viewGrades() {
        $grades = readCSV('grades.csv');
        $studentGrades = array_filter($grades, function($grade) {
            return $grade[0] === $this->username;
        });
        return $studentGrades;
    }

}