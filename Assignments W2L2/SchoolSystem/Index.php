<?php

require 'User.php';
require 'Admin.php';
require 'Teacher.php';
require 'Student.php';

$admins = [new Admin('admin', 'adminpass', 'Admin Adminov')];
$teachers = [new Teacher('teacher', 'teacherpass', 'Teacher Teacherov', ['Science', 'English'])];
$students = [new Student('student', 'studentpass', 'Student Studentov', ['Maths', 'English'])];
$predeterminedSubjects = ['Maths', 'Science', 'English', 'Music'];
$grades = ['student' => ['Maths' => [6, 6, 6], 'English' => [5, 6, 4]]];

$teacherSubjects = [];
$studentSubjects = [];
$maxAttempts = 3;
$attempts = $maxAttempts;
function login($username, $password, $users)
{
    foreach ($users as $user) {
        if ($user->login($username, $password)) {
            return $user;
        }
    }
    return null;
}

function validPassword($password)
{
    $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/';
    if (preg_match($pattern, $password)) {
        return true;
    }
    return false;
}

function validSubjectName($subjectName)
{
    if (trim($subjectName) == "" || strlen($subjectName) < 2) {
        return false;
    }
    return true;
}

echo "Welcome to the School Management System \n";

while ($attempts > 0) {


    echo "Enter your username: ";
    $username = trim(fgets(STDIN));
    echo "Enter your password: ";
    $password = trim(fgets(STDIN));

    $currentUser = login($username, $password, array_merge($admins, $teachers, $students));

    if ($currentUser) {
        echo "Login successful! Welcome, " . $username . "\n";


        if ($currentUser instanceof Admin) {
            while (true) {
                echo "1. Add Teacher \n";
                echo "2. Add Student \n";
                echo "3. Add Subject \n";
                echo "4. Remove Teacher \n";
                echo "5. Remove Student \n";
                echo "6. Remove Subject \n";
                echo "7. Logout \n";

                $option = trim(fgets(STDIN));

                switch ($option) {
                    case "1":
                        echo "Enter teacher username: \n";
                        $teacherUsername = trim(fgets(STDIN));
                        do {

                            echo "Enter teacher password (min 8 chars, at least 1 uppercase, 1 lowercase, 1 number, 1 special char): \n";
                            $teacherPassword = trim(fgets(STDIN));

                            if (!validPassword($teacherPassword)) {
                                "Password is not strong enough. Please try again. \n";
                            }
                        } while (!validPassword($teacherPassword));

                        echo "Enter teacher name: \n";
                        $teacherName = trim(fgets(STDIN));

                        $currentUser->listSubjects();

                        echo "Enter subjects to assign to $teacherUsername. Please separate subjects by a comma (,).";
                        $assignedSubjects = trim(fgets(STDIN));

                        global $teacherSubjects;
                        $teacherSubjects = explode(",", $assignedSubjects);

                        $teachers = $currentUser->addTeacher($teachers, $teacherUsername, $teacherPassword, $teacherName, $teacherSubjects);
                        echo "Teacher added successfully! \n";
                        break;

                    case "2":
                        echo "Enter student username: \n";
                        $studentUsername = trim(fgets(STDIN));

                        do {

                            echo "Enter student password (min 8 chars, at least 1 uppercase, 1 lowercase, 1 number, 1 special char): \n";
                            $studentPassword = trim(fgets(STDIN));

                            if (!validPassword($studentPassword)) {
                                "Password is not strong enough. Please try again. \n";
                            }
                        } while (!validPassword($studentPassword));

                        echo "Enter student name: \n";
                        $studentName = trim(fgets(STDIN));

                        $currentUser->listSubjects();

                        echo "Enter subjects to assign to $studentUsername. Please separate subjects by a comma (,).";
                        $assignedSubjects = trim(fgets(STDIN));

                        global $studentSubjects;
                        $studentSubjects = explode(",", $assignedSubjects);

                        $students = $currentUser->addStudent($students, $studentUsername, $studentPassword, $studentName, $studentSubjects);
                        echo "Student added successfully! \n";
                        break;

                    case "3":

                        do {

                            echo "Enter subject name: \n";
                            $subjectName = trim(fgets(STDIN));

                            if (!validSubjectName($subjectName)) {
                                echo "Subject name is not valid. Please try again.\n";
                            }

                        } while (!validSubjectName($subjectName));

                        $currentUser->addSubject($subjects, $subjectName);
                        echo "Subject added successfully! \n";
                        break;

                    case "4":
                        $currentUser->listTeachers($teachers);
                        echo "Enter teacher username to remove: \n";
                        $teacherToRemove = trim(fgets(STDIN));
                        if ($currentUser->removeTeacher($teachers, $teacherToRemove)) {
                            echo "Teacher removed successfully! \n";
                        } else {
                            echo "Teacher not found. \n";
                        }
                        break;

                    case "5":
                        $currentUser->listStudents($students);
                        echo "Enter student username to remove: \n";
                        $studentToRemove = trim(fgets(STDIN));
                        if ($currentUser->removeStudent($students, $studentToRemove)) {
                            echo "Student removed successfully! \n";
                        } else {
                            echo "Student not found. \n";
                        }
                        break;

                    case "6":
                        $currentUser->listSubjects($subjects);
                        echo "Enter subject name to remove: \n";
                        $subjectName = trim(fgets(STDIN));
                        if ($currentUser->removeSubject($subjects, $subjectName)) {
                            echo "Subject removed successfully! \n";
                        } else {
                            echo "Subject not found. \n";
                        }
                        break;

                    case "7":
                        echo "Logging out...\n";
                        break 2;
                }

            }
        } elseif ($currentUser instanceof Teacher) {
            while (true) {
                echo "1. Grade Student \n";
                echo "2. Logout \n";

                $option = trim(fgets(STDIN));

                switch ($option) {
                    case "1":
                        $currentUser->listStudents($students);
                        echo "Enter student name to grade: \n";
                        $studentUsername = trim(fgets(STDIN));


                        $currentUser->listStudentsSubjects($grades, $studentUsername, $teacherSubjects, $studentSubjects);

                        echo "Enter subject: ";
                        $subject = trim(fgets(STDIN));



                        do {
                            echo "Enter grade (2-6): ";
                            $grade = (int) trim(fgets(STDIN));

                            if ($grade < 2 || $grade > 6) {
                                echo "Invalid grade. Please enter a grade between 2 and 6. \n";
                            }
                        } while ($grade < 2 || $grade > 6);

                        $currentUser->gradeStudent($students, $studentUsername, $subject, $grade);
                        break;

                    case "2":
                        echo "Logging out... \n";
                        break 2;
                }
            }
        } elseif ($currentUser instanceof Student) {
            while (true) {
                echo "1. View Grades \n";
                echo "2. Logout \n";

                $option = trim(fgets(STDIN));

                switch ($option) {
                    case "1":
                        $currentUser->viewGrades($grades);
                        break;

                    case "2":
                        echo "Logging out... \n";
                        break 2;
                }
            }
        }

    } else {
        $attempts--;
        echo "Invalid username or password. You have $attempts more attempts. \n";

        if ($attempts < 1) {
            "You've reached the limit of failed logins. The app will now close";
            exit();
        }
    }
}