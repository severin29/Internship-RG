<?php


use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    private $student;
    public $grades = ['student' => ['Maths' => [6, 6, 6], 'English' => [5, 6, 4]]];
    protected function setUp(): void
    {
        $this->student = new Student('student', 'studentpass', 'student studentov', ["Maths", "English"]);
        $this->admin = new Admin('admin', 'adminpass', 'Admin Adminov');

    }

    public function testViewGrades(){

        $students = [];
        $studentUsername = 'student1';
        $studentPassword = 'studentpass1';
        $studentName = 'Student One';
        $studentSubjects = ["Maths", "English", "Music"];
        $students = $this->admin->addStudent($students, $studentUsername, $studentPassword, $studentName, $studentSubjects);

        $grades = ['student' => ['Maths' => [6, 6, 6], 'English' => [5, 6, 4]]];

        $this->assertEquals($grades, $students[0]->viewGrades($grades));
    }
}
