<?php
require('db.php');

$inf = $_GET['id'];

$sql_query = "DELETE FROM progress WHERE mem_id='$inf'";
$delete = mysqli_query($conn, $sql_query);

if ($delete) {
    // Record deleted successfully
    echo '<script>alert("Record deleted");</script>';

} else {
    // Error deleting record
    echo "Error: " . mysqli_error($conn);
}
?>