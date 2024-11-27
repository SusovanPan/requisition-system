<?php
include '../config/db.php';
$userid=$_POST['userid'];
//echo $userid;
$sql="SELECT * FROM users WHERE id=".$userid;
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<table border="0" width="100%">
<tr>
    <td width="50%"><img src="upload/<?php echo $row['image']; ?>" height="250px;" width="230px;">
    <td style="padding:8px;text-align:left;">
    <p style="font-size:15px">Name : <?php echo $row['name']; 
        if($row['activeStatus']==1){
            echo '    <i class="fa fa-check-circle" style="font-size:20px;color:green"></i> ';
        }
        else{
            echo '    <i class="fas fa-exclamation-triangle" style="font-size:20px;color:#f04f43"></i> ';
        }
    ?></p>
    <p style="font-size:13px">Password : <?php echo $row['password']; ?></p>
    <p style="font-size:13px">Email : <?php echo $row['email']; ?></p>
    <p style="font-size:13px">Sex : <?php echo $row['gender']; ?></p>
    <p style="font-size:13px">Phone No : <?php echo $row['phoneno']; ?></p>
    </td>
</tr>
</table>

<?php } ?>
