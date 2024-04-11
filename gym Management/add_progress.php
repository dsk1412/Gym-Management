<?php

require('db.php');

$errors = array(); 

if (isset($_REQUEST['progress'])) {
  $mem_id = mysqli_real_escape_string($conn, $_REQUEST['mem_id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $height = mysqli_real_escape_string($conn, $_REQUEST['height']);
  $before_weight = mysqli_real_escape_string($conn, $_REQUEST['before_weight']);
  $after_weight = mysqli_real_escape_string($conn, $_REQUEST['after_weight']);
  
  // Check if the mem_id exists in the member table
  $check_member_query = "SELECT * FROM member WHERE mem_id = '$mem_id' LIMIT 1";
  $check_member_result = mysqli_query($conn, $check_member_query);
  $member_exists = mysqli_fetch_assoc($check_member_result);

  if (!$member_exists) {
    array_push($errors, "<div class='alert alert-warning'><b>Member with ID $mem_id does not exist</b></div>");
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO progress (mem_id, name, height, before_weight, after_weight) 
              VALUES ('$mem_id', '$name', '$height', '$before_weight', '$after_weight')";
    
    $sql = mysqli_query($conn, $query);

    if ($sql) {
      $msg = "<div class='alert alert-success'><b>Progress added successfully</b></div>";
    } else {
      $msg = "<div class='alert alert-warning'><b>Progress not added</b></div>";
    }
  }
}

?>

<div class="w3-container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>ADD PROGRESS</h3></div>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
    	<label class="mt-3">MEM_ID</label>
		<input type="text" name="mem_id" class="form-control">
		<label class="mt-3">NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">Height</label>
		<input type="text" name="height" class="form-control">
		<label class="mt-3">before_Weight</label>
		<input type="text" name="before_weight" class="form-control">
        <label class="mt-3">After_Weight</label>
		<input type="text" name="after_weight" class="form-control">
		
		<button class="btn btn-dark mt-3" type="submit" name="progress">ADD</button>
	</form>
</div>