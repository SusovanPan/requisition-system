<?php
$host="localhost";
$username="root";
$password="";
$database="requisition_database";

$con=mysqli_connect("$host","$username","$password","$database");

if(!$con)
{
    echo '<script>alert("Not Done")</script>';
}
?>