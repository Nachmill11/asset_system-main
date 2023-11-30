<?php
include '../condb.php';

$ids = $_GET['id'];

$check = " SELECT c_id  FROM durable WHERE c_id = '$ids' ";
$result1 = mysqli_query($conn, $check);
$num = mysqli_num_rows($result1);

if ($num > 0) {
    echo "<script type='text/javascript'>";
	echo "window.location = 'list_category.php?do=error';";
	echo "</script>";
} else {
    $sql = "DELETE FROM category WHERE c_id= '$ids' ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}
if ($result) {
    echo "<script type='text/javascript'>";
	echo "window.location = 'list_category.php?do=delete';";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_category.php'; ";
	echo "</script>";
}
