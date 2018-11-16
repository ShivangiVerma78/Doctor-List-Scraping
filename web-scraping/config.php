<?php

$con = mysqli_connect('localhost', 'root', '', 'doctor');
if(!$con){
	echo mysqli_connect_error();
	die;
}