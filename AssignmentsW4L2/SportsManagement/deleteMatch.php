<?php

session_start();
include "db.php";

if (!isset($_SESSION['username'])) {
    header('Location: loginPage.php');
    exit();
}

if(isset($_GET['id'])){
    $sql = "DELETE FROM matches WHERE id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location: matches.php?message=Match deleted');
    }else{
        header('Location: matches.php?message=Match not deleted');
    }

}else{
    header('Location: matches.php?message=No Match with such ID');
}
