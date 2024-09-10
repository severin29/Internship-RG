<?php

session_start();
include "db.php";

if (!isset($_SESSION['username'])) {
    header('Location: loginPage.php');
    exit();
}

if(isset($_GET['id'])){
    $sql = "DELETE FROM teams WHERE id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location: teams.php?message=Player deleted');
    }else{
        header('Location: teams.php?message=Player not deleted');
    }

}else{
    header('Location: teams.php?message=No Player with such ID');
}
