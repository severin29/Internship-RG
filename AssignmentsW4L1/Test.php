<?php


use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private $apiUrl = 'http://localhost/teachers_api.php/teachers';
    private $testFile = 'teachers_test.json';

    protected function setUp(): void
    {
        // Copy the original JSON file to a test file to avoid modifying real data
        copy('teachers.json', $this->testFile);

        // Modify the API to use the test file instead of the real one
        $_SERVER['REQUEST_URI'] = $this->apiUrl;
    }

    protected function tearDown(): void
    {
        // Clean up the test JSON file after each test
        if (file_exists($this->testFile)) {
            unlink($this->testFile);
        }
    }

    public function testGetAllTeachers()
    {
        // Simulate a GET request to fetch all teachers
        $_SERVER['REQUEST_METHOD'] = 'GET';
        ob_start();
        include 'teacherAPI.php';
        $response = ob_get_clean();

        $data = json_decode($response, true);
        $this->assertIsArray($data);
        $this->assertCount(3, $data);
    }

    public function testGetTeacherById()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['PATH_INFO'] = '/teacherAPI/?id=1';
        ob_start();
        include 'teacherAPI.php';
        $response = ob_get_clean();

        $data = json_decode($response, true);
        $this->assertIsArray($data);
        $this->assertEquals(1, $data['id']);
        $this->assertEquals('john_doe', $data['username']);
    }

    public function testCreateNewTeacher()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'username' => 'alice_jones',
            'password' => 'password789',
            'name' => 'Alice Jones',
            'subjects' => ['Biology', 'Chemistry']
        ];

        ob_start();
        include 'teacherAPI.php';
        $response = ob_get_clean();

        $data = json_decode($response, true);
        $this->assertEquals('alice_jones', $data['username']);
        $this->assertCount(3, readData($this->testFile)); // Now 3 teachers
    }

    public function testUpdateTeacher()
    {
        $_SERVER['REQUEST_METHOD'] = 'PUT';
        $_SERVER['PATH_INFO'] = '/teachers/1';
        $_POST = [
            'username' => 'john_updated',
            'password' => 'newpassword',
            'name' => 'John Updated',
            'subjects' => ['Physics', 'Math']
        ];

        ob_start();
        include 'teacherAPI.php';
        $response = ob_get_clean();

        $data = json_decode($response, true);
        $this->assertEquals('john_updated', $data['username']);
        $updatedData = readData($this->testFile);
        $this->assertEquals('John Updated', $updatedData[0]['name']);
    }

    public function testDeleteTeacher()
    {
        $_SERVER['REQUEST_METHOD'] = 'DELETE';
        $_SERVER['PATH_INFO'] = '/teachers/1';

        ob_start();
        include 'teacherAPI.php';
        $response = ob_get_clean();

        $data = json_decode($response, true);
        $this->assertEquals('Teacher deleted', $data['message']);
        $this->assertCount(1, readData($this->testFile)); // Now only 1 teacher
    }
}
