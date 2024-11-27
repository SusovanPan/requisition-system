<?php
include('../config/db.php');
include('includes/header.php');
include('includes/script.php');
//include('db.php');
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
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <p style="font-size:21px;color:Black;letter-spacing:2.5px;text-align:center">Welcome to Techno India Family</p>
                            <div class="row">
                                <div class="col-sm">
                                My Profile <a href="editprofile.php"><i class='fas fa-chevron-circle-right'></i></a>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                <?php
                                        include '../config/db.php';
                                        $id_profile=$_SESSION['Id'];
                                        $query_profile="SELECT * FROM users where id='{$id_profile}'";
                                        $result_profile = mysqli_query($con, $query_profile) or die("Query Unsuccessful.");
                                        if(mysqli_num_rows($result_profile)>0){
                                            while($row_profile=mysqli_fetch_assoc($result_profile)){
                                        ?>
                                        <tr>
                                            <td><img src="../admin/upload/<?php echo $row_profile['image']; ?>" height="100px;" width="100px;"></td>
                                            <td>
                                            <p style="font-size:15px"><?php echo $row_profile['name']; ?></p>
                                            <p style="font-size:13px"><?php echo $row_profile['password']; ?></p>
                                            <p style="font-size:13px"><?php echo $row_profile['email']; ?></p>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                </table>
                                </div>
                                </div>
                                <div class="col-sm">
                                 <a href=""><i class='fas fa-chevron-circle-right'></i></a>
                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
    <?php
            }
        }
    ?>

<?php
include('includes/footer.php');
?>
