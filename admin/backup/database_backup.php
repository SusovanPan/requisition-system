<?php

    error_reporting(0);

	include 'backup_function.php';

	if(isset($_POST['backupnow'])){
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
		$table=$_POST['table'];
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "requisition_database";

		
		backDb($server, $username, $password, $dbname, $startdate, $enddate, $table);

		exit();
		
	}
	else{
		echo 'Add All Required Field';
	}

?>