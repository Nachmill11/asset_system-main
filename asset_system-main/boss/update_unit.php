<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
// print_r($_POST);
// exit;
	$unit_id = $_POST['unit_id'];
	$unit_name = $_POST["unit_name"];
	$check = "
	SELECT  unit_name 
	FROM unit 
	WHERE unit_name = '$unit_name' 
	";
	$result1 = mysqli_query($conn, $check);
    $num=mysqli_num_rows($result1);

	$sql = "UPDATE unit SET 
	unit_name='$unit_name'
	WHERE unit_id='$unit_id'
	";

	$result = mysqli_query($conn, $sql);
	
	if($result){
		echo '<script>';
		echo "window.location='list_unit.php?do=finish';";
		echo '</script>';
		}else{
		echo '<script>';
		echo "window.location='list_unit.php?act=add&do=f';";
		echo '</script>';
	}
