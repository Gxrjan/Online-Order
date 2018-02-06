<html>
<head>
</head>
<body>

<?php 
	include_once 'dbh.inc.php';
	$sql = "SElECT * FROM users;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo $row['user_uid'] . "<br>";
		}
	}
?>

</body>
</html>