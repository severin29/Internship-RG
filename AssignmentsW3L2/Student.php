<?php

include_once 'User.php';
class Student extends User
{
    private $subjects;

    public function __construct($username, $password, $subjects)
    {
        parent::__construct($username, $password, 'student');
        $this->subjects = $subjects;
    }

    public function getSubjects()
    {
        return $this->subjects;
    }

    public function getAverageGrades()
    {
        $grades = readCSV('grades.csv'); // Adjust the path if necessary
        $studentGrades = [];

        // Loop through grades.csv and filter grades for this student
        foreach ($grades as $grade) {
            $studentUsername = $grade[0];
            $subject = $grade[1];
            $gradeValue = $grade[3];

            if ($studentUsername === $this->username) {
                if (!isset($studentGrades[$subject])) {
                    $studentGrades[$subject] = [];
                }
                $studentGrades[$subject][] = $gradeValue;
            }
        }

        // Calculate average grades for each subject
        $averageGrades = [];
        foreach ($studentGrades as $subject => $grades) {
            $averageGrades[$subject] = array_sum(($grades)) / count($grades);
        }

        return $averageGrades;
    }

    public function viewGrades()
    {
        $grades = readCSV('grades.csv');
        $studentGrades = array_filter($grades, function ($grade) {
            return $grade[0] === $this->username;
        });
        return $studentGrades;
    }

}