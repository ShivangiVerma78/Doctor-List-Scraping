<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<center><h2>Search Doctor</h2></center>
					<br>
					<form action="search_result.php" method="post">
						<div class="form-group">
							<label for="location">Location:</label>
							<input type="text" id="location" name="location" class="form-control" placeholder="eg. Lucknow" />
						</div>
						<div class="form-group">
							<label for="location">Speciality:</label>
							<input type="text" id="speciality" name="speciality" class="form-control" placeholder="eg. Cardiologist"/>
						</div>
						<div class="form-group">
							<input type="submit" name="search" class="btn btn-success" value="Search" />
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>