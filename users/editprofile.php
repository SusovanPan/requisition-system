<?php
include '../config/db.php';
include 'includes/header.php';
include 'includes/script.php';
?>
<div id="content-wrapper" class="d-flex flex-column">
<?php
        include '../config/db.php';
        $id=$_SESSION['Id'];
        $query="SELECT * FROM users where id='{$id}'";
        $result = mysqli_query($con, $query) or die("Query Unsuccessful.");
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
    ?>
<!-- Main Content -->
    <div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...Faculty"
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php 
                    if($row['gender']=='Male'){
                        echo 'Mr. '.$row['name'];
                    }
                    else{
                        echo 'Mrs. '.$row['name'];
                    }
                    ?></span>
                    <!--<img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">-->
                        <?php 
                        echo '<img  class="img-profile rounded-circle" src="../admin/upload/'.$row['image'].'"alt="Image">' 
                        ?>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

         <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">If you are ready to end your current session then click "Logout" otherwise click Cancel.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
    
    <form action="updateProfile.php" method="POST" enctype='multipart/form-data'>
        <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <?php echo '<img  class="rounded-circle mt-5" src="../admin/upload/'.$row['image'].'"alt="Image" height="200px;" width="200px;">' ?> 
                <h4><br>My Current Picture</h4>
            </div>
        </div>
        <div class="col-md-7">
            <h2>Edit Profile</h2>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="row">
                <div class="col-md-6">
                    <label name="id">Faculty ID : <?php echo $row['id']; ?></label><br>
                    <label name="createdby" style="font-size:12px;">Created By: <?php
                        $adminname=$row['createdAdminId'];
                        $created_Adminname="SELECT name FROM users WHERE id='{$adminname}'";
                        $result_Admin_name=mysqli_query($con,$created_Adminname) or die("Query Failed");
                        if(mysqli_num_rows($result_Admin_name)>0){
                            while($row_Admin_name=mysqli_fetch_assoc($result_Admin_name)){
                                    echo $row_Admin_name['name'];
                            }
                        }
                        else 
                        echo 'Sorry!';
                      ?></label>
                </div>
                <div class="col-md-3">
                    <label>Gender:</label>
                        <select name="gender" class="form-control">
                            <option>Select Gender</option>
                            <option value="Male"
                            <?php
                            if($row['gender']=='Male')
                            {
                                echo "selected";
                            }
                            ?>
                            >Male</option>
                            <option value="Female"
                            <?php
                            if($row['gender']=='Female')
                            {
                                echo "selected";
                            }
                            ?>
                            >Female</option>
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label style="font-size:15px;padding-top:10px;">Name:</label>
                    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" >
                </div>
                <div class="col-md-6">
                <label style="font-size:15px;padding-top:10px;">Designation:</label>
                    <select name="designation" class="form-control">
                        <option value="Assistant Professor"
                        <?php
                        if($row['designation']=='Assistant Professor')
                        {
                            echo "selected";
                        }?>
                        >Assistant Professor</option>
                        <option value="Associate Professor"
                        <?php
                        if($row['designation']=='Associate Professor')
                        {
                            echo "selected";
                        }
                        ?>>Associate Professor</option>
                        <option value="Professor"
                        <?php
                        if($row['designation']=='Professor')
                        {
                            echo "selected";
                        }
                        ?>>Professor</option>
                        <option value="HOD"
                        <?php
                        if($row['designation']=='HOD')
                        {
                            echo "selected";
                        }
                        ?>>HOD</option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label style="font-size:15px;padding-top:10px;">E-Mail:</label>
                    <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" >
                    
                </div>
                <div class="col-md-6">
                <label style="font-size:15px;padding-top:10px;" for="exampleFormControlFile1">Faculty Photo</label>
			        <input type="file" name="users_photo" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label style="font-size:15px;padding-top:10px;">Password:</label>
                    <input type="text" class="form-control" value="<?php echo $row['password']; ?>" name="password">
                </div>
                <div class="col-md-6">
                
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <label style="font-size:15px;padding-top:10px;">Phone Number:</label>
                    <input type="text" class="form-control" value="<?php echo $row['phoneno']; ?>" name="phoneno" >   
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="col-md-6">
                <button type="submit" name="update" class="btn btn-primary ">Update</button>
            </div>
            </form>
      </div>
                        </div>
    </div>
    <?php
            }
        }
        ?>
<?php
include 'includes/footer.php';
?>