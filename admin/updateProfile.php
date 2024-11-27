<?php
include '../config/db.php';
session_start();
if(isset($_POST['update'])){
    $id=$_SESSION['Id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $password=$_POST['password'];
    $designation=$_POST['designation'];
    $img_name=$_FILES['admin_photo']['name'];
    if($img_name==null)
    {
        $sql1 = "UPDATE users SET name='$name',email = '$email',phoneno='$phoneno',designation='$designation',password = '$password' WHERE id = '$id'";
        $result1 = mysqli_query($con, $sql1) or die ("Query Unsuccessful.");
        $_SESSION['status']="Updated Successfully.";
        $_SESSION['status_code']="success";
        header("Location: http://localhost/requistion/admin/profile.php");
    }
    else{
        $tmp_img_name=$_FILES['admin_photo']['tmp_name'];
        $folder='upload/'.$img_name;
        move_uploaded_file($tmp_img_name,$folder);
        $sql2 = "UPDATE users SET name='$name',email = '$email',phoneno='$phoneno',designation='$designation',image='$img_name',password = '$password' WHERE id = '$id'";
        $result2 = mysqli_query($con, $sql2) or die ("Query Unsuccessful.");
        $_SESSION['status']="Updated Successfully.";
        $_SESSION['status_code']="success";
        header("Location: http://localhost/requistion/admin/profile.php");
    }
}
?>