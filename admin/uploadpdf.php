<?php
include('../config/db.php');
session_start();
$id=$_POST['id'];
//echo "$id";
if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "approvedpdf/".$_FILES['pdfFile']['name'];
        $filename=$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
                $query = "UPDATE requisition SET approvedPdf='$filename' WHERE id = '$id'";
                //$query="INSERT INTO upload(path) VALUES ('$filename')";
                $result = mysqli_query($con, $query) or die ("Query Unsuccessful.");
				echo mysqli_error($con);
				session_start();
				$_SESSION['status']="Done";
        		$_SESSION['status_code']="success";
        		header("Location: http://localhost/requistion/admin/allrequisition.php");
                
			}
		}
	}
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			//print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
			//print "Invalid  file extension, should be pdf !!"."<br/>";
			//print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
			$_SESSION['status']="Error occured while uploading file: ".$_FILES['pdfFile']['name'];
        	$_SESSION['status_code']="error";
        	header("Location: http://localhost/requistion/admin/allrequisition.php");
		}
	}
}
?>