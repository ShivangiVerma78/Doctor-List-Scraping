<?php

require "config.php";

$sql = "SELECT * FROM doctor_list";
$query = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<a class="btn btn-xs btn-info" style="float:right;margin-top:20px;" href="index.php">Search doctor</a>
					<h2>Doctor's List</h2>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Sr.</th>
								<th>Doctor Name</th>
								<th>Speciality</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if(mysqli_num_rows($query)){
								$i=1;
								while($row = mysqli_fetch_assoc($query)){
						?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['speciality']; ?></td>
							</tr>
						<?php  
									$i++;
								}
							}
							else{
						?>
							<tr>
								<td colspan="3">No Result Found</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
