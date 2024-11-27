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
            while($row1=mysqli_fetch_assoc($result)){
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
                    	
                    
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Prof. <?php echo $row1['name']; ?></span>
                    <!--<img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">-->
                        <?php echo '<img  class="img-profile rounded-circle" src="upload/'.$row1['image'].'"alt="Image">' ?>
                    
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

    <?php
            }
        }
        ?>
            <!-- Main Content -->
        <div class="container-fluid">

        	<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
            <i class='fas fa-user-plus'></i>  Add Permanent Faculty
			</button>

			<!-- Add/Register faculty Modal -->
			<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle"><i class='fas fa-user-alt'></i>  Faculty Details...</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
				  <form action="addusers.php" method="POST" enctype='multipart/form-data'>
			      <div class="modal-body">
						<div class="form-group">
						</div>
			        	<div class="form-group">
						  	<input type="text" name="faculty_name" required class="form-control form-control-sm" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Faculty Name...">
						</div>
                        <div class="form-group">
                            <input type="email" name="faculty_email" required class="form-control checking_email form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email...">
                            <small class="error_email" style="color:Red;"></small>
						</div>
						<div class="form-group">
						    <input type="password" name="faculty_password" required class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Enter Password...">
						</div>
						<div class="form-group">
						    <select name="gender" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
						    	<option value="" selected>Select Gender...</option>
							    <option value="Male">Male</option>
							    <option value="Female">Female</option>
							  </select>
						</div>
                        <div class="form-group">
                            <input type="text" name="faculty_phoneno" required class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone No...">
						</div>
						<div class="form-group">
			    			<label for="exampleFormControlFile1">Faculty Photo</label>
			    			<input type="file" name="faculty_photo" class="form-control-file" id="exampleFormControlFile1">
			  			</div>
						<button type="submit" name="saveDataPermanent" class="btn btn-primary "><i class='fas fa-plus-circle'></i>  Submit</button>
			      </div>
				  </form>
                  <script type='text/javascript'>
                            $(document).ready(function(){
                                $('.checking_email').keyup(function (e){
                                    var email=$('.checking_email').val();
                                    $.ajax({
                                        type:"POST",
                                        url:"addusers.php",
                                        data:{
                                            "check_submit_btn":1,
                                            "faculty_email":email,
                                        },
                                        success:function(response){
                                            //alert(response);
                                            $('.error_email').text(response);
                                        }
                                    });
                                });
                            });
                        </script>
			    </div>
			  </div>
			</div>

			<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i style='font-size:20px' class='fas fa-users'> </i> Faculty List</h6>
                        </div>
                        <div class="card-body">
			                            <div class="table-responsive">

										<?php
											include ('../config/db.php');
                                            //$limit=3;

                                            //if(isset($_GET['page'])){
                                            //    $page=$_GET['page'];
                                            //}
                                            //else{
                                            //    $page=1;
                                            //}
                                            //$offset=($page-1)*$limit;
											$query="SELECT * FROM users where designation='permanent'";
											$result = mysqli_query($con, $query) or die("Query Unsuccessful.");
											if(mysqli_num_rows($result)>0){
											?>
			                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			                                    <thead>
			                                        <tr>
			                                            <th style="text-align:center;">Photo</th>
			                                            <th style="text-align:center;">Name</th>
			                                            <th style="text-align:center;">Email</th>
			                                            <th style="text-align:center;">Password</th>
			                                            <th style="text-align:center;">Status </th>
                                                        <th style="text-align:center;">Designation</th>
														<th style="text-align:center;">Operation</th>
			                                            
			                                        </tr>
			                                    </thead>
			                                    <tbody>
													<?php
														while($row2=mysqli_fetch_assoc($result)){
													?>
			                                        <tr>
														
			                                            <td><?php echo '<img src="upload/'.$row2['image'].'"alt="Image" height="40px;" width="60px;">'?></td>
			                                            <td><?php echo $row2['name'];?></td>
			                                            <td><?php echo $row2['email'];?></td>
                                                        <td><?php echo $row2['password'];?></td>
			                                            <td><?php 
                                                         $astatus=$row2['activeStatus'];
                                                         if ($astatus==1)
                                                         {
                                                            echo '<p><a href="pusers_status.php?id='.$row2['id'].
                                                               '&status=0"><i class="fa fa-check-circle" style="font-size:20px;color:green"></i></a></p>';
                                                           
                                                         }
                                                         else{
                                                             echo '<p><a href="pusers_status.php?id='.$row2['id'].
                                                            '&status=1"><i class="fas fa-exclamation-triangle" style="font-size:20px;color:#f04f43"></i></a></p>';
                                                         }
                                                         ?>
                                                         </td>
			                                            <td>
                                                            <?php echo $row2['designation'].' faculty'; ?>                                                     
                                                        </td>
														<td>
                                                            <button data-id='<?php echo $row2['id']; ?>' class="userinfo" style='background-color:transparent;border:none'><i class="fas fa-eye" style="color:blue"></i></button>
                                                            <!--<a href='show.php?id=<?php echo $row2['id']; ?>' ><i class="userinfo fas fa-eye"></i></a>-->
                                                            <a href='edit.php?id=<?php echo $row2['id']; ?>'><i class="fas fa-edit"></i></a>
                                                            
                                                            <a data-toggle="modal" data-target="#deleteModal<?php echo $row2['id']; ?>">
                                                            <i class="fas fa-trash-alt" style="color:red"></i></a>

                                                        </td>
                                                        <div class="modal fade" id="empModal" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"><i class='fas fa-user-alt' style='font-size:24px'></i> Users Info</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body-faculty"></div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script type='text/javascript'>
                                                            $(document).ready(function(){
                                                                $('.userinfo').click(function(){
                                                                        var userid=$(this).data('id');
                                                                        $.ajax({
                                                                            url:'showajax.php',
                                                                            type:'post',
                                                                            data:{userid: userid},
                                                                            success: function(response){
                                                                                $('.modal-body-faculty').html(response);
                                                                                $('#empModal').modal('show');
                                                                            }
                                                                        });
                                                                });
                                                            });

                                                        </script>
                                                        <script type='text/javascript'>
                                                                    $(document).ready( function () {
                                                                        $('#dataTable').DataTable();
                                                                    } );
                                                        </script>

                                                    <!-- Delete Modal-->
                                                    <div class="modal fade" id="deleteModal<?php echo $row2['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">Are you sure you want to DELETE this user?</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                                    <a class="btn btn-primary" style="background-color:#ed330e;border:none" href="deletepermanentf.php?id=<?php echo $row2['id']; ?>"><i class='fas fa-skull-crossbones'></i> Delete</a>
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
                                            /*$sql="SELECT * FROM users where designation='permanent'";
                                            $result3=mysqli_query($con,$sql) or die("Query Failed");

                                            if(mysqli_num_rows($result3)>0){
                                                 $total_records=mysqli_num_rows($result3);
                                            
                                            
                                                $total_page=ceil($total_records/$limit);

                                                echo '<ul class="pagination admin-pagination">';
                                                for($i=1; $i<=$total_page; $i++){
                                                    if($i == $page){
                                                        $active = "active";
                                                    }
                                                    else
                                                    {
                                                        $active = "";
                                                    }
                                                    echo '<li class="'.$active.'"><a href="permanentfaculty.php?page='.$i.'">'.$i.'</a></li>';
                                                }
                                                echo '</ul>';
                                            }*/
											//mysqli_close($con);
											?>
			                            </div>
			                        </div>
</div>
        </div>
<?php

include 'includes/footer.php';

?>