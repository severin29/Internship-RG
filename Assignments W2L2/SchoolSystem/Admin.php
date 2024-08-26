<?php

class Admin extends User
{
    public function addTeacher($teachers, $username, $password, $name, $teachersSubjects)
    {
        $teachers[] = new Teacher($username, $password, $name, $teachersSubjects);
        return $teachers;
    }

    public function addStudent($students, $username, $password, $name, $studentSubjects)
    {
        $students[] = new Student($username, $password, $name, $studentSubjects);
        return $students;
    }

    public function addSubject(&$subjects, $subjectName)
    {
        if (!in_array($subjectName, $subjects)) {
            $subjects[] = $subjectName;
        }
    }

    public function removeStudent(&$students, $studentUsername)
    {
        foreach ($students as $key => $student) {
            if ($student->username == $studentUsername) {
                unset($students[$key]);
                $students = array_values($students);
                return true;
            }

        }
        return false;
    }

    public function removeTeacher(&$teachers, $teacherUsername)
    {
        foreach ($teachers as $key => $teacher) {
            if ($teacher->username == $teacherUsername) {
                unset($teachers[$key]);
                $teachers = array_values($teachers);
                return true;
            }
        }
        return false;
    }

    public function removeSubject(&$subjects, $subjectName)
    {
        $index = array_search($subjectName, $subjects);
        if ($index !== false) {
            unset($subjects[$index]);
            $subjects = array_values($subjects);
            return true;
        }
        return false;
    }

    public function listTeachers($teachers)
    {
        echo "Current teachers: \n";
        foreach ($teachers as $teacher) {
            echo " - " . $teacher->username . ": " . $teacher->name . "\n";
        }
    }

    public function listStudents($students)
    {
        echo "Current students: \n";
        foreach ($students as $student) {
            echo " - " . $student->username . ": " . $student->name . "\n";
        }
    }

    public function listSubjects($predeterminedSubjects)
    {
        echo "Current subjects: \n";
        foreach ($predeterminedSubjects as $subject) {
            echo " - " . $subject . "\n";
        }
    }
}