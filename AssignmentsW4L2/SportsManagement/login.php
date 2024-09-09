<?php
session_start();
include 'db.php';

if(!isset($_POST['username']) && !isset($_POST['password'])){
    header('Location: index.php');
}else{

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if(empty($username) || empty($password)) {
        header('Location: index.php?error=Username or Password is invalid');
    }else{
        $sql = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['username'] == $username && $row['password'] == $password){
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header('Location: dashboard.php');
            }
        }else{
            header('Location: index.php?error=Username or Password is invalid');
        }
    }
}