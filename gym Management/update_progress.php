<?php
require('db.php');





if (isset($_REQUEST['progress'])) {
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $height = mysqli_real_escape_string($conn, $_REQUEST['height']);
  $before_weight = mysqli_real_escape_string($conn, $_REQUEST['before_weight']);
  $after_weight = mysqli_real_escape_string($conn, $_REQUEST['after_weight']);


  $update_query="update progress set name='$name',height='$height',before_weight='$before_weight',after_weight='$after_weight' where mem_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Gym Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from progress where mem_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  


?>



<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE GYM</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">MEM_ID</label>
		<input type="text" name="mem_id" value="<?php echo @$res['mem_id'];?>" class="form-control">
		<label class="mt-3">NAME</label>
		<input type="text" name="name" value="<?php echo @$res['name'];?>" class="form-control">
		<label class="mt-3">HEIGHT</label>
		<input type="text" name="height" value="<?php echo @$res['height'];?>" class="form-control">
		<label class="mt-3">BEFORE_WEIGHT</label>
		<input type="text" name="before_weight" value="<?php echo @$res['before_weight'];?>" class="form-control">
		<label class="mt-3">AFTER_WEIGHT</label>
		<input type="text" name="after_weight" value="<?php echo @$res['after_weight'];?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="progress">UPDATE</button>
	</form>
	
</div>