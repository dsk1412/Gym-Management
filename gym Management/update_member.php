<?php
require('db.php');

$errors = array(); 

if (isset($_REQUEST['member'])) {
  $mem_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $age = mysqli_real_escape_string($conn, $_REQUEST['age']);
  $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
  $package = mysqli_real_escape_string($conn, $_REQUEST['package']);
  $amount = mysqli_real_escape_string($conn, $_POST['amount']);
  $pay_stat = mysqli_real_escape_string($conn, $_POST['pay_stat']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
  $trainer_id = mysqli_real_escape_string($conn, $_REQUEST['trainer_id']);

  // Check for duplicate member ID
  $user_check_query = "SELECT * FROM member WHERE mem_id='$mem_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user && $user['mem_id'] !== $_GET['id']) { 
    array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
  }
  if (empty($mem_id) ||empty($name) || empty($age) || empty($dob) || empty($package) || empty($amount) || empty($mobileno) || empty($trainer_id)) {
    array_push($errors, "<div class='alert alert-warning'><b>No null values allowed</b></div>");
  }
  if (count($errors) == 0) {
    $update_query = "UPDATE member SET mem_id='$mem_id', name='$name', age='$age', dob='$dob', package='$package', amount='$amount',pay_stat='$pay_stat', mobileno='$mobileno', trainer_id='$trainer_id' WHERE mem_id='".$_GET['id']."'";
    $update_sql = mysqli_query($conn, $update_query);
    
    if ($update_sql) {
      $msg = "<div class='alert alert-success'><b>Member Area Details updated</b></div>";
    } else {
      $msg = "<div class='alert alert-warning'><b>Error updating member details</b></div>";
    }
  }
}

$con = mysqli_query($conn, "SELECT * FROM member WHERE mem_id='".$_GET['id']."'");
$res = mysqli_fetch_assoc($con);
?>

<div class="container">
  <form class="form-group mt-3" method="post" action="">
    <div><h3>UPDATE MEMBER</h3></div>
    <?php  
    echo @$msg;
    echo implode("", $errors); // Display errors if any

    ?>
    <label class="mt-3">MEMBER ID</label>
    <input type="text" name="id" value="<?php echo @$res['mem_id'];?>" class="form-control">
    <label class="mt-3">MEMBER NAME</label>
    <input type="text" name="name" value="<?php echo @$res['name'];?>" class="form-control">
    <label class="mt-3">AGE</label>
    <input type="text" name="age" value="<?php echo @$res['age'];?>" class="form-control">
    <label class="mt-3">DOB</label>
    <input type="text" name="dob" value="<?php echo @$res['dob'];?>" class="form-control">
    <label class="mt-3">PACKAGE</label>
    <select name="package" class="form-control mt-3">
  <option value="Package1" <?php echo (@$res['pay_stat'] == 'Package1') ? 'selected' : ''; ?>>Package1</option>
  <option value="Package2" <?php echo (@$res['pay_stat'] == 'Package2') ? 'selected' : ''; ?>>Package2</option>
  <option value="Package3" <?php echo (@$res['pay_stat'] == 'Package3') ? 'selected' : ''; ?>>Package13</option>
</select>

    <label class="mt-3">Amount</label>
    <input type="text" name="amount" value="<?php echo @$res['amount'];?>" class="form-control">
    <label class="mt-3">PAY STATUS</label>
<select name="pay_stat" class="form-control mt-3">
  <option value="Done" <?php echo (@$res['pay_stat'] == 'Done') ? 'selected' : ''; ?>>Done</option>
  <option value="NOTDONE" <?php echo (@$res['pay_stat'] == 'NOTDONE') ? 'selected' : ''; ?>>NOTDONE</option>
  <option value="PARTIAL_DONE" <?php echo (@$res['pay_stat'] == 'PARTIAL_DONE') ? 'selected' : ''; ?>>PARTIAL_DONE</option>
</select>

    <label class="mt-3">MOBILE NO</label>
    <input type="text" name="mobileno" value="<?php echo @$res['mobileno'];?>" class="form-control">
    <label class="mt-3">Trainer_ID</label>
    <input type="text" name="trainer_id" value="<?php echo @$res['trainer_id'];?>" class="form-control">
    <button class="btn btn-dark mt-3" type="submit" name="member">UPDATE</button>
  </form>
  
  <script>
    function validateForm() {
      var fields = ['name', 'age', 'dob', 'package', 'amount','pay_stat', 'mobileno', 'trainer_id'];
      for (var i = 0; i < fields.length; i++) {
        var fieldValue = document.getElementsByName(fields[i])[0].value;
        if (fieldValue === null || fieldValue === '') {
          alert('No null values allowed');
          return false;
        }
      }
      return true;
    }
  </script>
</div>
