<?php


use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../Admin.php";
require_once __DIR__ . "/../User.php";
require_once __DIR__ . "/../functions.php";

class AdminTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        $this->admin = new Admin('admin', 'adminpass');
    }

    public function testAddStudent()
    {
        $username = 'newstudent';
        $password = 'password123';
        $role = 'student';
        $subjects = ['Math', 'Science'];

        $this->admin->addUser($username, $password, $role, $subjects);


        $students = readCSV('/../students.csv');

        var_dump($students);

        $found = false;

        var_dump($students);

        foreach ($students as $student) {
            if ($student[0] === $username && $student[1] === $password) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "New student should be added to students.csv");
    }
}
