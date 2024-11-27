<?php
    include '../config/db.php';
    session_start();
    $stu_id = $_GET['id'];
    $sql = "DELETE FROM requisition_book WHERE id={$stu_id}";
    $result = mysqli_query($con, $sql) or die("Query Unsuccessful.");
    $_SESSION['status']="Data Deleted Successfully.";
    $_SESSION['status_code']="success";
    header("Location: http://localhost/requistion/admin/bookrequisition.php");
    mysqli_close($conn) ;
?>