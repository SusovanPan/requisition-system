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
    //$designation=$_POST['designation'];
    $img_name=$_FILES['users_photo']['name'];
    if($img_name==null)
    {
        $sql1 = "UPDATE users SET name='$name',email = '$email',phoneno='$phoneno',password = '$password', designation='$designation' WHERE id = '$id'";
        $result1 = mysqli_query($con, $sql1) or die ("Query Unsuccessful.");
        
        $_SESSION['status']="Updated Successfully.";
        $_SESSION['status_code']="success";

        header("Location: http://localhost/requistion/users/profile.php");
    }
    else{
        $tmp_img_name=$_FILES['users_photo']['tmp_name'];
        $folder='../admin/upload/'.$img_name;
        move_uploaded_file($tmp_img_name,$folder);

        $sql2 = "UPDATE users SET name='$name',email = '$email',phoneno='$phoneno',image='$img_name',password = '$password',designation='$designation' WHERE id = '$id'";
        $result2 = mysqli_query($con, $sql2) or die ("Query Unsuccessful.");

        $_SESSION['status']="Updated Successfully.";
        $_SESSION['status_code']="success";

        header("Location: http://localhost/requistion/users/profile.php");
    }
}
?>