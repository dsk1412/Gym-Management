<?php
require('db.php');

$name = "";

if (isset($_POST['name'])) {
    echo "<div class='container'>";
    echo "<table class='table table-bordered  table-hover mt-3'>";
    echo "<tr>";
    echo "<th>Equiment_ID</th>";
    echo "<th>Name</th>";
    echo "<th>Quantity</th>";
    echo "<th>Conditions</th>";
    echo "<th>Purchase_Date</th>";
    echo "<th>Price</th>";
    echo "</tr>";
    echo "</div>";

    $name = $_POST['name'];

    $que = mysqli_query($conn, "SELECT * FROM `equment` WHERE CONCAT(`Equiment_ID`, `Name`, `Quantity`, `Conditions`, `Purchase_Date`, `Price`) LIKE '%" . $Name . "%'");

    if (mysqli_num_rows($que) > 0) {
        while ($row = mysqli_fetch_array($que)) {
            echo "<tr>";
            echo "<td>" . $row['Equiment_ID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Quantity'] . "</td>";
            echo "<td>" . $row['Conditions'] . "</td>";
            echo "<td>" . $row['Purchase_Date'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><a href='home.php?id=$row[mem_id]&info=update_member'><i class='fas fa-pencil-alt'></i></a></td>";
            echo "<td><a href='home.php?id=$row[mem_id]&info=delete_member'><i class='fas fa-trash-alt'></i></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<div class='alert alert-warning'><b>0 result</b></div>";
    }
}
?>