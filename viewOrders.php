<?php 
include_once 'header.php';
include_once 'includes/dbh.inc.php';

?>

<section class="main-container">
	<div class="main-wrapper">
		<script src="includes/viewOrder.inc.js"></script>
		<h2>View Orders</h2>
		<?php
		$sql = "SELECT * FROM orders";
		$result=mysqli_query($conn,$sql);
		echo "<table>";
		echo "<tr><td>|" . "ORDER ID" . "</td><td>|" . "USER ID" . "</td><td>|" . "OUTPUT ADRESS" . "</td><td>|" . "INPUT ADRESS" . "</td><td>|" . "BUTTON" . "</td><td>|" . "LINK" . "</td></tr>|";
		while($row = mysqli_fetch_array($result)){
			echo "<tr><td>|" . $row['order_id'] . "</td><td>|" . $row['user_id'] . "</td><td>|" . $row['outputAdress'] . "</td><td>|" . $row['inputAdress'] . "</td><td>|" . "<button id='view' type='button' value='$row[order_id]' value='$row[user_id]'  onclick='viewOrder(this.value);'>View order</button>" . "</td><td>|" . "<a href='viewOrder.php?order_id=$row[order_id]&user_id=$row[user_id]&outputAdress=$row[outputAdress]&outputContact=$row[outputContact]&outputNumber=$row[outputNumber]&inputAdress=$row[inputAdress]&inputContact=$row[inputContact]&inputNumber=$row[inputNumber]'>VIEW ORDER</a>" . "|<a href='includes/downloadOrder.inc.php?order_id=$row[order_id]'>DOWNLOAD ORDER</a>" . "</td></tr>";
		}
		echo "</table>";
		?>

	</div>
</section>

<?php
include_once 'footer.php';
?>