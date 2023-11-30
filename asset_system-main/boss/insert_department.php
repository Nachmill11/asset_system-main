<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
// print_r($_POST);
// exit;

	$d_name = $_POST["d_name"];
	$d_code= $_POST["d_code"];
	$check = "
	SELECT  d_name 
	FROM department  
	WHERE d_name = '$d_name' 
	";
    $result1 = mysqli_query($conn, $check);
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
     echo '<script>';
	 echo "window.location='list_department.php?act=add&do=d';";
	 echo '</script>';
    }else{
	
	$sql = "INSERT INTO department
	(d_name,
	d_code)
	VALUES
	('$d_name',
	'$d_code')";
	$result = mysqli_query($conn, $sql);
	}
	mysqli_close($conn);
	if($result){
		echo '<script>';
		echo "window.location='list_department.php?do=success';";
		echo '</script>';
		}else{
		echo '<script>';
		echo "window.location='list_department.php?act=add&do=f';";
		echo '</script>';
	}
?>