<?php
require('db.php');

$name = "";

if (isset($_POST['name'])) {
    echo "<div class='container'>";
    echo "<table class='table table-bordered  table-hover mt-3'>";
    echo "<tr>";
    echo "<th>mem_id</th>";
    echo "<th>name</th>";
    echo "<th>Height</th>";
    echo "<th>Before_weight</th>";
    echo "<th>After_weight</th>";
    echo "<th>Gain_Loss</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    echo "</div>";

    $name = $_POST['name'];

    $que = mysqli_query($conn, "SELECT * FROM `progress` WHERE CONCAT(`mem_id`,`name`, `height`, `before_weight`, `after_weight`, `gain_loss`) LIKE '%" . $name . "%'");
    if (mysqli_num_rows($que) > 0) {

        while ($row = mysqli_fetch_array($que)) {
            echo "<tr>";
            echo "<td>" . $row['mem_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['height'] . "</td>";
            echo "<td>" . $row['before_weight'] . "</td>";
            echo "<td>" . $row['after_weight'] . "</td>";
            echo "<td>" . $row['gain_loss'] . "</td>";
            echo "<td><a href='home.php?id=$row[mem_id]&info=update_progress'><i class='fas fa-pencil-alt'></i></a></td>";
            echo "<td><a href='home.php?id=$row[mem_id]&info=delete_progress'><i class='fas fa-trash-alt'></i></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<div class='alert alert-warning'><b>0 result</b></div>";
    }
}
?>
