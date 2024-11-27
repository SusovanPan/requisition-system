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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i style='font-size:20px' class='fas fa-users'> </i>Book Requisition Data </h6>
            </div>
            <div class="card-body">
			    <div class="table-responsive">
                <?php
				include ('../config/db.php');
                /*$limit=5;
                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                    }
                else{
                    $page=1;
                    }
                $offset=($page-1)*$limit;*/
                $query="SELECT * FROM requisition_book";
				$result = mysqli_query($con, $query) or die("Query Unsuccessful.");
				if(mysqli_num_rows($result)>0){
				?>
                <style>
                     #dataTable{
                        font-size:16px;
                    }
                    #date{
                        font-size:14px;
                        width:14%;
                    }
                    #issueDate{
                        font-size:9px;
                    }
                    #approvedDate{
                        font-size:9px;
                    }
                    #No_of_days{
                        font-size:9px;
                    }
                    #td_uname{
                        font-size:14px;
                    }
                    #td_id{
                        font-size:14px;
                    }
                    #upload{
                        font-size:10px;
                        text-align:left;
                    }
                    #td_approvedpdf
                    {
                        font-size:10px;
                    }
                    #td_justification{
                        font-size:13px;
                    }
                    #td_title{
                        font-size:13px;
                    }
                </style>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
			            <tr>
			            <th style="text-align:center;">Id</th>
			            <th style="text-align:center;">Title</th>
			            <!--<th style="text-align:center;width:11%">No Of Order</th>-->
			            <th style="text-align:center;">Justification</th>
			            <th style="text-align:center;">User </br><span style="font-size:10px">Name<span></th>
                        <th style="text-align:center;">Date</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">PDF</br><span style="font-size:10px;">(approved)</span></th>
                        <th style="text-align:center;">PDF</br><span style="font-size:10px;">(upload)</span></th>
						<!--<th style="text-align:center;">Approved PDF</th>-->
                        <th style="text-align:center;">Operation</th>                            
			            </tr>
			        </thead>
                    <tbody>
                    <?php
					while($row2=mysqli_fetch_assoc($result)){
					?>
			        <tr>							
			        <td id="td_id"><?php echo $row2['id']?></td>
			        <td id="td_title"><?php echo $row2['title'].'('.$row2['newrequired'].')';?></td>
			        
                    <td id="td_justification"><?php echo $row2['justification'];?></td>
			        <td id="td_uname"><?php 
                        $uid=$row2['uid'];
                        $qu="SELECT name FROM users WHERE id='$uid'";
                        $ru=mysqli_query($con,$qu) or die("Query Unsuccessful.");
                        if(mysqli_num_rows($ru)>0){
                            while($row4=mysqli_fetch_assoc($ru)){
                                echo $row4['name'];
                            }
                        }
                    ?></td>
                    <td id="date" style="text-align:left;">
                        <span id="issueDate">Issue Date:</span>
                        <?php echo $row2['date']."</br>"; 
                        ?>
                        
                       
                        <?php
                            if( $row2['status']=="1")
                            {
                                echo ' <span id="approvedDate">Approved Date:</span>';
                                echo $row2['approvedDate'].'</br>';
                                $diffDate=abs(strtotime($row2['approvedDate'])-strtotime($row2['date']));
                                $yearDiff=floor($diffDate/(365*60*60*24));
                                $no_of_months=floor(($diffDate-$yearDiff * 365*60*60*24)/(30*60*60*24));
                                $no_of_days=floor(($diffDate - $yearDiff * 365*60*60*24 - $no_of_months*30*60*60*24)/(60*60*24));
                                echo "<span id='No_of_days'>Delay: </span>".$no_of_months."<span id='No_of_days'>months</span>".$no_of_days."<span id='No_of_days'>days</span>";
                            }
                        ?>
                    </td>
			        <td><?php 
                    if($row2['status']=="1"){
                        echo '<p><a href="requisition_book_status.php?id='.$row2['id'].
                        '&status=0"><i class="fa fa-check-circle" style="font-size:20px;color:green"></i></a></p>';
                    }
                    else{
                        echo '<p><a href="requisition_book_status.php?id='.$row2['id'].
                        '&status=1"><i class="fas fa-exclamation-triangle" style="font-size:20px;color:#f04f43"></i></a></p>';
                    }
                     ?>
                    </td>
					<td id="td_approvedpdf">
                    <?php
                        if($row2['approvedPdf']!=Null){
                            echo '<a href="http://localhost/requistion/admin/approvedpdf/'.$row2['approvedPdf'].'"><i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i></a></br>';
                            echo $row2['approvedPdf']; 
                        } 
                        //echo $row2['approvedPdf'];?>
                    </td>
                    <td id="upload">
                    <form enctype="multipart/form-data" action="uploadbookpdf.php" method="POST">
                        <p><input type="hidden" name="MAX_FILE_SIZE" value="500000" /> 
                        <input type="file" name="pdfFile" /><br/>
                        <input type="hidden" name="id" value="<?php echo $row2['id']; ?>"/>
                        <input type="submit" value="upload!" name="upload" /></p>
                    </form>
                    </td>
                    <td>
                    <?php
                    if($row2['formno']==3){
                        $id=$row2['id'];
                        //$_SESSION['requisition_id']=$row2['id'];
                        echo "<a href='form3_pdf.php?id=$id'><i class='fa fa-file-pdf-o' style='font-size:20px;color:red'></i></a>";

                    }
                    ?>
                    <a data-toggle="modal" data-target="#deleteModal<?php echo $row2['id']; ?>">
                    <i class="fas fa-trash-alt" style="color:red"></i></a>
                    </td>
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
                                                                <div class="modal-body">Are you sure you want to DELETE this data?</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                                    <a class="btn btn-primary" style="background-color:#ed330e;border:none" href="deletebookdata.php?id=<?php echo $row2['id']; ?>"><i class='fas fa-skull-crossbones'></i> Delete</a>
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
                /*$sql="SELECT * FROM requisition_book";
                $result3=mysqli_query($con,$sql) or die("Query Failed");
                if(mysqli_num_rows($result3)>0){
                    $total_records=mysqli_num_rows($result3);                         
                    $total_page=ceil($total_records/$limit);
                    echo '<ul class="pagination admin-pagination">';
                    for($i=1; $i<=$total_page; $i++)
                    {
                    if($i == $page){
                        $active = "active";
                        }
                    else{
                        $active = "";
                        }
                    echo '<li class="'.$active.'"><a href="bookrequisition.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    echo '</ul>';
                }
				//mysqli_close($con);*/?>
                </table>
                <script type='text/javascript'>
                    $(document).ready( function () {
                        $('#dataTable').DataTable();
                    } );
                </script>
<?php
include 'includes/footer.php';
?>