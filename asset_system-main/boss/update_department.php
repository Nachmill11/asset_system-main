<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
// print_r($_POST);
// exit;

	$d_id = $_POST['d_id'];
	$d_name = $_POST["d_name"];
	$d_code = $_POST["d_code"];
	$check = "
	SELECT  d_name 
	FROM department  
	WHERE d_name = '$d_name' 
	";
	$result1 = mysqli_query($conn, $check);
    $num=mysqli_num_rows($result1);

	$sql = "UPDATE  department SET 
	d_name='$d_name',
	d_code='$d_code'
	WHERE d_id='$d_id'
	";

	$result = mysqli_query($conn, $sql);
	
	if($result){
		echo '<script>';
		echo "window.location='list_department.php?do=finish';";
		echo '</script>';
		}else{
		echo '<script>';
		echo "window.location='list_department.php?act=add&do=f';";
		echo '</script>';
	}
?>