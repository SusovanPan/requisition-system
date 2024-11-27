<?php
include '../config/db.php';
$userid=$_POST['userid'];
$sql="SELECT * FROM users WHERE id=$userid";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
$status=$data['activeStatus'];
if($status=='1'){
    $status='0';
}
else{
    $status='1';
}
$update="UPDATE users SET activeStatus='$status' WHERE id=$userid";
$result1=mysqli_query($con,$update);
if($result1){
    echo $status;
}
?>