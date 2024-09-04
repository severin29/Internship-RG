<?php

header('Content-Type: application/json');
$teachers = json_decode(file_get_contents('teachers.json'),true);

$method = $_SERVER['REQUEST_METHOD'];


function getNextID($teachers){
    return count($teachers) > 0 ? max(array_column($teachers, 'id')) + 1 : 1;
}

switch ($method) {
    case 'GET':
        $id = $_GET['id'];
        if (isset($id)){
            $teacher = array_filter($teachers, function($t) use ($id){
               return $t['id'] == $id;
            });

            $teacher = array_values($teacher);
            if ($teacher) {
                echo json_encode($teacher[0]);
            }else{
                http_response_code(404);
                echo json_encode(['message' => 'Teacher Not Found']);
            }

        } else {
            echo json_encode($teachers);
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        if(isset($input['username'], $input['password'], $input['name'], $input['subjects'])){
            $newTeacher = [
                'id' => getNextID($teachers),
                'username' => $input['username'],
                'password' => $input['password'],
                'name' => $input['name'],
                'subjects' => $input['subjects']
            ];
            $teachers[] = $newTeacher;
            file_put_contents('teachers.json', json_encode($teachers));
            echo json_encode($newTeacher);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Invalid input']);
        }
        break;
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        if (isset($id) && isset($input['username'], $input['password'], $input['name'], $input['subjects'])){
            $index = array_search($id, array_column($teachers, 'id'));
            if ($index !== false){
                $teachers[$index]['username'] = $input['username'];
                $teachers[$index]['password'] = $input['password'];
                $teachers[$index]['name'] = $input['name'];
                $teachers[$index]['subjects'] = $input['subjects'];
                file_put_contents('teachers.json', json_encode($teachers));
                echo json_encode($teachers[$index]);
            }else{
                http_response_code(404);
                echo json_encode(['message' => 'Teacher Not Found']);
            }
        }else {
            http_response_code(400);
            echo json_encode(['message' => 'Invalid input (Check for missing ID)']);
        }
        break;
    case 'DELETE':
        $id = $_GET['id'];
        if (isset($id)) {
            $index = array_search($id, array_column($teachers, 'id'));
            if ($index !== false){
                array_splice($teachers, $index, 1);
                array_values($teachers);
                file_put_contents('teachers.json', json_encode($teachers));
                echo json_encode($teachers[$index]);
            }else{
                http_response_code(404);
                echo json_encode(['message' => 'Teacher Not Found']);
            }
        }else{
            http_response_code(400);
            echo json_encode(['message' => 'Invalid input']);
        }
        break;
    default:
        http_response_code(400);
        echo json_encode(['message' => 'Method not allowed, this is a simple CRUD API :)']);
}