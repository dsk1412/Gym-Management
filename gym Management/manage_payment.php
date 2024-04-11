<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=payment_search">
		<h3 class="lead">SEARCH PAYMENT AREA</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER MEMBER NAME">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>MEMBER ID</th>
				<th>NAME</th>
				<th>PACKAGE</th>
				<th>AMOUNT</th>
				<th>PAY_STAT</th>
			</tr>
			<?php
			require('db.php');

			$all = "SELECT mem_id, name, package, amount, pay_stat FROM member";
			$all_query = mysqli_query($conn, $all);

			if (mysqli_num_rows($all_query) > 0) {
				while ($row = mysqli_fetch_assoc($all_query)) {
					echo "<tr>";
					echo "<td>" . $row['mem_id'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['package'] . "</td>";
					echo "<td>" . $row['amount'] . "</td>";
					echo "<td>" . $row['pay_stat'] . "</td>";
					echo "</tr><br>";
				}
			} else {
				echo "0 results";
			}
			?>
		</table>
	</div>
</div>
