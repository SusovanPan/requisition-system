<?php
include('../config/db.php');
session_start();

if(isset($_POST['check_submit_btn']))
{
    $email=$_POST['faculty_email'];

    $email_query1="SELECT * FROM users WHERE email='$email'";
    $email_query_run1=mysqli_query($con,$email_query1);
    if(mysqli_num_rows($email_query_run1)>0){
        echo 'Email Already Exists. Please try another.';
    }
    else{
        echo "It's Available."; 
    }
}

if(isset($_POST['saveData']))
{
    date_default_timezone_set("Asia/Kolkata");
    $createdat=date('Y-m-d H:i:s');//account create timestamp
    $lastaccessat=date('Y-m-d H:i:s');//last access timestamp
    $activestatus=1;//1 to active user
    $createadminid=$_SESSION['Id'];//admin id

    $name=$_POST['faculty_name'];
    $email=$_POST['faculty_email'];
    $password=$_POST['faculty_password'];
    $gender=$_POST['gender'];
    $phoneno=$_POST['faculty_phoneno'];
    $img_name=$_FILES['faculty_photo']['name'];
    $tmp_img_name=$_FILES['faculty_photo']['tmp_name'];
    $folder='upload/'.$img_name;
    move_uploaded_file($tmp_img_name,$folder);

    $email_query="SELECT * FROM users WHERE email='$email'";
    $email_query_run=mysqli_query($con,$email_query);
    if(mysqli_num_rows($email_query_run)>0)
    {
        $_SESSION['status']="Sorry.Email Id Already Registered.";
        $_SESSION['status_code']="error";
        header("Location: http://localhost/requistion/admin/visitingfaculty.php");

    }
	else{
        $query="INSERT INTO users(name,email,gender,phoneno,designation,usertype,image,password,createdAt,lastAccess,activeStatus,createdAdminId) VALUES ('$name','$email','$gender','$phoneno','visiting','User','$img_name','$password','$createdat','$lastaccessat','$activestatus','$createadminid')";
        $result = mysqli_query($con, $query) or die ("Query Unsuccessful.");
        $_SESSION['status']="Congratulation.User Successfully Registered.";
        $_SESSION['status_code']="success";
        header("Location: http://localhost/requistion/admin/visitingfaculty.php");
    }
}
if(isset($_POST['saveDataPermanent']))
{
    date_default_timezone_set("Asia/Kolkata");
    $createdat=date('Y-m-d H:i:s');//account create timestamp
    $lastaccessat=date('Y-m-d H:i:s');//last access timestamp
    $activestatus=1;//1 to active user
    $createadminid=$_SESSION['Id'];//admin id

    $name=$_POST['faculty_name'];
    $email=$_POST['faculty_email'];
    $password=$_POST['faculty_password'];
    $gender=$_POST['gender'];
    $phoneno=$_POST['faculty_phoneno'];
    $img_name=$_FILES['faculty_photo']['name'];
    $tmp_img_name=$_FILES['faculty_photo']['tmp_name'];
    $folder='upload/'.$img_name;
    move_uploaded_file($tmp_img_name,$folder);

    $email_query="SELECT * FROM users WHERE email='$email'";
    $email_query_run=mysqli_query($con,$email_query);
    if(mysqli_num_rows($email_query_run)>0)
    {
        $_SESSION['status']="Sorry.Email Id Already Registered.";
        $_SESSION['status_code']="error";
        header("Location: http://localhost/requisition/admin/permanentfaculty.php");

    }
	else{
        $query="INSERT INTO users(name,email,gender,phoneno,designation,usertype,image,password,createdAt,lastAccess,activeStatus,createdAdminId) VALUES ('$name','$email','$gender','$phoneno','permanent','User','$img_name','$password','$createdat','$lastaccessat','$activestatus','$createadminid')";
        $result = mysqli_query($con, $query) or die ("Query Unsuccessful.");
        $_SESSION['status']="Congratulation.User Successfully Registered.";
        $_SESSION['status_code']="success";
        header("Location: http://localhost/requistion/admin/permanentfaculty.php");
    }
}    
?>