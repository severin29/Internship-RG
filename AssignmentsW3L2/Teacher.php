<?php

include_once 'User.php';
class Teacher extends User
{
    private $subjectsTaught;

    public function __construct($username, $password, $subjectsTaught) {
        parent::__construct($username, $password, 'teacher');
        $this->subjectsTaught = $subjectsTaught;
    }

    public function getSubjectsTaught() {
        return $this->subjectsTaught;
    }

    public function gradeStudent($studentUsername, $subject, $gradeType, $grade) {
        if (in_array($subject, $this->subjectsTaught)) {
            $file = fopen('grades.csv', 'a');
            fputcsv($file, [$studentUsername, $subject, $gradeType, $grade]);
            fclose($file);
        } else {
            throw new Exception("You do not teach this subject.");
        }
    }
}