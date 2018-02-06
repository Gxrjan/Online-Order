<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php 
			if (isset($_SESSION['u_id'])){
				echo '<form class="order-form" action="includes/placeOrder.inc.php" method="POST">
			<div class="sub-entry1">
				<h2>Sender</h2>
				<input type="text" name="outputContact" placeholder="Enter sender contact name">
				<input type="text" name="outputNumber" placeholder="Enter sender contact number">
				<input type="text" name="outputAdress" placeholder="Enter sender adress">
			</div>
			<div class="sub-entry2">
				<h2>Reciever</h2>
				<input type="text" name="inputContact" placeholder="Enter reciever contact name">
				<input type="text" name="inputNumber" placeholder="Enter reciever contact number">
				<input type="text" name="inputAdress" placeholder="Enter reciever adress">
			</div>
			<div class="sub-entry3">
				<h2>Cargo description</h2>
				<input type="text" name="cargo" placeholder="reagents, medical machinery">
			</div>
			<h2>Dimensions</h2>
			<div class="dim">
				<input type="text" name="long">
			</div>
			<div class="dim">
				<input type="text" name="wide">
			</div>
			<div class="dim">
				<input type="text" name="tall">
			</div>
			<div class="attach">
				<input type="file" name="attach1" accept="image/*">
			</div>
			<div class="attach">
				<input type="file" name="attach2" accept="image/*">
			</div>
			<div class="attach">
				<input type="file" name="attach3" accept="image/*">
			</div>
			<div class="attach">
				<input type="file" name="attach4" accept="image/*">
			</div>
			<div class="button">
				<button type="submit" name="submit">Place order</button>
			</div>
		</form>';
			}

		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>
