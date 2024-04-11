<?php
require('db.php');

$inf = $_GET['id'];

// Set trainer_id to NULL in the member table
$sql_update_member = "UPDATE member SET trainer_id = NULL WHERE trainer_id = '$inf'";
$update_member = mysqli_query($conn, $sql_update_member);

// Delete the trainer record
$sql_delete_trainer = "DELETE FROM trainer WHERE trainer_id = '$inf'";
$delete_trainer = mysqli_query($conn, $sql_delete_trainer);

if ($update_member && $delete_trainer) {
    echo '<script>alert("Record deleted");</script>';
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
