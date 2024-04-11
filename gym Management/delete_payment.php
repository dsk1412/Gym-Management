<?php
require('db.php');

$inf = $_GET['id'];

try {
    // Attempt to delete from the member table
    $sql_member = "DELETE FROM member WHERE trainer_id=(SELECT trainer_id FROM trainer WHERE pay_id=(SELECT pay_id FROM payment WHERE pay_id='$inf'))";
    $sql_query_mem = mysqli_query($conn, $sql_member);

    // Attempt to delete from the trainer table
    if ($sql_query_mem) {
        $sql_trainer = "DELETE FROM trainer WHERE pay_id=(SELECT pay_id FROM payment WHERE pay_id='$inf')";
        $sql_query_trainer = mysqli_query($conn, $sql_trainer);
    }

    // Attempt to delete from the payment table
    if ($sql_query_trainer) {
        $sql_query = "DELETE FROM payment WHERE pay_id='$inf'";
        $delete = mysqli_query($conn, $sql_query);
        if ($delete) {
            header("location:home.php?info=manage_payment");
        } else {
            echo "error" . mysqli_error($conn);
        }
    } else {
        echo "Not deleted" . mysqli_error($conn);
    }
} catch (mysqli_sql_exception $e) {
    // Handle foreign key violation exception
    if ($e->getCode() == 1451) { // MySQL error code for foreign key violation
        echo "<div class='alert alert-warning'><b>member still exist</b></div>";
        
    } else {
        echo "Error: " . $e->getMessage();
    }
    echo "</table>";
    echo "</div>";
}
?>