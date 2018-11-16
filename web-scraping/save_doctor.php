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
if(!empty($dr_name)){
	for($i=0;$i<count($dr_name);$i++){
		$sql = "INSERT INTO doctor_list(name, speciality) VALUES ('".$dr_name[$i]."','".$dr_speciality[$i]."')";
		$query = mysqli_query($con, $sql);
	}
	if($query){
		echo 1;
	}
	else{
		echo 0;
	}
}