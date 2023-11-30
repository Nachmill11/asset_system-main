<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
// print_r($_POST);
// exit;
	$type_id = $_POST['type_id'];
	$type_name = $_POST["type_name"];
	$check = "
	SELECT  type_name 
	FROM type  
	WHERE type_name = '$type_name' 
	";
	$result1 = mysqli_query($conn, $check);
    $num=mysqli_num_rows($result1);

	$sql = "UPDATE  type SET 
	type_name='$type_name'
	WHERE type_id='$type_id'
	";

	$result = mysqli_query($conn, $sql);
	
	if($result){
		echo '<script>';
		echo "window.location='list_type.php?do=finish';";
		echo '</script>';
		}else{
		echo '<script>';
		echo "window.location='list_type.php?act=add&do=f';";
		echo '</script>';
	}
