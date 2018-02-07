<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>View Order</h2>
		<?php 
			if (isset($_SESSION['u_id'])){
				echo '<h1>You are viewing order №' . $_GET["order_id"] . ' made by user ' . $_GET["user_id"] . '</h1>';
				echo 'Sender info:';
				echo '<p>Contact name: ' . $_GET["outputContact"] . '</p>';
				echo '<p>Contact number: ' . $_GET["outputNumber"] . '</p>';
				echo '<p>Contact adress: ' . $_GET["outputAdress"] . '</p>';
				echo 'Reciever info:';
				echo '<p>Contact name: ' . $_GET["inputContact"] . '</p>';
				echo '<p>Contact number: ' . $_GET["inputNumber"] . '</p>';
				echo '<p>Contact adress: ' . $_GET["inputAdress"] . '</p>';
			}

		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>