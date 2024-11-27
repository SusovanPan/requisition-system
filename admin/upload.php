<?php
include('../config/db.php');
?>
<html>
<head>
<title>PHP Pdf file Upload script : Example</title>
</head>

<body>
<div style="padding: 20px; border: 1px solid #999">


<h2>Upload PDF File :</h2>
<form enctype="multipart/form-data"
	action="<?php print $_SERVER['PHP_SELF']?>" method="post">
<p><input type="hidden" name="MAX_FILE_SIZE" value="500000" /> 
<input type="file" name="pdfFile" /><br />
<br />
<input type="submit" value="upload!" /></p>
</form>
<div>
    <?php
    $query="SELECT * FROM studentdata";
	$result = mysqli_query($con, $query) or die("Query Unsuccessful.");
	if(mysqli_num_rows($result)>0){
	?>                         
	<table border="1">
	    <thead>
			<tr>
			<th >id</th>
			<th >Name</th>
            <th>pdf</th>
            <td>upload</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($row2=mysqli_fetch_assoc($result)){
		?>
			<tr>
			<td><?php echo $row2['id'];?></td>
			<td><?php echo $row2['name'];?></td>
            <td>
			<?php echo $row2['pdf'];?></br>
            <td>
            <form enctype="multipart/form-data" action="uploadcode.php" method="POST">
                <p><input type="hidden" name="MAX_FILE_SIZE" value="500000" /> 
                <input type="file" name="pdfFile" /><br /><br />
                <input type="hidden" name="id" value="<?php echo $row2['id']; ?>"/>
                <input type="submit" value="upload!" name="upload" /></p>
            </form>
            </td>
			</tr>
		<?php } ?>
	    </tbody>
	</table>
	<?php } else {
		echo "<h2>No Records Found</h2>";
	}
    ?>
</div>

</div>
</body>
</html>

<?php
if ( isset( $_FILES['pdfFile'] ) ) {
    $id=$_POST['pdfFile'];
    echo $id;
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "upload/".$_FILES['pdfFile']['name'];
        $filename=$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
				print "Pdf file uploaded successfully!";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES['pdfFile']['size']." bytes"."<br/>";
				print "File location : upload/".$_FILES['pdfFile']['name']."<br/>";
                $query="UPDATE upload SET pdf='$filename' WHERE id = '$id'";
                $result = mysqli_query($con, $query) or die ("Query Unsuccessful.");
                echo '<script>alert("Done")</script>';
			}
		}
	}
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
		}
	}
}
?>