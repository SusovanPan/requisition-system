<?php
include '../config/db.php';
session_start();

$id=$_GET['id'];
$status=$_GET['status'];
if($status==1){
    $message_status="User Activated";
}
else{
    $message_status="User Deactivate";
}
$query="update users set activeStatus=$status where id=$id";
mysqli_query($con,$query);
$_SESSION['status']=$message_status;
$_SESSION['status_code']="success";
header("Location: http://localhost/requistion/admin/permanentfaculty.php");
?>