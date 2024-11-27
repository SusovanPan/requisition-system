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
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Prof. <?php echo $row['name']; ?></span>
                    <!--<img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">-->
                        <?php 
                        echo '<img  class="img-profile rounded-circle" src="upload/'.$row['image'].'"alt="Image">' 
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

    <!-- Main Content -->
    <div class="container-fluid">
        <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
            <i class='fas fa-user-plus'></i> Add Admin
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle"><i class='fas fa-user-alt'></i>  Admin Details...</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
				  <form action="addadmincode.php" method="POST" enctype='multipart/form-data'>
			      <div class="modal-body">
						<div class="form-group">
							<?php
							include '../config/db.php';
							//echo '<h2>'.$row_id.'</h2>';
							?>
						</div>
			        	<div class="form-group">
						  	<input type="text" name="name" required class="form-control form-control-sm" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Name...">
						</div>
						<div class="form-group">
						    <!--<label for="exampleInputPassword1">Password</label>-->
						    <input type="email" name="email" required class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Enter Email...">
						</div>
			        	<div class="form-group">
						    <!--<label for="exampleInputEmail1">Email address</label>-->
						    <input type="password" name="password" required class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password...">
						    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
						</div>
						<div class="form-group">
			    			<label for="exampleFormControlFile1">Admin Photo</label>
			    			<input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
			  			</div>
						  
						<button type="submit" name="saveData" class="btn btn-primary ">Submit</button>
			      </div>
				  </form>
			    </div>
			  </div>
			</div>

			<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i style='font-size:20px' class='fas fa-users'></i> Admin List</h6>
                        </div>
                        <div class="card-body">
			                            <div class="table-responsive">

										<?php
											include ('../config/db.php');
											$query="SELECT * FROM users WHERE id not in ('{$_SESSION['Id']}') AND usertype='Admin'";
											$result = mysqli_query($con, $query) or die("Query Unsuccessful.");
											if(mysqli_num_rows($result)>0){
											?>
                                            <style>
                                                #dataTable{
                                                    text-align:center;
                                                }
                                            </style>
			                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			                                    <thead>
			                                        <tr>
			                                            <th>Photo</th>
			                                            <th>Name</th>
			                                            <th>Email</th>
			                                            <th>password</th>
			                                            <th>Operation</th>
			                                            
			                                        </tr>
			                                    </thead>
			                                    <tbody>
													<?php
														while($row=mysqli_fetch_assoc($result)){
													?>
			                                        <tr>
														
			                                            <td><?php echo '<img src="upload/'.$row['image'].'"alt="Image" height="100px;" width="100px;">'?></td>
			                                            <td><?php echo $row['name'];?></td>
			                                            <td><?php echo $row['email'];?></td>
			                                            <td><?php echo $row['password'];?></td>
			                                            <td>
                                                            
                                                            <a href='edit.php?id=<?php echo $row['id']; ?>'><i class="fas fa-edit"></i></a>
                                                            <a data-toggle="modal" data-target="#deleteModal<?php echo $row['id']; ?>">
                                                            <i class="fas fa-trash-alt" style="color:red"></i></a>
                                                            
                                                        </td>

                                                             <!-- Delete Modal-->
                                                        <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">Are you sure you want to DELETE  this admin?</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                                    <a class="btn btn-primary" style="background-color:#ed330e;border:none" href="deleteadmin.php?id=<?php echo $row['id']; ?>"><i class='fas fa-skull-crossbones'></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

			                                        </tr>
													<?php } ?>
			                                    </tbody>
			                                </table>
											<?php } else {
												echo "<h2>No Records Found</h2>";
											}
											mysqli_close($con);
											?>
			                            </div>
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