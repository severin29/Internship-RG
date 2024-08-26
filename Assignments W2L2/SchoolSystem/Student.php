<?php

class Student extends User
{

    public $studentSubjects = [];

    public function __construct($username, $password, $name, $studentSubjects)
    {
        parent::__construct($username, $password, $name);
        $this->studentSubjects = $studentSubjects;
    }

    public function viewGrades($grades)
    {
        if (isset($grades[$this->username])) {
            foreach ($grades[$this->username] as $subject => $subjectGrades) {
                echo "Subject: " . $subject . ", Grades: " . implode(", ", $subjectGrades) . "\n";

                echo "Average grade for $subject: " . (float)array_sum($subjectGrades) / count($subjectGrades) . "\n";
            }
        } else {
            echo "You have no grades. \n";
        }
    }
}