<?php
session_start();
require "simple_html_dom.php";
require "config.php";

$location=$_POST['location'];
$search=$_POST['speciality'];
$url = "https://www.sehat.com/$location/doctors?srchdocs=$search";
$html = file_get_html($url);
$dr_name = array();
$dr_speciality = array();
foreach($html->find('div.listing h2') as $k){
	$name = $k->find('span[itemprop=name]');
	$dr_name[] = $name[0]->plaintext;
	$speciality = $k->find('span.dcommatag');
	$dr_speciality[] = $speciality[0]->plaintext;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Search Result</h2>
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
							if(!empty($dr_name)){
								for($i=0;$i<count($dr_name);$i++){
						?>
							<tr>
								<td><?php echo $i+1; ?></td>
								<td><?php echo $dr_name[$i]; ?></td>
								<td><?php echo $dr_speciality[$i]; ?></td>
							</tr>
						<?php  
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
					<?php
						if(!empty($dr_name)){
					?>
					<form action="" method="post">
						<input type="hidden" name="location" value="<?php echo $location; ?>"/>
						<input type="hidden" name="speciality" value="<?php echo $search; ?>"/>
						<div class="form-group">
							<input type="button" name="add" class="btn btn-success" value="Save Result" onclick="save_doctor()"/>
							<a class="btn btn-info" href="doctor_list.php">Check Your Doctor's List</a>
						</div>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script>
		function save_doctor(){
			$.ajax({
				method: "POST",
				url: "save_doctor.php", 
				data: {
					location : $('[name="location"]').val(),
					speciality : $('[name="speciality"]').val()
				},
				success: function(result){
					if(result==1){
						swal ( "Success" ,  "Data saved successfully" ,  "success" );
					}
					else{
						swal ( "Oops" ,  "Something went wrong!" ,  "error" );
					}
				}
			});
		}
		</script>
	</body>
</html>