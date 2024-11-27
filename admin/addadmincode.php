<?php
include('../config/db.php');
if(isset($_POST['saveData']))
{
    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $img_name=$_FILES['photo']['name'];
    $tmp_img_name=$_FILES['photo']['tmp_name'];
    $folder='upload/'.$img_name;
    move_uploaded_file($tmp_img_name,$folder);
    
    $query="INSERT INTO users(name,email,password,usertype,image) VALUES ('$name','$email','$password','Admin','$img_name')";
    $result = mysqli_query($con, $query) or die ("Query Unsuccessful.");
    $_SESSION['status']="Congratulation.Admin Successfully Registered.";
    $_SESSION['status_code']="success";
    header("Location: http://localhost/requistion/admin/addadmin.php");
    }
?>