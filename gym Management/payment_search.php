<?php
require('db.php');

$name = "";

if (isset($_POST['name'])) {
    echo "<div class='container'>";
    echo "<table class='table table-bordered  table-hover mt-3'>";
    echo "<tr>";
    echo "<th>Mem_Id</th>";
    echo "<th>Name</th>";
    echo "<th>Package</th>";
    echo "<th>Amount</th>";
	echo "<th>Payment_Status</th>";
    echo "</tr>";
    echo "</div>";

    $name = $_POST['name'];

    $que = mysqli_query($conn, "SELECT * FROM `member` WHERE CONCAT(`mem_id`, `name`, `package`, `amount`,'pay_stat'  ) LIKE '%" . $name . "%'");

    if (mysqli_num_rows($que) > 0) {
        while ($row = mysqli_fetch_array($que)) {
            echo "<tr>";
            echo "<td>" . $row['mem_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['package'] . "</td>";
            echo "<td>" . $row['amount'] . "</td>";
			echo "<td>" . $row['pay_stat'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<div class='alert alert-warning'><b>0 result</b></div>";
    }
}
?>
