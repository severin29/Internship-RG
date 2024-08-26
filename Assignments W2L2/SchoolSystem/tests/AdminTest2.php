<?php

require_once __DIR__ . '/../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

class AdminTest2 extends TestCase
{

    private $admin;

    protected function setUp(): void
    {
        $this->admin = new Admin('admin', 'adminpass', 'Admin Adminov');
    }

    public function testAddTeacher()
    {
        $teachers = [];
        $teacherUsername = 'teacher1';
        $teacherPassword = 'teacherpass1';
        $teacherName = 'Teacher One';
        $teacherSubjects = ["Maths", "English", "Music"];

        $teachers = $this->admin->addTeacher($teachers, $teacherUsername, $teacherPassword, $teacherName, $teacherSubjects);
        $this->assertCount(1, $teachers); // Check if one teacher is added
        $this->assertEquals($teacherUsername, $teachers[0]->username);
        $this->assertEquals($teacherName, $teachers[0]->name);
        $this->assertEquals($teacherSubjects, $teachers[0]->teacherSubjects);
    }

    public function testAddStudent()
    {
        $students = [];
        $studentUsername = 'student1';
        $studentPassword = 'studentpass1';
        $studentName = 'Student One';
        $studentSubjects = ["Maths", "English", "Music"];


        $students = $this->admin->addStudent($students, $studentUsername, $studentPassword, $studentName, $studentSubjects);
        $this->assertCount(1, $students); // Check if one student is added
        $this->assertEquals($studentUsername, $students[0]->username);
        $this->assertEquals($studentName, $students[0]->name);
        $this->assertEquals($studentSubjects, $students[0]->studentSubjects);
    }

    public function testAddSubject()
    {
        $subjects = ['Maths'];
        $newSubject = 'Science';

        $this->admin->addSubject($subjects, $newSubject);
        $this->assertContains('Science', $subjects); // Check if the subject is added
    }

    public function testRemoveTeacher()
    {
        $teachers = [
            new Teacher('teacher1', 'teacherpass1', 'Teacher One', ["Maths", "English", "Music"]),
            new Teacher('teacher2', 'teacherpass2', 'Teacher Two', ["Maths", "English", "Music"]),
        ];
        $teacherToRemove = 'teacher1';

        $result = $this->admin->removeTeacher($teachers, $teacherToRemove);
        $this->assertTrue($result); // Check if the removal was successful
        $this->assertCount(1, $teachers); // Check if one teacher is removed
    }

    public function testRemoveStudent()
    {
        $students = [
            new Student('student1', 'studentpass1', 'Student One', ["Maths", "English", "Music"]),
            new Student('student2', 'studentpass2', 'Student Two', ["Maths", "English", "Music"]),
        ];
        $studentToRemove = 'student1';

        $result = $this->admin->removeStudent($students, $studentToRemove);
        $this->assertTrue($result); // Check if the removal was successful
        $this->assertCount(1, $students); // Check if one student is removed
    }

    public function testRemoveSubject()
    {
        $subjects = ['Maths', 'Science'];
        $subjectToRemove = 'Maths';

        $result = $this->admin->removeSubject($subjects, $subjectToRemove);
        $this->assertTrue($result); // Check if the removal was successful
        $this->assertCount(1, $subjects); // Check if one subject is removed
        $this->assertNotContains('Maths', $subjects); // Check if the specific subject is removed
    }
}
