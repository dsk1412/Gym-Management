<?php
require('db.php');

$errors = array(); 

if (isset($_REQUEST['member'])) {
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $age = mysqli_real_escape_string($conn, $_REQUEST['age']);
  $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
  $package = mysqli_real_escape_string($conn, $_REQUEST['package']);
  $amount = mysqli_real_escape_string($conn, $_POST['amount']);
  $pay_stat = mysqli_real_escape_string($conn, $_POST['pay_stat']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
  $trainer_id = mysqli_real_escape_string($conn, $_REQUEST['trainer_id']);

  // Check for null values
  if (empty($name) || empty($age) || empty($dob) || empty($package) || empty($amount) || empty($mobileno) || empty($trainer_id)) {
    array_push($errors, "<div class='alert alert-warning'><b>No null values allowed</b></div>");
  }

  // Check if the trainer ID exists
  $check_trainer_query = "SELECT * FROM trainer WHERE trainer_id='$trainer_id' LIMIT 1";
  $check_trainer_result = mysqli_query($conn, $check_trainer_query);
  $check_trainer = mysqli_fetch_assoc($check_trainer_result);

  if (!$check_trainer) {
    array_push($errors, "<div class='alert alert-warning'><b>Invalid Trainer ID</b></div>");
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO member (name, age, dob, package, amount, pay_stat, mobileno, trainer_id) 
          VALUES ('$name', '$age', '$dob', '$package', '$amount', '$pay_stat', '$mobileno', '$trainer_id')";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
      $msg = "<div class='alert alert-success'><b>Member added successfully</b></div>";
    } else {
      $msg = "<div class='alert alert-warning'><b>Member not added</b></div>";
    }
  }
}
?>

<div class="container">
  <form class="form-group mt-3" method="post" action="" onsubmit="return validateForm()">
    <div><h3>ADD MEMBER</h3></div>
    <?php include('errors.php'); 
    echo @$msg;
    ?>
    <label class="mt-3">MEMBER NAME</label>
    <input type="text" name="name" class="form-control">
    <label class="mt-3">AGE</label>
    <input type="text" name="age" class="form-control">
    <label class="mt-3">DOB</label>
    <input type="text" name="dob" class="form-control">
    <label class="mt-3">PACKAGE TYPE</label>
    <select name="package" class="form-control mt-3">
      <option value="Package1">Package1</option>
      <option value="Package2">Package2</option>
      <option value="Package3">Package3</option>  
    </select>
    <label class="mt-3">AMOUNT</label>
    <input type="text" name="amount" class="form-control">
    <label class="mt-3">PAY STATUS</label>
    <select name="pay_stat" class="form-control mt-3">
      <option value="Done">Done</option>
      <option value="NOTDONE">NOTDONE</option>
      <option value="PARTIAL_DONE">PARTIAL_DONE</option>  
    </select>
    <label class="mt-3">MOBILE NO</label>
    <input type="text" name="mobileno" class="form-control">
    <label class="mt-3">TRAINER ID</label>
    <input type="text" name="trainer_id" class="form-control">
    <button class="btn btn-dark mt-3" type="submit" name="member">ADD</button>
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
