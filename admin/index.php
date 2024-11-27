<?php
include('../config/db.php');
include('includes/header.php');
include('includes/script.php');
?>

<div id="content-wrapper" class="d-flex flex-column">
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
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
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
<?php
                    include '../config/db.php';
                    $id=$_SESSION['Id'];
                    $query="SELECT * FROM users where id='{$id}'";
                    $result = mysqli_query($con, $query) or die("Query Unsuccessful.");
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
?>	
                    
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Prof. <?php echo $row['name']; ?></span>
                    <!--<img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">-->
<?php echo '<img  class="img-profile rounded-circle" src="upload/'.$row['image'].'"alt="Image">' ?>
<?php
                     }
                 }
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
                    <!-- Content Row -->
                    <div class="row">

                        <!-- No OF Admin -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            No of Admin.  </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php
                                                $query="SELECT id FROM users where usertype='Admin' ORDER BY id";
                                                $result=mysqli_query($con,$query) or die("Query Failed for Count Admin");
                                                $count=mysqli_num_rows($result);
                                                echo $count;
?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- NO Of Visiitng Faculty -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              No of Visiting Faculty. </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php
                                                $query1="SELECT id FROM users where usertype='User' and designation='visiting' ORDER BY id";
                                                $result1=mysqli_query($con,$query1) or die("Query Failed for Count Admin");
                                                $count1=mysqli_num_rows($result1);
                                                echo $count1;
?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- No Of permanent Faculty -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">No of Permanent Faculty.
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
<?php
                                                $query2="SELECT id FROM users where usertype='User' and designation='permanent' ORDER BY id";
                                                $result2=mysqli_query($con,$query2) or die("Query Failed for Count Admin");
                                                $count2=mysqli_num_rows($result2);
                                                echo $count2;
?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <!--<div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                No of Technical Assitance.</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td style="padding-top:10px;"><span style="font-size:20px;">Backup</br>PANEL</span></td>
                                        <td style="text-align:left;padding:10px;">
                                        <form action="backup/database_backup.php" method="POST">
                                        <span>From(Date) :</span></br>
                                        <input type="date" name="startdate" class="form-control" required></br>
                                        <span>To(Date) :</span></br>
                                        <input type="date" name="enddate" class="form-control" required></br>
                                        <span>Table :</span>
                                        <select name="dbtable" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option value="" selected>Select Table</option>
                                            <option value="requisition">All Requistion</option>
                                            <option value="requisition_book">Book Requistion</option>
                                        </select>
                                        <input type="submit" name="backupnow" class="btn btn-primary" value="Backup">
                                        </form>
                                        </td>
                                    </tr>
                                    </table>
                </div>
                                
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
				    </div>
                </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        <!-- End of Main Content -->
<?php
include('includes/footer.php');?>