<?php
include '../condb.php';

$ids = $_GET['id'];

$check = " SELECT d_id  FROM category WHERE province_id = '$ids' ";
$result1 = mysqli_query($conn, $check);
$num = mysqli_num_rows($result1);

if ($num > 0) {
    echo "<script type='text/javascript'>";
	echo "window.location = 'list_department.php?do=error';";
	echo "</script>";
} else {
    $sql = "DELETE FROM department WHERE d_id= '$ids' ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_department.php?do=delete';";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_department.php'; ";
	echo "</script>";
}
