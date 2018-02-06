<?php
if(isset($_POST['submit'])){
	session_start();
	session_unset();
	session_regenerate_id(TRUE);
	session_destroy();
	header("Location: ../index.php");
	exit();
}