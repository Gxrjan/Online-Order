<?php 
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>View Orders</h2>
		<?php
		$sql = "SELECT * FROM orders";
		$result=mysqli_query($conn,$sql);
		echo "<table>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr><td>|" . $row['user_id'] . "|</td><td>|" . $row['outputAdress'] . "|</td><td>|" . $row['inputAdress'] . "|</td></tr>";
		}
		echo "</table>";
		?>

	</div>
</section>