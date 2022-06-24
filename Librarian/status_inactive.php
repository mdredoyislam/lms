<?php
    require_once '../dbcon.php';
    $id = base64_decode($_GET['id']);

    $sql = "UPDATE students SET `status` = '0' WHERE `id` = '$id'";
    mysqli_query($con , $sql);
    header('location: students.php');
?>