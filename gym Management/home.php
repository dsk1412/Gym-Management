<?php
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gym Management System</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="style.css"> 
  <style>
        body {
            background-image: url('image5.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            height: 100vh;
            margin: 0;
            color: black;
            filter: blur 50px;
        }
    </style>
</head>

<body style="background-color:black">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<div class="container-fluid">
  <a class="navbar-brand" href="home.php">GYM MANAGEMENT SYSTEM</a>
  <a href="logout.php" class=" nav nav-link">log out</a>
</div>
</nav>

<div class="row mt-3">
  <div class="col-2">
    <div id="accordion">
    <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapsefive">
        <i class="fas fa-book"></i>  MEMBERS</a>
      </div>
      <div id="collapsefive" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_member" class="text-light">ADD MEMBER</a></div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_member" class="text-light">VIEW MEMBERS</a></div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_view" class="text-light">VIEW MEMBERS TRAINERS</a></div>
        </div> 
    <div class="list-group">
      <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapseTwo">
        <i class="fas fa-user-alt"></i>  PROGRESS</a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_progress" class="text-light">ADD PROGRESS</a>
          </div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_progress" class="text-light">VIEW PROGRESS</a></div>
        </div>
      <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapseThree">
          <i class="fas fa-user-graduate"></i> Information Deartment
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="list-group-item" style="background-color: #303030;">
          <a href="home.php?info=gym_packages" class="text-light">VIEW PACKAGES</a>
        </div>
        <div class="list-group-item" style="background-color: #303030;">
          <a href="home.php?info=manage_payment" class="text-light">VIEW PAYMENT STATUS</a>
        </div>
      </div>
         <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapsesix">
        <i class="fas fa-users"></i> TRAINERS</a>
      </div>
      <div id="collapsesix" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_trainer" class="text-light">ADD TRAINER</a></div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_trainer" class="text-light">VIEW TRAINERS</a></div>
        </div>
    </div>
</div>
  </div>
  <div class="col-10">
   
<?php
@$info=$_GET['info'];
if ($info!=="") {
             if ($info=="add_progress") {
             include('add_progress.php');
                }
             else if($info=="add_payment")
             {
             include('add_payment.php');
             }
             elseif ($info=="manage_payment") {
               include ('manage_payment.php');
             }elseif ($info=="add_member") {
               include ('add_member.php');
             }elseif ($info=="manage_member") {
               include ('manage_member.php');
             }elseif ($info=="manage_view") {
              include ('manage_view.php');
            }elseif ($info=="add_trainer") {
               include ('add_trainer.php');
             }elseif ($info=="manage_trainer") {
               include ('manage_trainer.php');
             }elseif ($info=="manage_progress") {
               include ('manage_progress.php');
             }elseif ($info=="update_progress") {
               include ('update_progress.php');
             }elseif ($info=="delete_progress") {
               include ('delete_progress.php');
             }elseif ($info=="update_member") {
               include ('update_member.php');
             }elseif ($info=="delete_member") {
               include ('delete_member.php');
             }elseif ($info=="update_trainer") {
               include ('update_trainer.php');
             }elseif ($info=="delete_trainer") {
               include ('delete_trainer.php');
             }elseif ($info=="change_password") {
               include ('change_password.php');
             }elseif ($info=="progress_search") {
               include ('progress_search.php');
             }elseif ($info=="member_search") {
              include ('member_search.php');
            }elseif ($info=="join_search") {
               include ('join_search.php');
             }elseif ($info=="payment_search") {
               include ('payment_search.php');
             }elseif ($info=="trainer_search") {
               include ('trainer_search.php');
             }elseif ($info=="gym_packages") {
              include ('gym_packages.php');
            }
             }
?>

</div>
</div>

</body>
</html>