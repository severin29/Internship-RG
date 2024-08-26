<?php

class Teacher extends User
{

    public $teacherSubjects = [];

    public function __construct($username, $password, $name, $teacherSubjects)
    {
        parent::__construct($username, $password, $name);
        $this->teacherSubjects = $teacherSubjects;

    }

    public function listStudents($students)
    {
        global $grades;
        echo "Current Students: \n";
        foreach ($students as $student) {
            echo $student->username . " - " . $student->name . "\n";
        }

        var_dump($grades);
    }

    public function gradeStudent($students, $studentUsername, $subject, $grade)
    {
        global $grades;

        $studentExists = false;
        foreach ($students as $student) {
            if ($student->username == $studentUsername) {
                $studentExists = true;
                break;
            }
        }

        if ($studentExists == false) {
            echo "Student doesn't exist. \n";
            return;
        }


        if (!isset($grades[$studentUsername])) {
            $grades[$studentUsername] = [];
        }


        if (!isset($grades[$studentUsername][$subject])) {
            $grades[$studentUsername][$subject] = [];
        }

        $grades[$studentUsername][$subject][] = $grade;


        echo "Student graded successfully! \n";


    }

    public function listStudentsSubjects(&$grades, $studentUsername, $teacherSubjects, $studentSubjects)
    {
        if (isset($grades[$studentUsername])) {

            echo "Subjects and Grades for " . $studentUsername . "\n";
            foreach ($grades[$studentUsername] as $subject => $subjectGrades) {
                echo "Subject: " . $subject . ", Grades: " . implode(",", $subjectGrades) . "\n";
            }
        } else {
            echo "The student " . $studentUsername . " has no grades. \n";
        }

        /*$intersectSubjects = array_intersect($studentSubjects, $teacherSubjects);

        foreach ($intersectSubjects as $subject) {
            echo $subject . "\n";
        }*/

    }
}