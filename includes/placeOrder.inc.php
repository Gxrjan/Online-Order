<?php 
session_start();

if(isset($_POST['submit'])){
	include_once 'dbh.inc.php';

	$outputContact = mysqli_real_escape_string($conn, $_POST['outputContact']);
	$outputNumber = mysqli_real_escape_string($conn, $_POST['outputNumber']);
	$outputAdress = mysqli_real_escape_string($conn, $_POST['outputAdress']);
	$inputContact = mysqli_real_escape_string($conn, $_POST['inputContact']);
	$inputNumber = mysqli_real_escape_string($conn, $_POST['inputNumber']);
	$inputAdress = mysqli_real_escape_string($conn, $_POST['inputAdress']);
	$user_id = mysqli_real_escape_string($conn, $_SESSION['u_id']);

	//Error handlers
	//Check for empty fields
	if (empty($outputContact) || empty($outputNumber) || empty($outputAdress) ||
		empty($inputContact) || empty($inputNumber) || empty($inputAdress)){
		header("Location: ../index.php?order=empty");
	exit();
} else {
//check if input characters are valid
	if(!preg_match("/^[a-zA-Z0-9_ ]*$/", $outputContact) || !preg_match("/^[a-zA-Z0-9_ ]*$/", $inputContact)){
		header("Location: ../index.php?onlineOrder=incorrectNames");
		exit();
	}else {
		if(!preg_match("/^[0-9]{4}$/", $outputNumber) || !preg_match("/^[0-9]{4}$/", $inputNumber)){
			header("Location: ../index.php?onlineOrder=invalidNumber");
			exit();
		}else{
			if(!preg_match("/^[a-zA-Z0-9_ ]*$/", $outputAdress) || !preg_match("/^[a-zA-Z0-9_ ]*$/", $inputAdress)){
				header("Location: ../index.php?onlineOrder=invalidAdress");
				exit();
				
				
				
			} else {
				$sql = "INSERT INTO orders (user_id, outputContact, outputNumber, outputAdress, inputContact, inputNumber, inputAdress) VALUES (?, ?, ?, ?, ?, ?, ?);";
				$stmt= mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					echo "SQL error";
				} else {
					mysqli_stmt_bind_param($stmt, "sssssss",$user_id, $outputContact, $outputNumber, $outputAdress, $inputContact, $inputNumber, $inputAdress);
					mysqli_stmt_execute($stmt);
				}
				header("Location: ../index.php?onlineOrder=success");
				exit();
			}
		}}}
	} else{
		header("Location: ../index.php=errorr");
		echo "Shit";
		exit();
	}