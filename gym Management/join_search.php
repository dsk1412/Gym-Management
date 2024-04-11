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
    echo "<th>trainer_id</th>";
    echo "<th>trainer name</th>";
    echo "</tr>";

    $name = $_POST['name'];

    $sql = "SELECT member.mem_id, member.name AS member_name, member.package, trainer.name AS trainer_name, trainer.time, trainer.trainer_id
            FROM member
            INNER JOIN trainer ON member.trainer_id = trainer.trainer_id
            WHERE member.name LIKE '%$name%'
            OR member.mem_id LIKE '%$name%';";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row['mem_id']."</td>";
            echo "<td>".$row['member_name']."</td>";
            echo "<td>".$row['package']."</td>";
            echo "<td>".$row['trainer_id']."</td>";
            echo "<td>".$row['trainer_name']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<div class='alert alert-warning'><b>0 result</b></div>";
    }
    echo "</table>";
    echo "</div>";
}
?>
