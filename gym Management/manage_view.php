

<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=join_search">
		<h3 class="lead">SEARCH MEMBER</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER MEMBER NAME OR MEMBER ID">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>MEMBER ID</th>
				<th>MEMBER NAME</th>		
				<th>PACKAGE</th>
				<th>TRAINER NAME</th>
				<th>TIMINGS</th>
				<th>TRAINER ID</th>

			</tr>
			<?php
           require('db.php');


$sql = "SELECT member.mem_id, member.name AS member_name, member.package, trainer.name AS trainer_name, trainer.time,trainer.trainer_id
FROM member
INNER JOIN trainer ON member.trainer_id = trainer.trainer_id";
   
$all_query=mysqli_query($conn,$sql);
   
   if (mysqli_num_rows($all_query) > 0) {
       while($row = mysqli_fetch_assoc($all_query)){
           echo "<tr>";
                  echo  "<td>".$row['mem_id']."</td>";
                  echo  "<td>".$row['member_name']."</td>";
                   echo "<td>".$row['package']."</td>";
                   echo "<td>".$row['trainer_name']."</td>";
                   echo "<td>".$row['time']."</td>";
                   echo "<td>".$row['trainer_id']."</td>";
               echo "</tr><br>";
       }
   
   } else {
       echo "0 results";
   }


?>
			
		</table>
	</div>
</div>
