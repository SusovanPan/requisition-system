<?php
include '../config/db.php';
session_start();

$id=$_GET['id'];
$status=$_GET['status'];
date_default_timezone_set("Asia/Kolkata");
$date=date("y-m-d");

if($status==1){
    $message_status="Approved";
    $query="update requisition_book set status = $status, approvedDate = '$date' where id=$id";
}
else{
    $message_status="Not Approved";
    $query="update requisition_book set status = $status, approvedDate = '' where id=$id";
}

mysqli_query($con,$query);
$_SESSION['status']=$message_status;
if($message_status=="Approved"){
    $_SESSION['status_code']="success";
}
else{
    $_SESSION['status_code']="warning";
}
// $query="update requisition_book set status=$status where id=$id";
// mysqli_query($con,$query);
header("Location: http://localhost/requistion/admin/bookrequisition.php");
?>