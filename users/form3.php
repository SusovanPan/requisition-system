<?php include '../config/db.php';
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
                        <?php echo '<img  class="img-profile rounded-circle" src="../admin/upload/'.$row1['image'].'"alt="Image">' ?>
                    
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
                            <h6 class="m-0 font-weight-bold text-primary"><i style='font-size:20px' class='fas fa-users'> </i> Faculty List</h6>
                        </div>
                        <div class="card-body">
                            <div class="main_div">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div style="text-align:center;color:black;">
                                        <h4 style="font-weight: bold;font-size:25px;text-decoration: underline;"> REQUISITION FORM</h4>
                                    </div>
                                    <div style="text-align:right;">
                                        <h6 style="font-weight:bold;font-size:15px;color:black">FORM NO. -3</h6>
                                        <h6 style="font-weight:bold;font-size:13px;color:black">(FOR LIBRARY BOOKS)</h6>
                                    </div>
                                    <div class="table-responsive">
                                    <style>
                                        td{
                                            color:black;
                                            font-weight:bold;
                                        }
                                        #dataTable{
                                            width:40%;
                                            height:10px;
                                            float:left;
                                            font-size:10px;
                                            border: 1px black solid;
                                        }
                                        #dataTable td{
                                            text-align:left;
                                        }
                                    </style>
                                    <table border="1" id="dataTable">
                                        <tr>
                                            <td>DEPARTMENT:</td>
                                            <td colspan="3"><input type="text" name="txtdept" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                PAPER CODE:
                                            </td>
                                            <td><input type="text" name="txtpapercodename" value=""></td>
                                            <td>STUDENT STRENGTH:</td>
                                            <td><input type="text" name="txtstudentstrength" value=""></td>
                                        </tr>
                                    </table>
                                    <style>
                                        #datatable2{
                                            width:40%;
                                            float:right;
                                            height:10%;
                                            font-size:10px;
                                            border: 1px black solid;
                                        }
                                        #datatable2 td{
                                            text-align:left;
                                        }
                                    </style>
                                    <table border="1" id="datatable2">
                                        <tr>
                                            <td colspan="2"><center>Date: <input type="date" name="txtdate" value=""></center></td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="font-size:12px; text-align:center;">OFFICE USE ONLY</td>
                                        </tr>
                                        <tr>
                                            <td>REFERENCE NO:  TI/</td>
                                            <td><input type="text" name="txtreffNo" value=""></td>
                                        </tr>
                                    </table>
                                    </div>
                                    <div class="table-responsive">
                                    <style>
                                        #datatable3{
                                            width:100%;
                                            margin-top:10px;
                                            border: 1px black solid;
                                        }
                                        .slno{
                                        width:3%;
                                        }
                                        .item{
                                        width:20%;
                                        }
                                        .spec{
                                        width:20%;
                                        }
                                        .totalqty{
                                        width:5%;
                                        }
                                        .stock{
                                        width:5%;
                                        }
                                        .required{
                                        width:8%;
                                        }
                                        .justification{
                                        width:12%;
                                        }
                                    </style>
                                    <table border="1" id="datatable3" >
                                        <tr>
                                            <td colspan="5">DEPARTMENT USE ONLY</td>
                                            <td colspan="3">LIBRARY USE ONLY</td>
                                        </tr>
                                        <tr>
                                            <td class="slno">SL NO.</td>
                                            <td class="title">TITLE OF THE BOOKS</td>
                                            <td class="author">AUTHOR</td>
                                            <td class="publisher">PUBLISHER</td>
                                            <td class="totalcopiesrequired">TOTAL COPIES REQUIRED(A)</td>
                                            <td class="availablecopiesrequired">AVAILABE COPIES IN STOCK(B)</td>
                                            <td class="additionalcopiesrequired">NEW/ADDITIONAL COPIES REQUIRED C=(A-B)</td>
                                            <td class="justificationrequired">JUSTIFICATION FOR NEW/ADDITIONAL COPIES</td>
                                        </tr>
                                        <tr>
                                            <td><input type="number" name="txtslno" value="1" disabled></td>
                                            <td><input type="text" name="txttitle" value="" required></td>
                                            <td><input type="text" name="txtauthor" value="" required></td>
                                            <td><input type="text" name="txtpublisher" value="" required></td>
                                            <td><input type="number" name="txtcopiesrequired" value="" required></td>
                                            <td><input type="number" name="txtavailablecopies" value="" required></td>
                                            <td><input type="number" name="txtnewrequired" value="" required></td>
                                            <td><textarea name="txtjustification" rows="2" cols="40" required></textarea></td>
                                        </tr>
                                    </table>
                                    <script src="vendor/jquery/jquery.min.js"></script>
                                     <script>
                                        $(function(){
                                            'use strict';
                                            $('textarea').on('keyup',function(){
                                                var textareaval=$(this).val().trim(),
                                                charscount=textareaval.length;
                                                if(charscount=='120'){
                                                    alert('Sorry! Please write within 120 characters');
                                                } 
                                            });
                                        });
                                     </script>
                                    <input type="submit" name="bttnSave" class="btn btn-primary" value="Save">
                                    </div>
                                </form>
                                <?php
                                    if(isset($_POST['bttnSave']))
                                    {
                                        $uid=$_SESSION['Id'];
                                        $utype=$_SESSION['Usertype'];
                                        $dept=$_POST['txtdept'];
                                        $papercoderefNo=$_POST['txtpapercodename'];
                                        $date=$_POST['txtdate'];
                                        $reffno=$_POST['txtreffNo'];
                                        $studentStreangth=$_POST['txtstudentstrength'];
                                        //$slno=$_POST['txtslno'];
                                        $title=$_POST['txttitle'];
                                        $author=$_POST['txtauthor'];
                                        $publisher=$_POST['txtpublisher'];
                                        $totalquantityrequired=$_POST['txtcopiesrequired'];
                                        $qtystock=$_POST['txtavailablecopies'];
                                        $addRequired=$_POST['txtnewrequired'];
                                        $justification=$_POST['txtjustification'];
                                        $query="INSERT INTO requisition_book(uid,utype,dept,papercode,studentstrength,date,reffno,title,author,publisher,totalcopiesrequired,approvedpdf,formno,availableinstock,newrequired,justification,status) 
                                        VALUES ('$uid','$utype','$dept','$papercoderefNo','$studentStreangth','$date','$reffno','$title','$author','$publisher','$totalquantityrequired','','3','$qtystock','$addRequired','$justification','0')";
                                        $result = mysqli_query($con, $query);
                                        
                                        if($result){
                                            //$_SESSION['requisition_id']=mysqli_insert_id($con);
                                            $id=mysqli_insert_id($con);
                                            
                                            echo "<div id='link' style='visibility:visible;text-color:red;'>
                                            <center><a href='form3_pdf.php?id=$id' id='downloadlink'><span style='color:gray;'>Click Here to</span> Download PDF</a></center> .
                                            </div>";
                                            echo "
                                            <script>
                                            function hidediv(){
                                                document.getElementById('downloadlink').style.visibility='hidden';
                                            }
                                            setTimeout('hidediv()',10000);
                                            </script>";
                                            echo "
                                            <script>
                                            function 
                                            </script>
                                            ";
                                        }
                                        else{
                                           echo "Error...";
                                        }
                                    }
                                ?>
	                        </div>
                        </div>
        </div>
<?php
include 'includes/footer.php';
?>