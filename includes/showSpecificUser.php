<html>
<head>
</head>
<body>

<?php
	$data = "GG";
	include_once 'dbh.inc.php';
	//Created a template 
	$sql = "SElECT * FROM users WHERE user_uid=?;";
	//Create a prepared statement
	$stmt = mysqli_stmt_init($conn);
	//prepare the prepared statment
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statemtnt failed";
	} else {
		// Bind paprameters to the placeholder
		mysqli_stmt_bind_param($stmt, "s", $data);
		//Run prarameters inside the db
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		
		while($row = mysqli_fetch_assoc($result)){
			echo $row['user_uid'] . "<br>";
		}
	}
	
		
	
?>

</body>
</html>