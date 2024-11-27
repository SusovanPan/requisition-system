<?php
    include '../config/db.php';
    session_start();
    $stu_id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id={$stu_id}";
    $result = mysqli_query($con, $sql) or die("Query Unsuccessful.");
    $sql1="DELETE FROM requisition WHERE uid={$stu_id}";
    $result = mysqli_query($con, $sql1) or die("Query Unsuccessful.");
    $sql1="DELETE FROM requisition_book WHERE uid={$stu_id}";
    $result = mysqli_query($con, $sql1) or die("Query Unsuccessful.");
    $_SESSION['status']="User Deleted Successfully.";
    $_SESSION['status_code']="success";
    header("Location: http://localhost/requistion/admin/permanentfaculty.php");
    mysqli_close($conn) ;
?>