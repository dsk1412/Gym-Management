<div class="container">
    <form class="form-group mt-3" method="post" action="home.php?info=progress_search">
        <h3 class="lead">SEARCH PROGRESS REPORT</h3>
        <input type="text" name="name" class="form-control" placeholder="ENTER MEMBER NAME OR ID">
    </form>

    <div class="container">
        <table class="table table-bordered table-hover">
            <tr>
                <th>MEM_ID</th>
                <th>NAME</th>
                <th>HEIGHT</th>
                <th>BEFORE WEIGHT</th>
                <th>AFTER WEIGHT</th>
                <th>gain_loss</th>
            </tr>
            <?php
            require('db.php');

            $all = "SELECT * FROM progress";
            $all_query = mysqli_query($conn, $all);
            if (mysqli_num_rows($all_query) > 0) {
                while ($row = mysqli_fetch_assoc($all_query)) {
                    $mem_id = $row['mem_id'];
                    $name = $row['name'];
                    $height = $row['height'];
                    $before_weight = $row['before_weight'];
                    $after_weight = $row['after_weight'];

                    // Calculate gain_loss
                    $gain_loss = $after_weight - $before_weight;

                    // Update the row in the database with the calculated gain_loss
                    mysqli_query($conn, "UPDATE progress SET gain_loss = $gain_loss WHERE Name = '$name'");

                    echo "<tr>";
                    echo "<td>$mem_id</td>";
                    echo "<td>$name</td>";
                    echo "<td>$height</td>";
                    echo "<td>$before_weight</td>";
                    echo "<td>$after_weight</td>";
                    echo "<td>$gain_loss</td>";
                    echo "</tr><br>";
                }
            } else {
                echo "0 results";
            }

            ?>
        </table>
    </div>
</div>
