<?php
session_start();
if(isset($_SESSION['Id'])){
    if($_SESSION['Usertype']=="Admin"){
        header("Location: http://localhost/requistion/admin/index.php");
    }
    elseif($_SESSION['Usertype']=="User")
    {
        header("Location: http://localhost/requistion/users/home.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                            <div class="col-lg-6">
                                
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="emailtxt" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="passwordtxt" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group" style="border-radius:25px; padding: 0px;">
                                        <!--<label for="exampleInputPassword1">Password</label>-->
                                            <select name="role" class="custom-select my-1 mr-sm-2"  id="inlineFormCustomSelectPref" style="border-radius:25px; padding: 0px;font-size:13px">
                                                <option value="" selected>Select Role...</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <?php
                                    if(isset($_POST['login']))
                                    {
                                        include 'config/db.php';
                                        $email=$_POST['emailtxt'];
                                        $password=$_POST['passwordtxt'];
                                        $role=$_POST['role'];
                                        if($role==""){
                                            $_SESSION['status']="Please select users role.";
                                            $_SESSION['status_code']="warning";
                                        }
                                        elseif($role=="Admin"){
                                            $sql = "SELECT * FROM users WHERE email = '{$email}' AND password ='{$password}' AND usertype='{$role}'"; 
                                            $result =mysqli_query($con,$sql) or die("Query Failed.");
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    
                                                    $_SESSION['Id']=$row['id'];
                                                    $_SESSION['Name']=$row['name'];
                                                    $_SESSION['Email']=$row['email'];
                                                    $_SESSION['Phoneno']=$row['phoneno'];
                                                    $_SESSION['Designation']=$row['designation'];
                                                    $_SESSION['Usertype']=$row['usertype'];
                                                    $_SESSION['Image']=$row['image'];
                                                    $_SESSION['Password']=$row['password'];
                                                    header("Location: http://localhost/requistion/admin/index.php");
                                                   
                                                }
                                            }
                                            else
                                            {
                                                $_SESSION['status']="Please check your email or password.";
                                                $_SESSION['status_code']="warning";
                                            }
                                        }
                                        elseif($role="User")
                                        {
                                            $sql1 = "SELECT * FROM users WHERE email = '{$email}' AND password ='{$password}' AND usertype='{$role}'"; 
                                            $result1 =mysqli_query($con,$sql1) or die("Query Failed.");
                                            if(mysqli_num_rows($result1)>0)
                                            {
                                                while($row1 = mysqli_fetch_assoc($result1))
                                                {
                                                    if($row1['activeStatus']==1){
                                                    $_SESSION['Id']=$row1['id'];
                                                    $_SESSION['Name']=$row1['name'];
                                                    $_SESSION['Email']=$row1['email'];
                                                    $_SESSION['Usertype']=$row1['usertype'];
                                                    header("Location: http://localhost/requistion/users/home.php");
                                                    }
                                                    elseif($row1['activeStatus']==0)
                                                    {
                                                    $_SESSION['status']="Sorry account is deactivated.Please contact to Admin";
                                                    $_SESSION['status_code']="warning";
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $_SESSION['status']="Please check your email or password.";
                                                $_SESSION['status_code']="warning";
                                                
                                            }
                                        }
                                        else
                                        {
                                            $_SESSION['status']="Please select users role.";
                                            $_SESSION['status_code']="warning";
                                            //echo '<script>alert("Please Select User Role... ")</script>';
                                        }
                                    }
                                    ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] != '')
    {
      ?> 
    <script>
      swal(
        {
          title:"<?php echo $_SESSION['status']; ?>",
          //text:"You Clicked the button",
          icon:"<?php echo $_SESSION['status_code']; ?>",
          button:"OK!",
        }
      );
    </script>
    <?php
    unset($_SESSION['status']);
    }
    ?>

</body>

</html>